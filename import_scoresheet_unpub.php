<?php

use Illuminate\Support\Facades\DB;

$filePath = './scoresheet_unpub.tsv';
$handle = fopen($filePath, 'r');

if (!$handle) {
    echo "ERROR: Could not open file: {$filePath}\n";
    return;
}

$rowNum   = 0;
$assigned = 0;
$skipped  = 0;
$warnings = 0;

while (($line = fgets($handle)) !== false) {
    $rowNum++;

    // Skip header row
    if ($rowNum === 1) {
        continue;
    }

    $fields = explode("\t", rtrim($line, "\n\r"));

    $entryNumber = trim($fields[0] ?? '');
    $judge1      = trim($fields[2] ?? '');
    $judge2      = trim($fields[4] ?? '');
    $judge3      = trim($fields[6] ?? '');
    $judge4      = trim($fields[8] ?? '');
    $dq          = strtoupper(trim($fields[11] ?? ''));

    // Skip DQ'd entries
    if ($dq === 'TRUE') {
        echo "Row {$rowNum}: Skipping DQ'd entry {$entryNumber}\n";
        $skipped++;
        continue;
    }

    // Skip rows with no entry number
    if (empty($entryNumber)) {
        $skipped++;
        continue;
    }

    // Extract the 5-digit entry ID
    $entryId = (int) substr($entryNumber, 0, 5);

    // Collect non-empty, non-DNA judge IDs in order
    $judgeIds = [];
    foreach ([$judge1, $judge2, $judge3, $judge4] as $j) {
        if ($j !== '' && strtoupper($j) !== 'DNA') {
            $judgeIds[] = (int) $j;
        }
    }

    if (empty($judgeIds)) {
        echo "Row {$rowNum}: No valid judges for entry {$entryNumber} — skipping\n";
        $skipped++;
        continue;
    }

    // Fetch empty scoresheet records for this entry, ordered by id
    $emptyRecords = DB::table('scoresheets')
        ->where('entry_id', $entryId)
        ->whereNull('judge_id')
        ->orderBy('id')
        ->get();

    if ($emptyRecords->count() < count($judgeIds)) {
        echo "Row {$rowNum}: WARNING — entry {$entryNumber} has {$emptyRecords->count()} empty slot(s) but needs " . count($judgeIds) . " — skipping row\n";
        $warnings++;
        continue;
    }

    // Assign each judge to the next empty record
    foreach ($judgeIds as $index => $judgeId) {
        $record = $emptyRecords[$index];
        DB::table('scoresheets')
            ->where('id', $record->id)
            ->update(['judge_id' => $judgeId, 'updated_at' => now()]);
        $assigned++;
    }

    echo "Row {$rowNum}: Entry {$entryNumber} — assigned judges " . implode(', ', $judgeIds) . "\n";
}

fclose($handle);

echo "\n--- Done ---\n";
echo "Assigned : {$assigned} scoresheet(s)\n";
echo "Skipped  : {$skipped} row(s)\n";
echo "Warnings : {$warnings} row(s)\n";
