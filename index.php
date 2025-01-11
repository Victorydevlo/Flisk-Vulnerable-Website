<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flisk</title>
</head>
<body>
    <div class="navbar">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <div class="logo">Flisk</div>
        <div class="menu"></div>
        <div class="auth-buttons">
            <button href="/userinfo/login.php">Login</button>
            <button>Register</button>
        </div>
    </div>

    <div class="sidebar" id="sidebar">
        <ul class="nav">
            <button class="close-btn" onclick="toggleSidebar()">✖</button>
            <li><a href="#">Dashboard</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <div class="header" style="text-align: center; padding: 50px 20px;">
    <h1 style="font-size: 3rem;">
            <span style="color: white;">Make IT.</span>
            <span style="background: linear-gradient(90deg, #4facfe, #001f3f); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"> Protect IT.</span>
        </h1>

        <p style="font-size: 0.9rem; color: #e0e0e0;">On this website you can hone your skills and learn new ones so you can protect</p>
        <p style="font-size: 0.9rem; color: #e0e0e0;">Your creations</p>

        <div class="features" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 40px 20px;">
        <div class="feature-card" style="background: linear-gradient(90deg, #4facfe, #001f3f); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Simple Hacks</h3>
            <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with</p>
            <a href="#" style="display: inline-block; margin-top: 10px; color: #fff; text-decoration: none;">Learn More</a>
        </div>

        <div class="feature-card" style="background: linear-gradient(90deg,rgb(63, 31, 0),rgb(208, 131, 55),rgb(63, 31, 0)); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Advanced Hacks</h3>
            <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with</p>
            <a href="#" style="display: inline-block; margin-top: 10px; color: #fff; text-decoration: none;">Learn More</a>
        </div>

        <div class="feature-card" style="background: linear-gradient(90deg,rgb(63, 0, 0),rgb(254, 79, 79),rgb(63, 0, 0)); border-radius: 10px; padding: 20px; width: 200px; text-align: center; color: #fff; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <h3 style="margin-bottom: 10px; font-size: 1.2rem;">Complex Hacks</h3>
            <p style="font-size: 0.9rem; color: #e0e0e0;">Over 60 free Cyber Security courses to get started with</p>
            <a href="#" style="display: inline-block; margin-top: 10px; color: #fff; text-decoration: none;">Learn More</a>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            // Toggle sidebar visibility
            if (sidebar.classList.contains('active')) {
                closeSidebar();
            } else {
                sidebar.classList.add('active');
                overlay.classList.add('active');
            }
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }
    </script>
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
            background-color: #2c2c2c;
            color: #f4f4f4;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 2;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            flex-grow: center;
        }

        .navbar .menu {
            display: flex;
            align-items: center;
        }

        .navbar .menu a {
            color: #f4f4f4;
            text-decoration: none;
            margin: 0 10px;
            font-size: 16px;
        }

        .navbar .menu a:hover {
            text-decoration: underline;
        }

        .navbar .toggle-btn {
            position: absolute;
            left: 10px;
            background-color: #3a3a3a;
            color: #f4f4f4;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
        }

        .toggle-btn {
            background-color: #3a3a3a;
            color: #f4f4f4;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 20px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c2c2c;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: -250px;
            padding: 20px;
            transition: left 0.3s ease;
            z-index: 3;
            visibility: hidden;
        }

        .sidebar.active {
            left: 0;
            visibility: visible;
        }

        .sidebar .nav {
            list-style: none;
            padding: 0;
        }

        .sidebar .nav li {
            margin-bottom: 10px;
        }

        .sidebar .nav a {
            color: #f4f4f4;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar .nav a:hover {
            background-color: #3a3a3a;
        }

        .sidebar .close-btn {
            background: none;
            color: #f4f4f4;
            border: none;
            right: 0;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 2;
        }

        .overlay.active {
            visibility: visible;
            opacity: 1;
        }

        .main {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main.active {
            margin-left: 250px;
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