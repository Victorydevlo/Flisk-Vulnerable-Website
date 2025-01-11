<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
</head>
<body>
    <div class="navbar" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #1f1f1f; color: white;">
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

    <footer style="justify-content: center; background-color:rgb(0, 0, 0);">
        <p>Author: Victory Ukaegbu</p>
        <p><a href="mailto:hege@example.com">LBU leeds</a></p>
    </footer>
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
            position:absolute;
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