<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $isbn = $_POST['isbn'];
    $modules = isset($_POST['modules']) ? $_POST['modules'] : [];

    // Validate and sanitize data (you might want to add more validation)
    $title = htmlspecialchars(trim($title));
    $description = htmlspecialchars(trim($description));
    $isbn = htmlspecialchars(trim($isbn));

    // Create a new record
    $record = "$title|$description|$isbn|$modules";

    // Append the record to the library file
    file_put_contents('library.txt', $record, FILE_APPEND);

    // Redirect to the list page after submission
    header('Location: list.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('mon.jpg');
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #acf;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit New Record</title>
</head>
<body>
    <form method="post" action="">
        <h2>Submit New Record</h2>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required>

        <label for="modules">Associated Modules (comma-separated):</label>
        <input type="text" id="modules" name="modules">

        <button type="submit">Submit</button>
    </form>
</body>
</html>
