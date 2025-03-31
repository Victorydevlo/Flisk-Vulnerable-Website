<?php
session_start();
include '../../userinfo/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <style>
        textarea {
            width: 60%;
            height: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross Site Scripting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #333;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;

        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
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
<div class="navbar">
    <div class="logo">
        <a href="../../../index.php" style="color: white; text-decoration: none;">
            <span style="color: black">Flisk</span>
            <span style="color: blue;">JS</span>
        </a>
    </div>
    <div class="auth-buttons">
        <?php if (isset($_SESSION['username'])): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <div class="user-dropdown">
                <button class="user-icon"><i class="fas fa-user-circle"></i></button>
                <div class="dropdown-menu">
                    <a href="../../../profile.php"><i class="fas fa-user"></i> Profile</a>
                    <a href="../../../leaderboard.php"><i class="fas fa-trophy"></i> Leaderboard</a>
                    <a href="../../../userinfo/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                </div>
            </div>
        <?php else: ?>
            <a href="../../../userinfo/login.php"><button>Login</button></a>
            <a href="../../../userinfo/register.php"><button>Register</button></a>
        <?php endif; ?>
    </div>
</div>

<body>
<div style="width: 97%; padding: 20px; background-color:rgb(253, 68, 0); text-align: center; border-radius: 4px;">
    <h1 style="margin: 0; color: black;">Product Website</h1>
</div>
<div style="display: flex; gap: 20px; padding: 20px;">
    <div style="width: 20%; background-color: #f2f2f2; padding: 10px; border-radius: 8px;">
        <h3>Search</h3>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search products..." style="width: 90%; padding: 8px; margin-bottom: 10px;">
            <button type="submit" style="width: 100%; padding: 8px; background-color: orange; color: white; border: none; border-radius: 4px;">Search</button>
        </form>
        <?php if (isset($_GET['search'])): ?>
            <p style="margin-top: 10px; color: red;">Search term: <?php echo htmlspecialchars($_GET['search']); ?></p>
        <?php endif; ?>
    </div>
    <div style="width: 80%; display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        <?php 
        $products = [
            ['title' => 'Soap', 'price' => '$1000', 'image' => 'images/soap.jpg'],
            ['title' => 'Bottle', 'price' => '$2000', 'image' => 'images/bottle.jpg'],
            ['title' => 'Laptop', 'price' => '$3000', 'image' => 'images/laptop.jpg'],
            ['title' => 'Cover', 'price' => '$4000', 'image' => 'images/cover.jpg'],
            ['title' => 'Mouse', 'price' => '$5000', 'image' => 'images/mouse.jpg']
        ];

        $searchTerm = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

        foreach ($products as $product):
            if ($searchTerm === '' || 
                strpos(strtolower($product['title']), $searchTerm) !== false || 
                strpos(strtolower($product['price']), $searchTerm) !== false): ?>
                <div style="border: 1px solid #ddd; border-radius: 8px; padding: 10px; background-color: #fff; text-align: center;">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" style="width: 100%; border-radius: 8px;">
                    <h3><?php echo htmlspecialchars($product['title']); ?></h3>
                    <p style="color: green; font-weight: bold;"><?php echo htmlspecialchars($product['price']); ?></p>
                </div>
            <?php endif; 
        endforeach; ?>
    </div>
</div>
</body>

</html>