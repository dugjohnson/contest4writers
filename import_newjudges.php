<?php

use Illuminate\Support\Facades\DB;

$filePath = './newjudges.tsv';
$handle = fopen($filePath, 'r');

if (!$handle) {
    echo "ERROR: Could not open file: {$filePath}\n";
    return;
}

$rowNum   = 0;
$updated  = 0;
$inserted = 0;
$skipped  = 0;
$warnings = 0;

// Extract the first integer from a string (e.g. "5-6" -> 5, "10+" -> 10, "none" -> 0)
function parseMaxEntries(string $value): int
{
    preg_match('/\d+/', $value, $matches);
    return isset($matches[0]) ? (int) $matches[0] : 0;
}

// Map the willingness text to a judgeThisYear code
function parseJudgeThisYear(string $value): string
{
    $value = strtolower(trim($value));
    if (str_contains($value, 'would love to judge')) return 'LJ';
    if (str_contains($value, 'unable to judge'))     return 'NY';
    if (str_contains($value, 'emergency'))           return 'EJ';
    if (str_contains($value, 'remove'))              return 'RM';
    return 'NU';
}

// Append a value to existing comments only if not already present
function appendIfNew(string $existing, string $addition): string
{
    $addition = trim($addition);
    if ($addition === '') {
        return $existing;
    }
    if (str_contains($existing, $addition)) {
        return $existing;
    }
    return $existing !== '' ? $existing . ' | ' . $addition : $addition;
}

while (($line = fgets($handle)) !== false) {
    $rowNum++;

    // Skip header row
    if ($rowNum === 1) {
        continue;
    }

    $fields = explode("\t", rtrim($line, "\n\r"));

    $judgeNumber = trim($fields[21] ?? '');

    // Skip rows with no judge number
    if ($judgeNumber === '') {
        $skipped++;
        continue;
    }

    $judgeId = (int) $judgeNumber;

    $email           = trim($fields[1]  ?? '');
    $willingnessText = trim($fields[3]  ?? '');
    $emergencyText   = trim($fields[4]  ?? '');
    $maxUnpub        = trim($fields[5]  ?? '');
    $maxPub          = trim($fields[6]  ?? '');
    $mainstream      = trim($fields[7]  ?? '');
    $cozy            = trim($fields[8]  ?? '');
    $historical      = trim($fields[9]  ?? '');
    $longTitle       = trim($fields[10] ?? '');
    $shortTitle      = trim($fields[11] ?? '');
    $novella         = trim($fields[12] ?? '');
    $paranormal      = trim($fields[13] ?? '');
    $erotic          = trim($fields[14] ?? '');
    $glbt            = trim($fields[15] ?? '');
    $bdsm            = trim($fields[16] ?? '');
    $childdeath      = trim($fields[17] ?? '');
    $col22           = trim($fields[22] ?? '');
    $rating          = trim($fields[23] ?? '');

    $judgeFields = [
        'judgeThisYear'       => parseJudgeThisYear($willingnessText),
        'emergencyJudgeUnpub' => str_contains($emergencyText, 'Unpublished') ? 1 : 0,
        'emergencyJudgePub'   => str_contains($emergencyText, 'Published')   ? 1 : 0,
        'maxunpubentries'     => parseMaxEntries($maxUnpub),
        'maxpubentries'       => parseMaxEntries($maxPub),
        'mainstream'          => (int) $mainstream,
        'cozy'                => (int) $cozy,
        'historical'          => (int) $historical,
        'longTitle'           => (int) $longTitle,
        'shortTitle'          => (int) $shortTitle,
        'novella'             => (int) $novella,
        'paranormal'          => (int) $paranormal,
        'erotic'              => $erotic     === 'Yes' ? 1 : 0,
        'glbt'                => $glbt       === 'Yes' ? 1 : 0,
        'bdsm'                => $bdsm       === 'Yes' ? 1 : 0,
        'childdeath'          => $childdeath === 'Yes' ? 1 : 0,
        'updated_at'          => now(),
    ];

    // Look up existing judge record
    $judge = DB::table('judges')->where('id', $judgeId)->first();

    if ($judge) {
        // Build internalComments: preserve existing, append new values only if not already present
        $newComments = trim($judge->internalComments ?? '');
        $newComments = appendIfNew($newComments, $col22);
        $newComments = appendIfNew($newComments, $rating);

        DB::table('judges')->where('id', $judgeId)->update(array_merge($judgeFields, [
            'internalComments' => $newComments ?: null,
        ]));

        echo "Row {$rowNum}: Updated judge {$judgeId}\n";
        $updated++;

    } else {
        // Look up user by email
        $user = DB::table('users')->where('email', $email)->first();

        if (!$user) {
            echo "Row {$rowNum}: WARNING — judge ID {$judgeId} not found and email '{$email}' not in users table — skipping\n";
            $warnings++;
            continue;
        }

        // Build internalComments from scratch
        $newComments = '';
        $newComments = appendIfNew($newComments, $col22);
        $newComments = appendIfNew($newComments, $rating);

        DB::table('judges')->insert(array_merge($judgeFields, [
            'id'                  => $judgeId,
            'user_id'             => $user->id,
            'judgePub'            => 1,
            'judgeUnpub'          => 1,
            'judgeEitherNotBoth'  => 1,
            'internalComments'    => $newComments ?: null,
            'created_at'          => now(),
        ]));

        echo "Row {$rowNum}: Inserted judge {$judgeId} (user_id {$user->id}, email {$email})\n";
        $inserted++;
    }
}

fclose($handle);

echo "\n--- Done ---\n";
echo "Updated  : {$updated} judge(s)\n";
echo "Inserted : {$inserted} judge(s)\n";
echo "Skipped  : {$skipped} row(s)\n";
echo "Warnings : {$warnings} row(s)\n";
