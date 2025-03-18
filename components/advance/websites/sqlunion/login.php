<?php
include 'connection.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } catch (PDOException $e) {
        $error = "SQL Error: " . $e->getMessage();
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
            background-color: rgb(61, 255, 51);
            color: white;
            border: none;
            border-radius: 5px;
        }
        .login-form button:hover {
            background-color: rgb(0, 199, 86);
        }
        .error-message {
            color: red;
            margin-top: 10px;
            word-wrap: break-word;
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Login to Vulnerable Website</h1>
    
    <div class="login-form">
        <form method="POST">
            Username: <input type="text" autocomplete="off" name="username" required><br>
            Password: <input type="password" autocomplete="off" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error)) : ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
