<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Flower Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 50px;
            text-align: center;
        }

        .welcome-message {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            display: inline-block;
        }

        .logout-button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .logout-button:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body>

    <div class="welcome-message">
        <?php
        if ($username === 'Demitry') {
            
            echo "Welcome Demitry, you are surprisingly smart f1aG{D3m1try_1s_Sup3r_Smart_123}";
            echo "<div style='color: green;'></div>";
        } else {
            echo "Welcome, " . htmlspecialchars($username) . ". You are logged in.";
        }
        ?>
    </div>

    <br><br>
    <form action="logout.php" method="POST">
        <button class="logout-button" type="submit">Logout</button>
    </form>

</body>

</html>