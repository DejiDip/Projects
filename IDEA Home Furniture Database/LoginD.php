<?php
session_start();

// Function to validate administrator credentials
function validateAdmin($username, $password) {
    // Check if the admin file exists
    $adminFile = 'admin.txt';
    $adminUsername = 'admin';
    $adminPassword = 'admin';  
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

// Function to validate consumer credentials
    
function validateCons($username, $password) {
    // Check if the consumer file exists
    $consumerFile = 'consumer.txt';
    $FileC = 'consumer.txt';   
    $UsernameC = 'consumer';
    $PasswordC = 'consumer';  
    $hashedPassword = password_hash($PasswordC, PASSWORD_DEFAULT);
    $dataToStore = $UsernameC . '|' . $hashedPassword . "\n";
    file_put_contents('consumer.txt', $dataToStore, FILE_APPEND);
    if (file_exists($consumerFile)) {
        // Read consumer details from the file
        $consumerDetails = file($consumerFile, FILE_IGNORE_NEW_LINES);

        // Check if the provided credentials match any consumer
        foreach ($consumerDetails as $consumer) {
            list($consumerUsername, $hashedPassword) = explode('|', $consumer);
            if ($username == $consumerUsername && password_verify($password, $hashedPassword)) {
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
        // Set session variables for admin
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = true;

        // Redirect to the admin dashboard
        header('Location: Temp.php');
        exit();
    } elseif (validateCons($username, $password)) {
        // Set session variables for consumer
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = false;

        // Redirect to the consumer dashboard
        header('Location: Consumer.php');
        exit();
    } else {
        $error = 'Invalid username or password P.S the password and username for administrators is admin and for consumer it is consumer';
        // Add this after $error = 'Invalid username or password';
        echo 'Provided Username: ' . $username . '<br>';
        echo 'Provided Password: ' . $password . '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('Furn.jpg');
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <h2>If you are a guest, you can <a href="Consumer.php">view products here</a>.</h2>
    </div>
</body>
</html>

