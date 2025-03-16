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
            <p> In today's digital world, many websites and applications, especially those involving sensitive data like
                banking apps, rely heavily on databases to store and retrieve important user information. These systems
                use structured query language (SQL) to interact with databases and process tasks such as login
                authentication, retrieving user profiles, or managing transactions. While SQL is a powerful tool,
                improper handling of user input can create serious vulnerabilities. </p>
            <p> One of the most common vulnerabilities is <strong>SQL Injection</strong>, where an attacker can
                manipulate a website’s database query to execute unauthorized commands. Below are some key concerns that
                arise from SQL Injection attacks: </p>
            <ul>
                <li><strong>Unauthorized Data Access</strong> – Attackers can inject malicious SQL statements to gain
                    unauthorized access to sensitive information, such as usernames, passwords, or credit card details.
                </li>
                <li><strong>Data Manipulation</strong> – SQL Injection allows attackers to modify or delete data in the
                    database, potentially changing financial records, user profiles, or even deleting all user data.
                </li>
                <li><strong>Authentication Bypass</strong> – An attacker can manipulate SQL queries to bypass login
                    authentication and impersonate legitimate users, gaining full access to user accounts.</li>
                <li><strong>Privilege Escalation</strong> – In some cases, attackers can escalate their privileges,
                    gaining administrator rights and control over the entire system.</li>
            </ul>
            <p> To perform a SQL Injection attack, an attacker typically exploits input fields such as login forms,
                search boxes, or any other area where the system queries a database based on user input. If the system
                fails to properly validate or sanitize this input, the attacker can insert SQL code that is executed by
                the database. </p>
            <p> For example, consider a login form that asks for a username and password. If the input fields are not
                properly sanitized, an attacker might enter the following: </p>
            <pre> Username: ' OR 1=1 -- Password: (anything) </pre>
            <p> This could modify the SQL query to something like: </p>
            <pre> SELECT * FROM users WHERE username = '' OR 1=1 --' AND password = ' (anything) </pre>
            <p> The query above would always return true (since 1=1 is always true), bypassing authentication and
                potentially allowing the attacker to log in as an administrator or access sensitive data. </p>
            <p> <strong>Potential Breaches and Effects of SQL Injection Attacks:</strong> </p>
            <ul>
                <li><strong>Data Exposure</strong> – Attackers can steal sensitive information like user credentials,
                    payment details, and personal data.</li>
                <li><strong>Financial Losses</strong> – For banking or financial applications, SQL Injection could lead
                    to fraudulent transactions or loss of funds.</li>
                <li><strong>Reputation Damage</strong> – A successful SQL Injection attack can seriously damage the
                    reputation of the affected company or website, causing users to lose trust.</li>
                <li><strong>Complete System Compromise</strong> – In some cases, attackers can gain administrative
                    access to the database and potentially take full control of the application, leading to complete
                    system failure or exploitation.</li>
            </ul>
            <p> To avoid SQL Injection attacks, developers must implement strict input validation, use parameterized
                queries, and adopt secure coding practices that separate user data from SQL queries. This ensures that
                user input is never directly executed as part of a query, protecting the application from these types of
                attacks. </p>
            <p> In summary, SQL Injection is a serious security vulnerability that can lead to data breaches, financial
                loss, and significant damage to an organization's credibility. By following best practices, such as
                input validation and using secure query methods, these risks can be mitigated. </p>
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
                which is worth <span class="important">35 points</span>.</p>
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
                    <p>What is the term used to describe the attack where an attacker manipulates a website's input
                        fields to execute unauthorized SQL commands?</p>
                    <input type="text" id="userInput" name="flag1" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn">Submit</button>
                    <p class="result" id="result"></p>
                    <p id="loadingMessage" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>What are some of the potential consequences of a successful SQL Injection attack on a banking website?</p>
                    <input type="text" id="userInput2" name="flag2" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn2">Submit</button>
                    <p class="result" id="results"></p>
                    <p id="loadingMessage2" style="display:none;">Submitting your flag...</p>
                </div>
                <div class="input-container">
                    <p>What is one common consequence of SQL injection attacks that can affect the integrity of user
                        data?</p>
                    <input type="text" id="userInput3" name="flag3" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn3">Submit</button>
                    <p class="result" id="result3"></p>
                    <p id="loadingMessage3" style="display:none;">Submitting your flag...</p>
                </div>
                <div class="input-container">
                    <p>Click this button to be sent to a dummy website to test your knowledge</p>
                    <a>
                        <button id="vncButton" onclick="window.open('websites/sqlinjection/index.php', '_blank')">Click Me</button>
                        <br>
                        <p>Type the black below</p>
                        <input type="text" id="userInput8" name="flag8" placeholder="Type your answer here..." required>
                        <button type="button" id="submitBtn8">Submit</button>
                        <p class="result" id="result8"></p>
                        <p id="loadingMessage8" style="display:none;">Submitting your flag...</p>
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
            submitFlag('userInput3', 'results3', 'submitBtn3', 'loadingMessage3', 'flag3');
        });

        document.getElementById('submitBtn4').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput4', 'result4', 'submitBtn4', 'loadingMessage4', 'flag4');
        });

        document.getElementById('submitBtn5').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput5', 'result5', 'submitBtn5', 'loadingMessage5', 'flag5');
        });

        document.getElementById('submitBtn6').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput6', 'result6', 'submitBtn6', 'loadingMessage6', 'flag6');
        });

        document.getElementById('submitBtn7').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput7', 'result7', 'submitBtn7', 'loadingMessage7', 'flag7');
        });

        document.getElementById('submitBtn8').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput8', 'result8', 'submitBtn8', 'loadingMessage8', 'flag8');
        });
    </script>
    <style>
        .header {
            height: 200px;
            background: linear-gradient(to right,rgb(48, 40, 11),rgb(214, 194, 13));
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