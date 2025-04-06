<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeNation</title>
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
            background-color: #5c4033; /* Dark brown */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
        }
        nav {
            background-color: #5c4033; /* Dark brown */
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
            background-color: #f4c542; /* Yellow hover effect */
            color: #333;
        }
        .section {
            padding: 20px;
            text-align: center;
        }
        .section h2 {
            color: #f4c542;
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
        <h1>Welcome to BeeNation</h1>
        <p>Your ultimate source for everything about bees!</p>
        <div class="buttons">
            <a href="#login">Login</a>
            <a href="#register">Register</a>
        </div>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact Us</a>
    </nav>
    <section id="about" class="section">
        <h2>Know About Bees</h2>
        <p>Bees are fascinating creatures that play a crucial role in pollination and maintaining biodiversity. They are known for their hard work, teamwork, and the production of honey. Without bees, many plants and crops would struggle to reproduce, making them essential for our ecosystem.</p>
    </section>
    <footer>
        <p>&copy; 2023 BeeNation. All rights reserved.</p>
    </footer>
</body>
</html>