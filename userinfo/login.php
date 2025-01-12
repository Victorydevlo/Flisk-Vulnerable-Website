<?php
session_start();
include 'connection.php';


$error_message = isset($_SESSION['error_message']) ? htmlspecialchars($_SESSION['error_message']) : '';
unset($_SESSION['error_message']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Username and password are required.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];

            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Invalid username or password.";
        }
    } else {
        $_SESSION['error_message'] = "Invalid username or password.";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    </style>
</head>
<body>
    <div class="login-container">
        <h1 style="font-size: 3rem;">
            <span style="background: linear-gradient(90deg, #4facfe, #001f3f); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"> Login</span>
        </h1>


        <?php if (!empty($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>




<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #f4f4f4;
            padding: 10px 20px;
            position: relative;
            z-index: 2;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            flex-grow: center;
        }


        .navbar .auth-buttons {
            position:absolute;
            right: 10px;
            display: flex;
            gap: 10px;
        }

        .navbar .auth-buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .navbar .auth-buttons button:hover {
            background-color: #0056b3;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        input[type="text"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form {
            display: flex;
            flex-direction: column;
        }
    </style>