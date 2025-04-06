<?php

$users = [
    "1" => ["name" => "Queen Bee", "email" => "queen@beenation.com"],
    "2" => ["name" => "Worker Bee", "email" => "worker@beenation.com"],
];

function generateUsers($start, $end)
{
    $users = [];
    $names = ["Bee", "Drone", "Scout", "Guard", "Nurse", "Forager", "Builder", "Cleaner", "Explorer", "Harvester", "Messenger", "Tracker", "Planner", "Trainer", "Researcher", "Inventor", "Healer", "Warrior", "Diplomat", "Strategist", "Navigator", "Miner", "Farmer", "Artist", "Musician", "Chef", "Architect", "Pilot"];

    for ($i = $start; $i <= $end; $i++) {
        $randomName = $names[array_rand($names)] . " Bee";
        $users[$i] = ["name" => $randomName, "email" => strtolower(str_replace(' ', '', $randomName)) . "@beenation.com"];
    }

    return $users;
}

$generatedUsers = generateUsers(30, 69);
$users = array_merge($users, $generatedUsers);

$users["162"] = ["name" => "Admin", "email" => "admin@beenation.com", "flag" => "flag{buzzing_through_idors}"];

$id = $_GET['query'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assuming love.php uses styles.css -->
</head>
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
<body>
    <div class="container">
        <header>
            <h1>Bee Nation</h1>
        </header>
        <main>
            <?php
            if (isset($users[$id])) {
                $user = $users[$id];
                echo "<h2>User Info</h2>";
                echo "<p><strong>Name:</strong> {$user['name']}</p>";
                echo "<p><strong>Email:</strong> {$user['email']}</p>";

                if (isset($user['flag'])) {
                    echo "<p class='flag'>Flag: {$user['flag']}</p>";
                }
            } else {
                echo "<p class='error'>User not found.</p>";
            }
            ?>
        </main>
        <footer>
            <p>&copy; 2023 Bee Nation</p>
        </footer>
    </div>
</body>
</html>