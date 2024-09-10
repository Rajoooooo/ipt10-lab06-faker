<?php

require_once 'FileUtility.php';

// Open and read the CSV file
$filename = 'persons.csv';
$data = FileUtility::readFromFile($filename);

// Convert the CSV data into an array
$rows = array_map("str_getcsv", explode("\n", trim($data)));

// If the CSV file contains headers, use the first row as headers
$headers = array_shift($rows);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Persons Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Persons Data</h1>
    <table>
        <thead>
            <tr>
                <?php foreach ($headers as $header): ?>
                    <th><?php echo htmlspecialchars($header); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?php echo htmlspecialchars($cell); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
