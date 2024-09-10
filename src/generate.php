<?php

require_once 'FileUtility.php';
require_once 'Random.php';

$random = new Random();
$records = $random->generateRecords();

// Open the file for writing
$filename = 'persons.csv';
$handle = fopen($filename, 'w');

// Write the header row
$header = [
    'UUID', 
    'Title', 
    'First Name', 
    'Last Name', 
    'Street Address', 
    'Barangay', 
    'Municipality', 
    'Province', 
    'Country', 
    'Phone Number', 
    'Mobile Number',
    'Company Name', 
    'Company Website', 
    'Job Title', 
    'Favorite Color', 
    'Birthdate', 
    'Email Address', 
    'Password'
];
fputcsv($handle, $header);

// Write the data rows
foreach ($records as $record) {
    fputcsv($handle, $record);
}

// Close the file
fclose($handle);

echo "Data generated and saved to $filename.";
