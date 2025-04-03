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
        <div class="title">Wireshark</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p> In today's interconnected world, computer systems and networks are constantly exchanging data across
                various communication channels. One of the most powerful tools for analyzing network traffic is
                Wireshark, a popular network protocol analyzer used by both security professionals and attackers. While
                Wireshark serves as an essential tool for monitoring and troubleshooting network activity, it can also
                be misused to capture sensitive information transmitted over unsecured connections. </p>

            <p> <strong>Wireshark</strong> allows users to capture packets traveling through a network interface,
                providing deep insights into the data being transmitted. Attackers can leverage Wireshark to intercept
                unencrypted traffic, exposing sensitive information such as login credentials, session tokens, and
                private messages. Below are some key concerns related to Wireshark's capabilities in capturing other
                people's information: </p>

            <ul>
                <li><strong>Credential Theft</strong> – If a user logs into a website over an unencrypted connection
                    (e.g., HTTP instead of HTTPS), an attacker running Wireshark on the same network can capture and
                    extract usernames and passwords.</li>
                <li><strong>Session Hijacking</strong> – Attackers can capture session cookies transmitted in plaintext,
                    allowing them to impersonate authenticated users and gain unauthorized access to web applications.
                </li>
                <li><strong>Data Interception</strong> – Sensitive data such as emails, chat messages, and financial
                    transactions can be captured and analyzed if not properly encrypted.</li>
                <li><strong>Man-in-the-Middle Attacks</strong> – Wireshark can be used in conjunction with techniques
                    like ARP spoofing to intercept and modify network traffic between two parties.</li>
            </ul>

            <p> Organizations and individuals must take proactive measures to protect their data against unauthorized
                packet sniffing. This includes using encrypted communication channels, implementing strong
                authentication mechanisms, and securing Wi-Fi networks with modern encryption standards. </p>

            <p> In conclusion, while Wireshark is an invaluable tool for network analysis, it can also be exploited by
                attackers to intercept private information. Understanding how such vulnerabilities arise allows
                organizations and individuals to take proactive measures to secure their data and mitigate the risks of
                unauthorized packet sniffing. </p>


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
            <form id="flagForm" action="filechecker/portsub.php" method="POST">
                <div class="input-container">

                
                    <p>In this exercise youll be tasked to find the flag inside of this file and once you have found it
                        you should paste it under here.</p>
                    <p><a href="../../images/hacks/download.php?file=mountain.jpg">Download File</a></p>
                    <p>Once you have downloaded the file, open it in Wireshark and start analyzing the packets. Look for
                        any suspicious activity or unencrypted data that could lead you to the flag.</p>
                    <p>Once you have found the flag, paste it in the input field below and click submit.</p>                
                    <input type="text" id="userInput" autocomplete="off" name="flag1"
                        placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn">Submit</button>
                    <p class="result" id="result"></p>
                    <p id="loadingMessage" style="display:none;">Submitting your flag...</p>

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
                resultDiv.innerText = "VNC IP and Port: 132.145.31.21:5902";
            }, 5000);
        }

        function showHint() {
            var button = document.getElementById("Hint");
            var resultDiv = document.getElementById("Hinthid");

            button.style.display = "none";
            resultDiv.style.display = "block";
            resultDiv.innerText = "Loading VNC IP and Port...";

            let dots = 0;
            let interval = setInterval(() => {
                dots = (dots + 1) % 4;
                resultDiv.innerText = "Incoming Hint" + ".".repeat(dots);
            }, 500);


            setTimeout(() => {
                clearInterval(interval);
                resultDiv.innerText = "make sure to run python3 -m http.server 8081 in a different terminal and being in the correct directory will help you find the flag";
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

            fetch('filechecker/portsub.php', {
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