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
        <div class="title">Hidden WebPages</div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <strong>What is IDOR?</strong>
            <p>Insecure Direct Object Reference (IDOR) is a security vulnerability where an attacker can access or
                modify
                data that they are not authorized to see, simply by changing a URL parameter, request data, or API
                endpoint.
                This happens when a website does not properly check user permissions before granting access to sensitive
                information.</p>

            <p>For example, if a website retrieves user profiles using a URL like:</p>
            <code>https://example.com/profile?id=123</code>
            <p>An attacker could change the ID number to access another user’s profile, like:</p>
            <code>https://example.com/profile?id=124</code>
            <p>This would allow unauthorized access to another user’s data.</p>

            <strong>What Can IDOR Lead To?</strong>
            <ul>
                <li>Unauthorized access to private user data.</li>
                <li>Manipulation or deletion of sensitive information.</li>
                <li>Account takeovers or privilege escalation.</li>
            </ul>

            <p>For example, if an attacker finds an IDOR vulnerability in a banking website, they might be able to view
                or
                even transfer money from other accounts without authorization. This could lead to serious data breaches
                and
                financial losses.</p>

            <strong>How to Prevent IDOR?</strong>
            <ul>
                <li>Implement proper access control checks on the server side.</li>
                <li>Use session-based authentication and role-based access control (RBAC).</li>
                <li>Avoid exposing direct object references (e.g., user IDs) in URLs.</li>
                <li>Validate and enforce permissions before processing user requests.</li>
            </ul>
        </div>

    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Cipher Encryption and Decryption</h3>
        </div>

        <div class="task-content" id="content2">
            <strong>How an IDOR Attack Works</strong>
            <p>Insecure Direct Object Reference (IDOR) attacks occur when a website does not properly verify user
                permissions,
                allowing attackers to access or manipulate data by modifying request parameters. This can expose
                sensitive information,
                grant unauthorized access, or even allow account takeovers.</p>

            <ul>
                <li><strong>Accessing Unauthorized Data:</strong> Attackers can manipulate URLs or API requests to
                    access another user's
                    account, personal details, or confidential files.</li>
                <li><strong>Modifying User Information:</strong> If an application allows ID-based updates, an attacker
                    might change
                    another user’s data, such as email addresses or passwords.</li>
                <li><strong>Bypassing Authentication:</strong> Poorly secured admin panels or user dashboards can be
                    accessed by simply
                    altering an ID or session token.</li>
            </ul>

            <strong>How Attackers Use Software to Exploit IDOR</strong>
            <p>Attackers often use automated tools and scripts to detect and exploit IDOR vulnerabilities:</p>
            <ul>
                <li><strong>Burp Suite:</strong> A security testing tool that allows attackers to intercept requests,
                    modify user IDs,
                    and analyze server responses.</li>
                <li><strong>SQLmap:</strong> If IDOR is linked to database queries, attackers may use SQL injection
                    tools to extract
                    or modify sensitive information.</li>
                <li><strong>Fuzzing Tools:</strong> Attackers use tools like **ffuf** or **Intruder (Burp Suite)** to
                    automate testing
                    for sequential or predictable ID references.</li>
            </ul>

            <strong>How to Prevent IDOR Attacks</strong>
            <p>To prevent attackers from exploiting IDOR vulnerabilities, follow these security measures:</p>
            <ul>
                <li><strong>Implement Access Controls:</strong> Always check if the user has permission to access the
                    requested data.</li>
                <li><strong>Use Session-Based Authentication:</strong> Ensure that users cannot modify session tokens to
                    access other accounts.</li>
                <li><strong>Avoid Sequential IDs:</strong> Use randomized or hashed identifiers instead of numeric user
                    IDs.</li>
                <li><strong>Perform Security Audits:</strong> Regularly test your website for IDOR vulnerabilities using
                    penetration testing tools.</li>
            </ul>
        </div>

    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content3')">
            <h3>Get Working</h3>
        </div>
        <div class="task-content" id="content3">
            <div class="input-container">
                <p>Lets test your knowledge now, you can use other sources to get your answer.</p>
                <p>What tool can be used to extract information from a website via IDOR?
                </p>
                <input type="text" id="userInput" placeholder="Type your answer here...">
                <button onclick="checkAnswer()">Submit</button>
                <p class="result" id="result"></p>
            </div>

            <div class="input-container">
                <p>What type of information should a developer make sure that they keep secure to prevent this attack
                    from being a serious one?</p>
                <input type="text" id="userInputs" placeholder="Type your answer here...">
                <button onclick="checkAnswer1()">Submit</button>
                <p class="result" id="results"></p>
            </div>


            <div class="input-container">
                <p>Click the button to get the VNC IP and Port</p>
                <button id="vncButton" onclick="showVncInfo()">Get VNC IP & Port</button>
                <div id="vncResult" class="result" style="display: none;"></div>
                <input type="text" id="userInputs2" placeholder="Type your answer here...">
                <button onclick="checkAnswer2()">Submit</button>
                <p class="result" id="results2"></p>
            </div>
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

        function checkAnswer() {
            const correctFlag = 'GoBuster';
            const inputField = document.getElementById('userInput');
            const input = inputField.value.trim();
            const result = document.getElementById('result');

            if (input === correctFlag) {
                result.style.color = 'green';
                result.textContent = 'Correct!';
                inputField.style.backgroundColor = 'lightgreen';
                inputField.style.color = 'black';
                inputField.disabled = true;
            } else {
                result.style.color = 'red';
                result.textContent = 'Incorrect. Try again! make sure you use the correct case';
            }
        }

        function checkAnswer1() {
            const correctFlag = 'Sensitive informations';
            const inputField = document.getElementById('userInputs');
            const input = inputField.value.trim();
            const result = document.getElementById('results');

            if (input === correctFlag) {
                result.style.color = 'green';
                result.textContent = 'Correct!';
                inputField.style.backgroundColor = 'lightgreen';
                inputField.style.color = 'black';
                inputField.disabled = true;
            } else {
                result.style.color = 'red';
                result.textContent = 'Incorrect. Try again!';
            }
        }

        function checkAnswer2() {
            const correctFlag = 'flag{donewithmyvmhack}';
            const inputField = document.getElementById('userInputs2');
            const input = inputField.value.trim();
            const result = document.getElementById('results2');

            if (input === correctFlag) {
                result.style.color = 'green';
                result.textContent = 'Correct!';
                inputField.style.backgroundColor = 'lightgreen';
                inputField.style.color = 'black';
                inputField.disabled = true;
            } else {
                result.style.color = 'red';
                result.textContent = 'Incorrect. Try again!';
            }
        }

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