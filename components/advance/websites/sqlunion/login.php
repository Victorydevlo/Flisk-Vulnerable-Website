<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $pdo->query($sql);
    $user = $result->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vulnerable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 50px;
            text-align: center;
        }
        .login-form {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .login-form input {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
            width: 200px;
        }
        .login-form button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color:rgb(61, 255, 51);
            color: white;
            border: none;
            border-radius: 5px;
        }
        .login-form button:hover {
            background-color:rgb(0, 199, 86);
        }
    </style>
</head>
<body>
    <h1>Login to Vulnerable Website</h1>
    
    <div class="login-form">
        <form method="POST">
            Username: <input type="text"  autocomplete="off" name="username" required><br>
            Password: <input type="password"  autocomplete="off" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
