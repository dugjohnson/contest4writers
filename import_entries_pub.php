<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$filePath = './PubbedEntries.tsv';
$handle = fopen($filePath, 'r');

if (!$handle) {
    echo "ERROR: Could not open file: {$filePath}\n";
    return;
}

$rowNum   = 0;
$imported = 0;
$skipped  = 0;

while (($line = fgets($handle)) !== false) {
    $rowNum++;

    // Skip header row
    if ($rowNum === 1) {
        continue;
    }

    $fields = explode("\t", rtrim($line, "\n\r"));

    // Skip rows with no timestamp (empty placeholder rows)
    if (empty(trim($fields[0] ?? ''))) {
        $skipped++;
        continue;
    }

    $timestamp      = trim($fields[0]);
    $submitterEmail = trim($fields[1]  ?? '');
    $authorName     = trim($fields[23] ?? '');
    $authorEmail    = trim($fields[24] ?? '');
    $publisher      = trim($fields[25] ?? '');
    $editor         = trim($fields[26] ?? '');
    $pubMonth       = trim($fields[27] ?? '');
    $category       = trim($fields[28] ?? '');
    $elements       = trim($fields[29] ?? '');
    $title          = trim($fields[30] ?? '');
    $manualEntry    = trim($fields[31] ?? '');
    $entryReceived  = trim($fields[34] ?? '');

    // Look up user_id from users table by submitter email
    $user = DB::table('users')->where('email', $submitterEmail)->first();
    if (!$user) {
        echo "Row {$rowNum}: Skipping — submitter email '{$submitterEmail}' not found in users table.\n";
        $skipped++;
        continue;
    }

    // Look up author_user_id from users table by author email
    $authorUser = DB::table('users')->where('email', $authorEmail)->first();

    // Parse timestamp (format: m/d/Y H:i:s)
    try {
        $createdAt = Carbon::createFromFormat('n/j/Y G:i:s', $timestamp);
    } catch (\Exception $e) {
        $createdAt = now();
    }

    // Parse story elements flags
    $erotic     = stripos($elements, 'Sex/sensuality') !== false ? 1 : 0;
    $glbt       = stripos($elements, 'LGBTQ')          !== false ? 1 : 0;
    $bdsm       = stripos($elements, 'Violence')       !== false ? 1 : 0;
    $childdeath = stripos($elements, 'Child death')    !== false ? 1 : 0;

    $received      = strtoupper($entryReceived) === 'TRUE' ? 1 : 0;
    $invoiceNumber = rand(10000, 99999);

    DB::table('entries')->insert([
        'user_id'            => $user->id,
        'published'          => 1,
        'finalist'           => 0,
        'received'           => $received,
        'author'             => $authorName,
        'title'              => $title,
        'category'           => $category,
        'dateOfEntry'        => $createdAt,
        'filename'           => $manualEntry    ?: null,
        'publisher'          => $publisher      ?: null,
        'editor'             => $editor         ?: null,
        'publicationMonth'   => $pubMonth       ?: null,
        'invoiceNumber'      => (string) $invoiceNumber,
        'enteredByPublisher' => 0,
        'readRules'          => 0,
        'signed'             => '1',
        'authorEmail'        => $authorEmail,
        'author2'            => null,
        'author2Email'       => null,
        'author_user_id'     => $authorUser->id ?? null,
        'author2_user_id'    => null,
        'erotic'             => $erotic,
        'glbt'               => $glbt,
        'bdsm'               => $bdsm,
        'childdeath'         => $childdeath,
        'final_filename'     => null,
        'created_at'         => $createdAt,
        'updated_at'         => $createdAt,
    ]);

    echo "Row {$rowNum}: Imported — \"{$title}\" by {$authorName} ({$manualEntry})\n";
    $imported++;
}

fclose($handle);

echo "\n--- Done ---\n";
echo "Imported : {$imported}\n";
echo "Skipped  : {$skipped}\n";
