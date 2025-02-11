<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
</head>

<body>
    <div class="navbar"
        style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #1f1f1f; color: white;">
        <div class="logo" style="font-size: 1.5rem; font-weight: bold; gap: 1.2rem;">
            <span style="color: white;">Flisk</span>
            <span style="color: blue;">JS</span>
        </div>
        <div class="auth-buttons">
            <a href="userinfo/login.php">
                <button>Login</button>
            </a>
            <a href="userinfo/login.php">
                <button>Register</button>
            </a>
        </div>
    </div>

    <div class="header">
        <div class="title">Your Journey</div>
    </div>
    <div class="task">
        <div class="task-header" onclick="toggleContent('content1')">
            <h3>How this works</h3>
        </div>
        <div class="task-content" id="content1">
            <p>Welsome to your Learner Path
                <strong>Flag Example</strong>
                Here you will learn how this website works and how you catpure the flags
            </p>
            <ul>
                <li>
                    <strong>How it works:</strong>
                    you will be asked to do specific tasks which will be explained to you very briefly on each section
                    and the flag will be hidden in each section for example the answer for this exercise is flag{firtst}
                </li>
            </ul>
        </div>
    </div>

    <div class="task">
        <div class="task-header" onclick="toggleContent('content2')">
            <h3>Flag Insertion</h3>
        </div>

        <div class="task-content" id="content2">
            <div class="input-container">
                <p>Whats the Flag?</p>
                <input type="text" id="userInput" placeholder="Type your answer here...">
                <button onclick="checkAnswer()">Submit</button>
                <p class="result" id="result"></p>
            </div>
        </div>
    </div>

    <script>
        function toggleContent(id) {
            const content = document.getElementById(id);
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        }

        function checkAnswer() {
            const input = document.getElementById('userInput').value.trim().toLowerCase();
            const result = document.getElementById('result');

            if (input === 'flag{firtst}') {
                result.style.color = 'green';
                result.textContent = 'Correct!';
            } else {
                result.style.color = 'red';
                result.textContent = 'Incorrect. Try again!';
            }
        }
    </script>
    <style>
        .header {
            height: 200px;
            background: linear-gradient(to right,rgb(11, 48, 35),rgb(13, 214, 150));
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