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
                        <a href="../profile.php"><i class="fas fa-user"></i> Profile</a>
                        <a href="../leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a>
                        <a href="../logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
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
                style="position: relative; background: url('../images/lock.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">SQL Injection</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Lets get you started with some SQL
                        Injections
                    </p>
                    <a href="advance/sql.php"
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
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">UNION Selection</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Lets get you started with some SQL UNION
                        Selection
                    </p>
                    <a href="advance/unionselect.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/lock8.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Ports</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Exploit and scan for open ports
                    </p>
                    <a href="advance/port.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/meta.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">MetaEsploit</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Youll be using vm to learn and exploit
                        ports
                    </p>
                    <a href="advance/meta.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>


        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/wire.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">WireShark</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Learning Wireshark
                    </p>
                    <a href="advance/wireshark.php"
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
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Command Injection</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> 
                    </p>
                    <a href="advance/cmdinjection.php"
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
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Local File Inclusion (LFI)</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> 
                    </p>
                    <a href="advance/lfi.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/wire.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">WireShark</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Learning Wireshark
                    </p>
                    <a href="advance/wireshark2.php"
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
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">SQL Injection</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);"> Lets get you started with some SQL
                        Injections
                    </p>
                    <a href="advance/sql2.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/lock19.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Bin Walking</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);">
                    </p>
                    <a href="advance/binwalk.php"
                        style="display: inline-block; padding: 5px 10px; margin-top: 10px; color: #fff; text-decoration: none; border: 2px solid transparent; border-image: linear-gradient(90deg, rgb(52, 52, 52), rgb(103, 103, 103), rgb(65, 65, 65)); border-radius: 20px; border-image-slice: 1;">Learn
                        More</a>
                </div>
            </div>
        </div>

        <div style="text-align: center; padding: 40px 20px;">
            <div
                style="position: relative; background: url('../images/lock19.jpg') center/cover; border-radius: 10px; padding: 20px; width: 300px; height: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); overflow: hidden;">
                <div
                    style="content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1; border-radius: 10px;">
                </div>
                <div style="position: relative; z-index: 2;">
                    <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Can you Crack it</h3>
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);">
                    </p>
                    <a href="advance/game.php"
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
                    <p style="font-size: 0.9rem; color:rgb(163, 163, 163);">
                    </p>
                    <a href="advance/examination.php"
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