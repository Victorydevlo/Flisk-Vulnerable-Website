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
                <a href="../../userinfo/login.php">
                    <button>Login</button>
                </a>
                <a href="../../userinfo/register.php">
                    <button>Register</button>
                </a>
            <?php endif; ?>
        </div>
    </div>

<div style="display: flex; flex-wrap: wrap; justify-content: left;">
    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/start.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Beginners Journey</h3>
                <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Lets Start With something simple
                </p>
                <a href="simple/start.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>
    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/lock.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Cross Site Scripting</h3>
                <p style="font-size: 0.9rem; color:rgb(163, 163, 163);">
                </p>
                <a href="complex/xss.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/dec.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Cross Site Request Forgery</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;">
                </p>
                <a href="complex/cxrf.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding: 40px 15px;">
        <div
            style="position: relative; background: url('../images/lock3.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Privilage Escalation</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;">
                </p>
                <a href="complex/privilage.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding: 40px 15px;">
        <div
            style="position: relative; background: url('../images/hidden.png') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Race Condition Exploit</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;"><i></i>
                </p>
                <a href="simple/hiddenweb.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/lock2.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Docker Escape</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;"><i>In this exercise you will learn how to access hidden pages
                     in a website and prevent it</i>
                </p>
                <a href="simple/hiddenweb.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    
    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/lock3.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Decrption made Hard</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;"><i>In this exercise you will learn how to access hidden pages
                     in a website and prevent it</i>
                </p>
                <a href="complex/decrypt.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    <div style="text-align: center; padding: 40px 20px;">
        <div
            style="position: relative; background: url('../images/lock2.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
            <div
                style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
            </div>
            <div style="position: relative; z-index: 2;">
                <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Exams</h3>
                <p style="font-size: 0.9rem; color: #e0e0e0;"><i>In this exercise you will learn how to access hidden pages
                     in a website and prevent it</i>
                </p>
                <a href="complex/examination.php"
                    style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                    More</a>
            </div>
        </div>
    </div>

    
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
        top: 9px;
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