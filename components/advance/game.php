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
        <div class="title">Bin Walk</div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p><strong>Hidden Messages in Images</strong> is a fascinating technique often used in steganography, where
                data is concealed within an image file. This method can also be exploited to hide malicious payloads or
                sensitive information that can only be extracted using specialized tools like <code>binwalk</code>.</p>

            <p>Binwalk is a powerful tool used for analyzing and extracting embedded files and data from binary files,
                such as images. It is commonly used in reverse engineering and security research to uncover hidden
                content.</p>

            <p>Below are some key aspects of hiding messages in images:</p>

            <ul>
                <li><strong>Embedding Data</strong> – Data can be embedded into the unused or less noticeable parts of
                    an image file, such as metadata or unused bits in pixel data.</li>
                <li><strong>Extraction Tools</strong> – Tools like <code>binwalk</code> can be used to analyze the
                    structure of an image file and extract hidden content.</li>
                <li><strong>Obfuscation</strong> – Advanced techniques can be used to further obfuscate the hidden data,
                    making it harder to detect without the right tools.</li>
                <li><strong>Security Risks</strong> – This technique can be exploited by attackers to hide malicious
                    code or sensitive information within seemingly harmless image files.</li>
            </ul>

            <p>To uncover hidden messages in images, follow these steps:</p>

            <ul>
                <li><strong>Analyze the Image</strong> – Use <code>binwalk</code> to scan the image file for embedded
                    data or unusual patterns.</li>
                <li><strong>Extract Hidden Content</strong> – If <code>binwalk</code> detects hidden data, use its
                    extraction capabilities to retrieve the embedded content.</li>
                <li><strong>Inspect the Extracted Data</strong> – Examine the extracted files or data for any meaningful
                    information or clues.</li>
            </ul>

            <p>In conclusion, hiding messages in images is a double-edged sword that can be used for both legitimate
                purposes and malicious activities. Understanding how this technique works and how to detect it is
                crucial for security professionals and researchers.</p>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Getting Your Hand On</h3>
        </div>
        <div class="task-content" id="content2">
            <p>Today, you’ll be working with an image file that contains hidden data. Your task is to analyze the image
                and extract the concealed message using <code>binwalk</code>.</p>
            <p>Your goal is to carefully inspect the image file and uncover the hidden <span
                    class="important">message</span>, which is worth <span class="important">35 points</span>.</p>
            <p class="note">Take your time, stay sharp, and try your best to uncover the hidden content. Good luck!</p>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content3')">
            <h3>Get Working</h3>
        </div>
        <div class="task-content" id="content3">
            <form id="flagForm" action="filechecker/binwalksub.php" method="POST">
                <div class="input-container">

                    <p>Click the button to get the VNC IP and Port</p>
                    <p>Download the image bellow and you your knowledge to extract the file.</p>
                    <p><a href="../../images/hacks/download.php?file=bin_walk.jpg">Download Files</a></p>
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
                resultDiv.innerText = "VNC IP and Port: 132.145.31.21:5901";
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

            fetch('filechecker/binwalksub.php', {
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