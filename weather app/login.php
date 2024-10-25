<?php
session_start();

// Function to validate administrator credentials
function validateAdmin($username, $password) {
    // Check if the admin file exists
    $adminFile = 'admin.txt';
    $adminUsername = 'admin';
    $adminPassword = 'admin';  // Replace with the actual password
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    $dataToStore = $adminUsername . '|' . $hashedPassword . "\n";
file_put_contents('admin.txt', $dataToStore, FILE_APPEND);
    if (file_exists($adminFile)) {
        // Read administrator details from the file
        $adminDetails = file($adminFile, FILE_IGNORE_NEW_LINES);

        // Check if the provided credentials match any administrator
        foreach ($adminDetails as $admin) {
            list($adminUsername, $hashedPassword) = explode('|', $admin);
            if ($username == $adminUsername && password_verify($password, $hashedPassword)) {
                return true; // Valid credentials
            }
        }
    }

    return false; // Invalid credentials
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Validate administrator credentials
    if (validateAdmin($username, $password)) {
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true;

        // Redirect to the home page or admin dashboard
        header('Location: home.php');
        exit();
    } else {
        $error = 'Invalid username or password';
        // Add this after $error = 'Invalid username or password';
        echo 'Provided Username: ' . $username . '<br>';
        echo 'Provided Password: ' . $password . '<br>';
    }
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
            background-image: url('bb.jpg');
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #ffb;
            margin-bottom: 20px;
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

        input {
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

        p.error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <h2>Login</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
        <a href="cv.html">View CV</a>
        <a href="weather.html">Weather</a>
        <a href="list.php">View list</a>
    </form>
</body>
</html>

