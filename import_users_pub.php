<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    $timestamp = trim($fields[0]);
    $email     = trim($fields[1] ?? '');

    if (empty($email)) {
        echo "Row {$rowNum}: Skipping — no email address.\n";
        $skipped++;
        continue;
    }

    // Skip if email already exists in the users table
    if (DB::table('users')->where('email', $email)->exists()) {
        echo "Row {$rowNum}: Skipping — {$email} already exists.\n";
        $skipped++;
        continue;
    }

    $firstName   = trim($fields[2]  ?? '');
    $lastName    = trim($fields[3]  ?? '');
    $writingName = trim($fields[4]  ?? '');
    $email2      = trim($fields[7]  ?? '');
    $phone1      = trim($fields[8]  ?? '');
    $phone2      = trim($fields[9]  ?? '');
    $phone3      = trim($fields[10] ?? '');
    $street      = trim($fields[12] ?? '');
    $unit        = trim($fields[13] ?? '');
    $city        = trim($fields[14] ?? '');
    $state       = trim($fields[15] ?? '');
    $zipCode     = trim($fields[16] ?? '');
    $country     = trim($fields[17] ?? '');

    // Append unit/apt to street if present
    if (!empty($unit)) {
        $street = $street . ', ' . $unit;
    }

    // Parse timestamp (format: m/d/Y H:i:s)
    try {
        $createdAt = Carbon::createFromFormat('n/j/Y G:i:s', $timestamp);
    } catch (\Exception $e) {
        $createdAt = now();
    }

    DB::table('users')->insert([
        'email'          => $email,
        'password'       => Hash::make('ThisIsMyPassword'),
        'firstName'      => $firstName   ?: null,
        'lastName'       => $lastName    ?: null,
        'writingName'    => $writingName ?: null,
        'email2'         => $email2      ?: null,
        'phone1'         => $phone1      ?: null,
        'phone2'         => $phone2      ?: null,
        'phone3'         => $phone3      ?: null,
        'street'         => $street      ?: null,
        'city'           => $city        ?: null,
        'state'          => $state       ?: null,
        'zipCode'        => $zipCode     ?: null,
        'country'        => $country     ?: null,
        'remember_token' => null,
        'created_at'     => $createdAt,
        'updated_at'     => $createdAt,
    ]);

    echo "Row {$rowNum}: Imported — {$email} ({$firstName} {$lastName})\n";
    $imported++;
}

fclose($handle);

echo "\n--- Done ---\n";
echo "Imported : {$imported}\n";
echo "Skipped  : {$skipped}\n";
