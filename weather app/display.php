<?php
// Get ISBN 
$isbn = isset($_GET['isbn']) ? $_GET['isbn'] : '';

// Read library records from the file
$libraryFile = 'library.txt';
$libraryData = file($libraryFile, FILE_IGNORE_NEW_LINES);

// Find the record with the matching ISBN
$selectedRecord = null;
foreach ($libraryData as $record) {
    $recordIsbn = explode('|', $record)[2];
    if ($recordIsbn === $isbn) {
        $selectedRecord = $record;
        break;
    }
}

// Display record details
if ($selectedRecord) {
    list($title, $description, $isbn, $modules) = explode('|', $selectedRecord);
} else {
    $title = $description = $isbn = $modules = 'Record not found';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    * {
  box-sizing: border-box;
}
body {
  background-image: url('bird.jpg');
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Record Details</title>
</head>
<body>
    <h2>Library Record Details</h2>
    <h3><?php echo $title; ?></h3>
    <p>Description: <?php echo $description; ?></p>
    <p>ISBN: <?php echo $isbn; ?></p>
    <p>Associated Modules: <?php echo $modules; ?></p>
</body>
</html>
