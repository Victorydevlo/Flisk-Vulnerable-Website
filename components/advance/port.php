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
        <div class="title">Ports</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p> In today's interconnected world, computer systems and networks rely on open ports to facilitate
                communication between applications, devices, and remote users. While open ports are essential for
                enabling services like web hosting, email, and remote access, they can also pose significant security
                risks if improperly configured or left exposed. </p>

            <p> An <strong>open port</strong> is a network port that is actively listening for incoming connections.
                Attackers often scan networks for open ports to identify potential vulnerabilities and exploit weak
                services. Below are some key concerns related to open port vulnerabilities: </p>

            <ul>
                <li><strong>Unauthorized Access</strong> – If a service running on an open port lacks proper
                    authentication, attackers may gain unauthorized access to sensitive data or system controls.</li>
                <li><strong>Exploitation of Vulnerable Services</strong> – Some services running on open ports may
                    contain security flaws that attackers can exploit to execute arbitrary code or disrupt operations.
                </li>
                <li><strong>Denial of Service (DoS) Attacks</strong> – Attackers can target open ports with overwhelming
                    traffic, causing service disruptions and making applications or networks unavailable.</li>
                <li><strong>Data Interception</strong> – Unencrypted communication through open ports can be
                    intercepted, allowing attackers to steal sensitive information such as login credentials or
                    financial data.</li>
            </ul>

            <p> To illustrate how attackers exploit open ports, consider the following scenario: </p>

            <pre>
# Attacker scanning a network for open ports using Nmap:
nmap -p 1-65535 -T4 -A -v <target_ip>

# Example output showing an exposed SSH port:
22/tcp open  ssh     OpenSSH 8.4p1 Ubuntu 4ubuntu0.6
</pre>

            <p> In the example above, an attacker discovers an open SSH port (22). If the SSH service is misconfigured
                (e.g., using weak passwords or outdated software), the attacker may attempt to brute-force login
                credentials or exploit known vulnerabilities to gain remote access.</p>

            <p> <strong>Potential Risks of Open Port Vulnerabilities:</strong> </p>

            <ul>
                <li><strong>Remote Code Execution</strong> – Attackers can exploit outdated or misconfigured services
                    running on open ports to execute malicious code.</li>
                <li><strong>Network Reconnaissance</strong> – Open ports reveal information about an organization's
                    internal network, making it easier for attackers to plan targeted attacks.</li>
                <li><strong>Ransomware Deployment</strong> – Unsecured ports (e.g., RDP on port 3389) are commonly
                    targeted for ransomware attacks, where attackers encrypt files and demand payment.</li>
                <li><strong>Compromised IoT Devices</strong> – Many Internet of Things (IoT) devices expose open ports,
                    making them vulnerable to hijacking and being used in botnets for large-scale cyber attacks.</li>
            </ul>

            <p> To mitigate the risks of open port vulnerabilities, organizations must implement strict security
                measures, such as: </p>

            <ul>
                <li>Regularly scanning and closing unnecessary open ports.</li>
                <li>Using firewalls and intrusion detection systems to monitor port activity.</li>
                <li>Enforcing strong authentication and encryption on exposed services.</li>
                <li>Keeping software and network services updated to patch known vulnerabilities.</li>
            </ul>

            <p> In conclusion, open ports are necessary for communication but can become major security risks if not
                properly managed. By following best practices, organizations can minimize exposure and protect their
                systems from unauthorized access, data breaches, and cyberattacks. </p>

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
        CTF_FLAG{Open_Ports_Are_Dangerous}

            <div class="input-container">
                <p>An unsecured web service is running on a non-standard port. Your goal is to find the open port and retrieve the flag.</p>
                <strong>Hint:</strong><p> The service is not running on the usual port 80 or 443.</p>
                <strong>Hint:</strong><p>Tools like nmap or curl might help you find the hidden flag.</p>
                <button id="Hint" onclick="showHint()">Secret Hint</button>
                <div id="Hinthid" class="result2" style="display: none;"></div>
            </div>
            <form id="flagForm" action="filechecker/portsub.php" method="POST">
                <div class="input-container">

                    <p>Click the button to get the VNC IP and Port</p>
                    <button id="vncButton" onclick="showVncInfo()">Get VNC IP & Port</button>
                    <div id="vncResult" class="result" style="display: none;"></div>
                    <p>Type the flag below</p>
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