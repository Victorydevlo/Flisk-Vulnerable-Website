<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1e1e1e;
            color: #f4f4f4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #1f1f1f;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .auth-buttons button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .auth-buttons button:hover {
            background-color: #0056b3;
        }

        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #333;
            border-radius: 8px;
            min-width: 150px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            padding: 10px;
            transition: background 0.3s;
        }

        .dropdown-menu a:hover {
            background: #444;
        }

        .logout {
            color: red !important;
            font-weight: bold;
        }

        .logout:hover {
            background: darkred;
        }

        .user-dropdown:hover .dropdown-menu {
            display: block;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-top: 20px;
        }

        .profile-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #007bff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            color: white;
            font-weight: bold;
        }

        .username {
            margin-top: 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
<div class="navbar">
        <div class="logo">
            <span style="color: white;">Flisk</span>
            <span style="color: blue;">JS</span>
        </div>

        <div class="auth-buttons">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <div class="user-dropdown">
                    <button class="user-icon"><i class="fas fa-user-circle"></i></button>
                    <div class="dropdown-menu">
                        <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
                        <a href="leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a>
                        <a href="help.php"><i class="fas fa-help"></i> Help</a>
                        <a href="userinfo/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="userinfo/login.php">
                    <button>Login</button>
                </a>
                <a href="userinfo/register.php">
                    <button>Register</button>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <?php if (isset($_SESSION['username'])): ?>
        <div class="profile-container">
            <div class="profile-logo">
                <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
            </div>
            <div class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
        </div>
    <?php endif; ?>
</body>

</html>
