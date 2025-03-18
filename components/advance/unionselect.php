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
        <div class="title">SQL Union-based Injection</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <h2>Understanding SQL Union-based Injection</h2>
            <p>In today's digital landscape, websites and applications rely heavily on databases to store and retrieve
                critical user information. From banking platforms to e-commerce sites, these systems use Structured
                Query Language (SQL) to manage data efficiently. However, improper handling of SQL queries can lead to
                serious vulnerabilities, including <strong>Union-based SQL Injection</strong>—a technique attackers use
                to extract sensitive data by manipulating SQL queries with the <code>UNION</code> operator.</p>

            <h3>What is SQL Union-based Injection?</h3>
            <p>SQL Union-based Injection is a specific type of SQL Injection attack that leverages the
                <code>UNION</code> SQL operator to merge the results of two or more queries. If a web application fails
                to properly sanitize user inputs, an attacker can inject additional queries to retrieve unauthorized
                data from different database tables.
            </p>

            <h3>Key Risks of SQL Union-based Injection:</h3>
            <ul>
                <li><strong>Unauthorized Data Retrieval</strong> – Attackers can combine legitimate query results with
                    additional data, extracting sensitive information like usernames, email addresses, or even hashed
                    passwords.</li>
                <li><strong>Exposing Database Structure</strong> – By strategically altering queries, attackers can
                    uncover the number of columns in a table and their data types, making further exploitation easier.
                </li>
                <li><strong>Session Hijacking & Account Takeover</strong> – Attackers may extract authentication tokens,
                    session IDs, or password hashes to impersonate users or gain administrative access.</li>
                <li><strong>Regulatory & Compliance Violations</strong> – A successful attack may lead to exposure of
                    confidential customer data, violating GDPR, PCI-DSS, or other data protection regulations, resulting
                    in legal consequences.</li>
            </ul>

            <h3>How SQL Union-based Injection Works</h3>
            <p>Attackers exploit vulnerable input fields—such as login forms, search bars, or any user-provided
                parameters—by appending a <code>UNION</code> query that forces the database to return additional
                records.</p>

            <h4>Example of a Vulnerable SQL Query:</h4>
            <pre>
SELECT id, name, email FROM users WHERE id = '$user_id';
            </pre>

            <p>If the input is not properly sanitized, an attacker could enter:</p>
            <pre>
1 UNION SELECT 1, username, password FROM users;
            </pre>

            <p>The resulting SQL query would be:</p>
            <pre>
SELECT id, name, email FROM users WHERE id = '1' 
UNION 
SELECT 1, username, password FROM users;
            </pre>

            <p>If the number of selected columns matches, the database returns results from both queries, exposing
                usernames and passwords from the <code>users</code> table.</p>

            <h3>Potential Consequences of SQL Union-based Injection</h3>
            <ul>
                <li><strong>Exposure of User Data</strong> – Attackers can retrieve personal details, login credentials,
                    and even financial information.</li>
                <li><strong>Credential Theft</strong> – Stolen usernames and password hashes can be used for credential
                    stuffing attacks or account takeovers.</li>
                <li><strong>Financial and Legal Repercussions</strong> – Organizations may face lawsuits, fines, and
                    regulatory scrutiny for failing to protect user data.</li>
                <li><strong>Reputation Damage</strong> – A breach can erode customer trust and negatively impact
                    business operations.</li>
            </ul>

            <h3>Preventing SQL Union-based Injection</h3>
            <p>To mitigate this attack, developers should implement <strong>secure coding practices</strong>, including:
            </p>
            <ul>
                <li><strong>Parameterized Queries & Prepared Statements</strong> – Prevents user inputs from being
                    executed as SQL commands.</li>
                <li><strong>Input Validation</strong> – Restricts input formats and blocks special characters used in
                    SQL Injection attempts.</li>
                <li><strong>Least Privilege Principle</strong> – Limits database permissions to prevent unauthorized
                    access to sensitive tables.</li>
                <li><strong>Web Application Firewalls (WAFs)</strong> – Detects and blocks malicious SQL Injection
                    attempts in real time.</li>
            </ul>

            <h3>Conclusion</h3>
            <p>SQL Union-based Injection is a dangerous attack method that can expose sensitive data and compromise
                entire systems. By adopting <strong>secure query practices, input validation, and least privilege access
                    controls</strong>, developers can significantly reduce the risk of exploitation and keep user data
                safe.</p>

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
            <form id="flagForm" action="filechecker/unionsubmission.php" method="POST">
                <div class="input-container">
                    <p>What SQL operator is commonly exploited in a Union-based SQL Injection attack?</p>
                    <input type="text" id="userInput1" autocomplete="off" name="flag1"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn1">Submit</button>
                    <p class="result" id="result1"></p>
                    <p id="loadingMessage1" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>How does an attacker use the UNION operator in SQL Injection to retrieve unauthorized data?</p>
                    <input type="text" id="userInput2" autocomplete="off" name="flag2"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn2">Submit</button>
                    <p class="result" id="result2"></p>
                    <p id="loadingMessage2" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>What type of information can an attacker extract using SQL Union-based Injection?</p>
                    <input type="text" id="userInput3" autocomplete="off" name="flag3"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn3">Submit</button>
                    <p class="result" id="result3"></p>
                    <p id="loadingMessage3" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>What condition must be met for a Union-based SQL Injection attack to succeed?</p>
                    <input type="text" id="userInput4" autocomplete="off" name="flag4"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn4">Submit</button>
                    <p class="result" id="result4"></p>
                    <p id="loadingMessage4" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>What is one security measure that can prevent Union-based SQL Injection attacks?</p>
                    <input type="text" id="userInput5" autocomplete="off" name="flag5"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn5">Submit</button>
                    <p class="result" id="result5"></p>
                    <p id="loadingMessage5" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Click this button to be sent to a dummy website to test your knowledge</p>
                    <a>
                        <button id="vncButton" onclick="window.open('websites/sqlunion/index.php', '_blank')">Click
                            Me</button>
                        <br>
                        <p>Type the flag below</p>
                        <input type="text" id="userInput8" autocomplete="off" name="flag8"
                            placeholder="Type your answer here..." required>
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

            fetch('filechecker/unionsubmission.php', {
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

        document.getElementById('submitBtn1').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput1', 'result1', 'submitBtn1', 'loadingMessage1', 'flag1');
        });

        document.getElementById('submitBtn2').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput2', 'result2', 'submitBtn2', 'loadingMessage2', 'flag2');
        });

        document.getElementById('submitBtn3').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput3', 'result3', 'submitBtn3', 'loadingMessage3', 'flag3');
        });

        document.getElementById('submitBtn4').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput4', 'result4', 'submitBtn4', 'loadingMessage4', 'flag4');
        });

        document.getElementById('submitBtn5').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput5', 'result5', 'submitBtn5', 'loadingMessage5', 'flag5');
        });

        document.getElementById('submitBtn8').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput8', 'result8', 'submitBtn8', 'loadingMessage8', 'flag8');
        });
    </script>
    <style>
        .header {
            height: 200px;
            background: linear-gradient(to right, rgb(48, 40, 11), rgb(214, 194, 13));
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