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
            <a href="../../index.php" style="color: white; text-decoration: none;">
                <span>Flisk</span>
                <span style="color: blue;">JS</span>
            </a>
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
        <div class="title">Inconsistent Transaction Validation</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p>
                In today's digital world, many websites and applications, especially banking apps, allow users to input
                values like quantities or balances to perform financial transactions. These systems make it incredibly
                convenient for users to transfer or receive money, with just a simple input of the desired amount. This
                ease of use has revolutionized the way we manage and access our finances.
            </p>
            <p>
                However, there can be significant issues that arise from this convenience, one of which is
                <strong>Inconsistent Transaction Validation</strong>. Below are some key concerns that come with this
                vulnerability:
            </p>
            <ul>
                <li><strong>Inconsistent Validation</strong> – The system may fail to properly validate the amounts
                    input by the user, leading to errors like negative balances or improper transfers.</li>
                <li><strong>Lack of Business Rule Enforcement</strong> – Banking systems may not properly enforce rules
                    like preventing negative balances or checking that the user has sufficient funds to complete a
                    transfer.</li>
                <li><strong>Security Risks</strong> – If the system doesn't validate transactions properly, malicious
                    users could exploit it, leading to potential fraud or financial manipulation.</li>
                <li><strong>System Instability</strong> – Without proper validation, transactions can cause unexpected
                    issues, potentially leading to system crashes or data corruption.</li>
            </ul>
            <p>
                To avoid these issues, developers should ensure that proper validation mechanisms are in place to
                protect users and the integrity of the financial system.
            </p>

            <p>An attacker could manipulate the request using browser developer tools (like inspecting network requests)
                to send a transfer amount. If the back-end doesn't validate or enforce this correctly, the transfer
                could be processed, and the attacker would successfully move money without proper checks.</p>
            <p>This kind of vulnerability is called <span class="vulnerability-name">Improper Input Validation</span>
                combined with <span class="vulnerability-name">Insecure Direct Object References (IDOR)</span>.</p>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Getting Your Hand On</h3>
        </div>
        <div class="task-content" id="content2">
            <p>Today, you’ll be testing for vulnerabilities in a simulated bank website. Throughout the session, you’ll
                be asked a series of questions designed to help you identify and exploit weaknesses within the system.
            </p>
            <p>Your goal is to carefully analyze the site and capture the hidden <span class="important">flag</span>,
                which is worth <span class="important">10 points</span>.</p>
            <p class="note">Take your time, stay sharp, and try your best to uncover any vulnerabilities. Good luck!</p>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content3')">
            <h3>Get Working</h3>
        </div>
        <div class="task-content" id="content3">
            <form id="flagForm" action="flagsub/flagweak.php" method="POST">
                <div class="input-container">
                    <p>When an attacker is able to abuse inputs on a system and exploit it how they want its called?</p>
                    <input type="text" id="userInput" name="flag1" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn">Submit</button>
                    <p class="result" id="result"></p>
                    <p id="loadingMessage" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Because its happening in a bank, the vulnerability is called? </p>
                    <input type="text" id="userInput2" name="flag2" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn2">Submit</button>
                    <p class="result" id="results"></p>
                    <p id="loadingMessage2" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Click this button to be sent to a dummy website to test your knowledge</p>
                    <a>
                        <button id="vncButton" onclick="window.open('websites/index.php', '_blank')">Click Me</button>
                        <br>
                        <p>Type the black below</p>
                        <input type="text" id="userInput3" name="flag3" autocomplete="off" placeholder="Type your answer here..." required>
                        <button type="button" id="submitBtn3">Submit</button>
                        <p class="result" id="results2"></p>
                        <p id="loadingMessage3" style="display:none;">Submitting your flag...</p>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        }

        function submitFlag(inputId, resultId, buttonId, loadingId, flagName) {
            const input = document.getElementById(inputId);
            const result = document.getElementById(resultId);
            const button = document.getElementById(buttonId);
            const loadingMessage = document.getElementById(loadingId);

            result.style.color = 'orange';
            result.textContent = 'Submitting your flag...';
            loadingMessage.style.display = 'inline';

            fetch('flagsub/flagweak.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `${flagName}=${encodeURIComponent(input.value.trim())}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        result.style.color = 'green';
                        result.textContent = data.message;
                        input.disabled = true;
                        button.disabled = true;
                    } else {
                        result.style.color = 'red';
                        result.textContent = data.message;
                    }
                    loadingMessage.style.display = 'none';
                })
                .catch(error => {
                    console.error('Error:', error);
                    result.style.color = 'red';
                    result.textContent = 'Something went wrong, please try again.';
                    loadingMessage.style.display = 'none';
                });
        }

        document.getElementById('submitBtn').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput', 'result', 'submitBtn', 'loadingMessage', 'flag1');
        });

        document.getElementById('submitBtn2').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput2', 'results', 'submitBtn2', 'loadingMessage2', 'flag2');
        });

        document.getElementById('submitBtn3').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput3', 'results2', 'submitBtn3', 'loadingMessage3', 'flag3');
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

        input[type="text"],
        {
        margin-bottom: 15px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center
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