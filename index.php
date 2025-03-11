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

        .user-icon {
            background: none;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
        }

        .user-dropdown:hover .dropdown-menu {
            display: block;
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
                    <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
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


    <div class="header" style="text-align: center; padding: 50px 20px;">
        <h1 style="font-size: 3rem;">
            <span style="color: white;">Make IT.</span>
            <span
                style="background: linear-gradient(90deg, #4facfe, #001f3f); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Protect IT.</span>
        </h1>

        <p style="font-size: 0.9rem; color: #e0e0e0;">On this website you can hone your skills and learn new ones so you
            can protect</p>
        <p style="font-size: 0.9rem; color: #e0e0e0;">Your creations</p>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 40px 20px;">
            <div
                style="background: linear-gradient(90deg,rgb(0, 40, 54),rgb(0, 135, 198),rgb(0, 40, 54)); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Simple Hacks</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with
                </p>
                <a href="components/simplehack.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg,rgb(0, 40, 54),rgb(0, 135, 198),rgb(0, 40, 54)); border-radius: 20px;  border-image-slice: 1;">Learn
                    More</a>
            </div>

            <div
                style="background: linear-gradient(90deg,rgb(63, 31, 0),rgb(208, 131, 55),rgb(63, 31, 0)); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Advanced Hacks</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with
                </p>
                <a href="components/advancehack.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg,rgb(63, 31, 0),rgb(208, 131, 55),rgb(63, 31, 0)); border-radius: 20px;  border-image-slice: 1;">Learn
                    More</a>
            </div>

            <div
                style="background: linear-gradient(90deg,rgb(63, 0, 0),rgb(254, 79, 79),rgb(63, 0, 0)); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Complex Hacks</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with
                </p>
                <a href="components/complexhack.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(142, 3, 3), rgb(254, 79, 79), rgb(142, 1, 1)); border-radius: 20px;  border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>

        <div class="ide-section"
            style="display: flex; justify-content: center; align-items: center; padding: 40px 20px; position: relative;">
            <div style="max-width: 50%; text-align: center;">
                <h2 style="font-size: 2rem; margin-bottom: 20px;">SQL Injection</h2>
                <p style="font-size: 1rem; margin-bottom: 20px; color: #aaa;">Write, run, and debug code securely to
                    prevent unauthorized access and vulnerabilities.</p>
                <button
                    style="background-color: #007bff; border: none; color: black; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 1rem;">Start
                    Learning</button>
            </div>
            <div
                style="position: absolute; top: 50%; left: 10%; transform: translateY(-50%); font-size: 5rem; font-weight: bold; color: gold;">
                #1</div>
        </div>

        <div class="ide-section"
            style="display: flex; justify-content: center; align-items: center; padding: 40px 20px; position: relative;">
            <div style="max-width: 50%; text-align: center;">
                <h2 style="font-size: 2rem; margin-bottom: 20px;">Scanning</h2>
                <p style="font-size: 1rem; margin-bottom: 20px; color: #aaa;">Write, run, and debug code securely to
                    prevent unauthorized access and vulnerabilities.</p>
                <button
                    style="background-color: #007bff; border: none; color: black; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 1rem;">Start
                    Learning</button>
            </div>
            <div
                style="position: absolute; top: 50%; left: 10%; transform: translateY(-50%); font-size: 5rem; font-weight: bold; color: silver;">
                #2</div>
        </div>

        <div class="ide-section"
            style="display: flex; justify-content: center; align-items: center; padding: 40px 20px; position: relative;">
            <div style="max-width: 50%; text-align: center;">
                <h2 style="font-size: 2rem; margin-bottom: 20px;">Scanning</h2>
                <p style="font-size: 1rem; margin-bottom: 20px; color: #aaa;">Write, run, and debug code securely to
                    prevent unauthorized access and vulnerabilities.</p>
                <button
                    style="background-color: #007bff; border: none; color: black; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 1rem;">Start
                    Learning</button>
            </div>
            <div
                style="position: absolute; top: 50%; left: 10%; transform: translateY(-50%); font-size: 5rem; font-weight: bold; color: brown;">
                #3</div>
        </div>
</body>

</html>



<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #1e1e1e;
        color: #f4f4f4;
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
        position: absolute;
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
</style>