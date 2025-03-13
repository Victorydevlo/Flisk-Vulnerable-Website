<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
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
        <div class="title">Weak Passwords</div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>Explanation</h3>
        </div>
        <div class="task-content" id="content1">
            <p>//</p>

            <p>///</p>
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
            <div class="input-container">
                <p>Lets test your knowledge now, you can use other sources to get your answer.</p>
                <p>Heres an Encoded message "mshn{fvbuvdbuklyzahukaoljvujlwavmjlhzly}" using what you have learn decode
                    it.</p>
                <input type="text" id="userInput" placeholder="Type your answer here...">
                <button onclick="checkAnswer()">Submit</button>
                <p class="result" id="result"></p>
            </div>

            <div class="input-container">
                <p>Heres a Key "decoder" Decode this message "ipcu{roprycfhejwet!}" using what you have learn decode
                    it.</p>
                <input type="text" id="userInputs" placeholder="Type your answer here...">
                <button onclick="checkAnswer1()">Submit</button>
                <p class="result" id="results"></p>
            </div>

            
            <div class="input-container">
                <p>"uozt{blfzivurmzoobznzhgvizggsrh}" Using what you have learn decode
                    this.</p>
                <input type="text" id="userInputs2" placeholder="Type your answer here...">
                <button onclick="checkAnswer2()">Submit</button>
                <p class="result" id="results2"></p>
            </div>
        </div>
    </div>
    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        }

        function checkAnswer() {
            const correctFlag = 'flag{younowunderstandtheconceptofcaesar}';
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
                result.textContent = 'Incorrect. Try again!';
            }
        }

        function checkAnswer1() {
            const correctFlag = 'flag{okyouareastar!}';
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
            const correctFlag = 'flag{youarefinallyamasteratthis}';
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