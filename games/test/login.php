<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf6e3;
        }

        header {
            background-color: #f4c542;
            padding: 20px;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .buttons {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .buttons a {
            text-decoration: none;
            background-color: #5c4033;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
        }

        nav {
            background-color: #5c4033;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #f4c542;
            color: #333;
        }

        .section {
            padding: 20px;
            text-align: center;
        }

        .section h2 {
            color: #f4c542;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #5c4033;
        }

        .login-container input {
            width: 100%;
            max-width: 300px;
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: block;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #5c4033;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #f4c542;
            color: #333;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Login Page</h1>
    </header>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="text" id="username" placeholder="Username" autocomplete="off" required>
            <input type="password" id="password" placeholder="Password" autocomplete="off" required>
            <button type="submit">Login</button>
        </form>
        <p id="errorMessage" class="error"></p>
    </div>
    <footer>
        <p>&copy; 2023 Your Website</p>
    </footer>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (username === 'Administratore' && password === 'notasimpleadmin123') {
            document.querySelector('.login-container').innerHTML = `
                <h2>Success!</h2>
                <p style="font-size: 18px; color: green;">
                    I can't believe you have done it. Wow, wow, 
                    woooooooooooooooooooooooooooooooooooooow!<br><br>
                    <strong style="color: red;">flag{ivewoowedsoomuch}</strong>
                </p>
            `;
        } else {
            document.getElementById('errorMessage').textContent = 'Invalid username or password.';
        }
    });
</script>

</body>
</html>