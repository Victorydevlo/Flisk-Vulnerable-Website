<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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

        .instagram-post {
            max-width: 1700px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .instagram-header {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .instagram-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .instagram-header .author {
            font-weight: bold;
            color: #333;
        }

        .instagram-content {
            padding: 15px;
            text-align: left;
            color: #333;
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
        <h1>About This Project</h1>
        <div class="buttons">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </header>

    <nav>
        <a href="about.php">About</a>
        <a href="challenges.php">Challenges</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="section">
        <h2>Welcome to the Vulnerability Playground</h2>
        <p>This project is designed to help learners explore and understand common web vulnerabilities through fun, interactive challenges.</p>
    </div>

    <div class="instagram-post">
        <div class="instagram-header">
            <img src="https://i.pravatar.cc/40?img=5" alt="Profile Picture">
            <span class="author">mary</span>
        </div>
        <div class="instagram-content">
            <p>“Built this vulnerable site so you can break it (legally). Learn XSS, SQLi, IDOR, and more! Have fun capturing those flags 🏴‍☠️”</p>
        </div>
    </div>

    <div class="instagram-post">
        <div class="instagram-header">
            <img src="https://i.pravatar.cc/40?img=10" alt="Profile Picture">
            <span class="author">john</span>
        </div>
        <div class="instagram-content">
            <p>“I absolutely love this site! It's such a fun way to learn about web vulnerabilities.”</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Vulnerability Playground</p>
    </footer>
</body>
</html>
