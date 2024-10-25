<?php
// Read library records from the file
$libraryFile = 'library.txt';
$libraryData = file($libraryFile, FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bird.jpg');
            color: #333; /* Updated text color for better readability */
            margin: 0;
            padding: 20px;
            text-align: center; /* Center align text */
        }

        h2 {
            color: #963e3e; /* Header color */
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin: 10px 0;
        }

        a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Records</title>
</head>
<body>
    <h2>Library Records</h2>

    <ul>
        <?php foreach ($libraryData as $record): ?>
            <?php list($title, , $isbn, ) = explode('|', $record); ?>
            <li><a href="display.php?isbn=<?php echo $isbn; ?>"><?php echo $title; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <a href="home.php">Return to home page</a>
</body>
</html>
