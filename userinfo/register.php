<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Secure hashing
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO leaderboard (user_id, username, points) VALUES (?, ?, 0)");
    $stmt->bind_param("is", $user_id, $username);
    $stmt->execute();

    $stmt->close();
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            flex-direction: column;
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

        .register-container {
            width: 300px;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 80px;
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
        input[type="email"],
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

    <div class="register-container">
        <h1>Register</h1>

        <?php if (!empty($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{7,}$" title="Password must be at least 7 characters long, including at least one number and one symbol." />
            
            <button type="submit">Register</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>

</html>