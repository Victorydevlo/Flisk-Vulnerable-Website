<?php
session_start();
include '../../userinfo/connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
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
                        <a href="../../profile.php"><i class="fas fa-user"></i> Profile</a>
                        <a href="../../leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a>
                        <a href="../../userinfo/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="../../userinfo/login.php"><button>Login</button></a>
                <a href="../../userinfo/register.php"><button>Register</button></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="header">
        <div class="title">Hidden Hacks</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Task 1: Finding Hidden Flags in an Image</h3>
        </div>
        <div class="task-content" id="content1">
            <p>Hiding a flag inside an image, a technique known as
                <strong>steganography</strong>
                , is a method of concealing information within an image file in such a way that it is not visible to the
                human eye.
            </p>
            <!-- Task Content Here -->
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Task 2: Your Turn</h3>
        </div>

        <div class="task-content" id="content2">
            <div class="input-container">
                <p>In this exercise you'll be tasked to find the flag inside of this file and once you have found it you
                    should paste it under here.</p>
                <p><a href="../../images/hacks/download.php?file=mountain.jpg">Download Image</a></p>
                <p>What’s the Flag?</p>
                <form id="flagForm" action="flag_submission.php" method="POST">
                    <input type="text" id="userInput" name="flag" placeholder="Type your answer here..." required>
                    <button type="submit">Submit</button>
                </form>
                <p class="result" id="result"></p>
            </div>
        </div>
    </div>

    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        }

        document.getElementById('flagForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const input = document.getElementById('userInput').value.trim().toLowerCase();
            const result = document.getElementById('result');

            result.style.color = 'orange';
            result.textContent = 'Submitting your flag...';

            fetch('/flag_sub/flagtwo_submission.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `flag=${encodeURIComponent(input)}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        result.style.color = 'green';
                        result.textContent = data.message;
                    } else {
                        result.style.color = 'red';
                        result.textContent = data.message;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    result.style.color = 'red';
                    result.textContent = 'Something went wrong, please try again.';
                });
        });
    </script>

    <style>
        .header {
            height: 200px;
            background: linear-gradient(to right, #0b1a30, #0d6dd6);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header .title {
            color: white;
            font-size: 2.5em;
            font-weight: bold;
        }

        .task {
            margin: 20px;
            background-color: rgb(34, 37, 42);
            padding: 15px;
            border-radius: 8px;
        }

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .task-header:hover {
            color: rgb(105, 105, 105);
        }

        .task-content {
            margin-top: 10px;
            display: none;
        }

        .task-content img {
            max-width: 100%;
            border-radius: 8px;
        }

        .input-container {
            margin-top: 10px;
        }

        .input-container input {
            padding: 8px;
            border: 1px solid #94a3b8;
            border-radius: 4px;
            width: 90%;
            color: #1e293b;
        }

        .result {
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        button {
            background-color: #007bff;
            border-radius: 10px;
            cursor: pointer;
            border: none;
            padding: 15px 32px;
            float: center;
            margin-top: 10px;
        }
    </style>
</body>

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