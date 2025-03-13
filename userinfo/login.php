<?php
session_start();
include 'connection.php';

$error_message = "";

if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
    $error_message = "You tried too many times. Please try again in " . ceil(($_SESSION['lockout_time'] - time()) / 60) . " minutes.";
} else {
    unset($_SESSION['lockout_time']);
    unset($_SESSION['failed_attempts']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['failed_attempts']) && $_SESSION['failed_attempts'] >= 10) {
        $_SESSION['lockout_time'] = time() + (10 * 60);
        $error_message = "You tried too many times. Please try again in 10 minutes.";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            $_SESSION['error_message'] = "Username and password are required.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

        $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE username = ?");

        if (!$stmt) {
            die("Database error: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];  // Store the user_id in session
                $_SESSION['username'] = $user['username']; 
                $_SESSION['is_admin'] = $user['is_admin']; 

                unset($_SESSION['failed_attempts']); // Reset failed attempts on successful login

                header("Location: ../index.php");  // Redirect to home page after successful login
                exit;
            } else {
                $_SESSION['error_message'] = "Incorrect password. Please try again.";
                increment_failed_attempts();
            }
        } else {
            $_SESSION['error_message'] = "User not found. Please try again.";
            increment_failed_attempts();
        }

        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);  // Redirect to self to re-render the page
        exit;
    }
}

function increment_failed_attempts() {
    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = 0;
    }
    $_SESSION['failed_attempts']++;

    if ($_SESSION['failed_attempts'] >= 10) {
        $_SESSION['lockout_time'] = time() + (10 * 60);
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
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f1f1f;
            color: white;
            padding: 10px 20px;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .login-container {
            width: 300px;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #444;
            border-radius: 4px;
            background: #2a2a2a;
            color: #e0e0e0;
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

        button:hover {
            background-color: #555;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .link {
            margin-top: 10px;
            font-size: 14px;
        }

        .link a {
            color: #bb86fc;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">
            <a href="../index.php" style="color: white; text-decoration: none;">
                <span>Flisk</span>
                <span style="color: blue;">JS</span>
            </a>
        </div>
    </div>

    <div class="login-container">
        <h1>Login</h1>

        <?php if (!empty($_SESSION['error_message'])): ?>
            <div class="error"><?php echo $_SESSION['error_message']; ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
