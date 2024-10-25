<?php
session_start();

// Check if the user is not logged in 
if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
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
            background-image: url('fw.jpg');
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
        }

        a {
            display: block;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            margin: 10px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #45a049;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is the home page.</p>
    <p>Please select an option:</p>
    <a href="cv.html">View CV</a>
    <a href="weather.html">Weather</a>
    <a href="submit.php">Submit New Record</a>
    <a href="list.php">View Library</a>
    <a href="logout.php">Logout</a>
</body>
</html>

