<?php
require_once('classes/Logger.php');
require_once('classes/Helpers.php');

$correct_username = "admin";
$correct_password = "abLErmiCeNtEGaWeRiveTHIathEnTa";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $correct_username && $password === $correct_password) {
        if (isset($_COOKIE['logging'])) {
            unserialize(base64_decode($_COOKIE['logging']));
        }

        $success_message = "Login successfully!";
    } else {
        $error_message = "Invalid username or password.";
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
        * {
            box-sizing: border-box;
        }
        .container {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .login-container input[type="submit"]:hover {
            background-color: #218838;
        }
        .success-message {
            color: green;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2>Login</h2>
            <form id="loginForm" action="login.php" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="submit" value="Login">
            </form>
            <?php if (!empty($success_message)): ?>
                <div id="sucessMessage" class="success-message"><?php echo htmlspecialchars($success_message); ?></div>
            <?php elseif (!empty($error_message)): ?>
                <div id="errorMessage" class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <p><a href="index.php?page=home">Go back to Home</a></p>
        </div>
    </div>
</body>
</html>