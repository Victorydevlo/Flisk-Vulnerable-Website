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
        <div class="title">Decryption</div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p>Encryption is the process of converting plaintext data into a coded format (ciphertext) to prevent
                unauthorized access, ensuring data confidentiality and security.
                Decryption is the reverse process, where the encoded data is transformed back into its original form
                using a key or algorithm.</p>

            <p>Common decryption methods include:</p>
            <ul>
                <li><strong>Symmetric Decryption (AES, DES, 3DES)</strong> – Uses the same key for both encryption and
                    decryption.</li>
                <li><strong>Asymmetric Decryption (RSA, ECC)</strong> – Uses a public key for encryption and a private
                    key for decryption.</li>
                <li><strong>Hash-Based Decryption (Rainbow Tables, Brute Force)</strong> – Attempts to reverse hash
                    functions using precomputed tables or exhaustive searching.</li>
            </ul>

            <ul>
                <li>
                    <strong>How it works:</strong>
                    The process involves embedding a flag or secret data within the pixel values or metadata of an image
                    file. The image itself remains visually unchanged,
                    but the hidden information is encoded into the file structure, which can only be retrieved using the
                    right decoding method.
                </li>
            </ul>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Cipher Encryption and Decryption</h3>
        </div>

        <div class="task-content" id="content2">
            <p>Common types of ciphers include:</p>

            <ul>
                <li>
                    <strong>Caesar Cipher</strong> – A substitution cipher that shifts each letter in the plaintext by a
                    fixed number of positions in the alphabet.<br>
                    <strong>Example:</strong> With a shift of 3, "HELLO" becomes "KHOOR".
                </li>

                <li>
                    <strong>Substitution Cipher</strong> – Replaces each letter in the plaintext with another letter,
                    number, or symbol according to a fixed system.<br>
                    <strong>Example:</strong> If A → M, B → N, C → O, etc., then "HELLO" might become "URYYB".
                </li>

                <li>
                    <strong>Vigenère Cipher</strong> – A more complex substitution cipher that uses a keyword to
                    determine multiple shifts, making it harder to break.<br>
                    <strong>Example:</strong> Using the keyword "KEY", "HELLO" is encrypted as "RIJVS".
                </li>
            </ul>

        </div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content3')">
            <h3>Get Working</h3>
        </div>
        <div class="task-content" id="content3">
            <form id="flagForm" action="flagsub/flagdecrypt.php" method="POST">
                <div class="input-container">
                    <p>Decode this message: "mshn{fvbuvdbuklyzahukaoljvujlwavmjlhzly}"</p>
                    <input type="text" id="userInput" name="flag1" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn">Submit</button>
                    <p class="result" id="result"></p>
                    <p id="loadingMessage" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Decode this message: "ipcu{roprycfhejwet!}"</p>
                    <input type="text" id="userInput2" name="flag2" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn2">Submit</button>
                    <p class="result" id="results"></p>
                    <p id="loadingMessage2" style="display:none;">Submitting your flag...</p>
                </div>

                <div class="input-container">
                    <p>Decode this message: "uozt{blfzivurmzoobznzhgvizggsrh}"</p>
                    <input type="text" id="userInput3" name="flag3" autocomplete="off" placeholder="Type your answer here..." required>
                    <button type="button" id="submitBtn3">Submit</button>
                    <p class="result" id="results2"></p>
                    <p id="loadingMessage3" style="display:none;">Submitting your flag...</p>
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

            fetch('flagsub/flagdecrypt.php', {
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