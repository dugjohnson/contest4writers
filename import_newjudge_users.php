<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

$filePath = './newjudges.tsv';
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

    $email    = trim($fields[1] ?? '');
    $fullName = trim($fields[2] ?? '');

    // Skip rows with no email
    if ($email === '') {
        echo "Row {$rowNum}: Skipping — no email address\n";
        $skipped++;
        continue;
    }

    // Skip if email already exists — do not update existing records
    if (DB::table('users')->where('email', $email)->exists()) {
        echo "Row {$rowNum}: Skipping — {$email} already exists\n";
        $skipped++;
        continue;
    }

    // Split full name into first and last on the first space
    $nameParts = explode(' ', $fullName, 2);
    $firstName = $nameParts[0] ?? '';
    $lastName  = $nameParts[1] ?? '';

    DB::table('users')->insert([
        'email'       => $email,
        'password'    => Hash::make('ThisIsMyPassword'),
        'firstName'   => $firstName   ?: null,
        'lastName'    => $lastName    ?: null,
        'writingName' => $fullName    ?: null,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]);

    echo "Row {$rowNum}: Imported — {$email} ({$fullName})\n";
    $imported++;
}

fclose($handle);

echo "\n--- Done ---\n";
echo "Imported : {$imported}\n";
echo "Skipped  : {$skipped}\n";
