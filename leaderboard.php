<?php
session_start();
include 'userinfo/connection.php';

// Fetch the leaderboard data (user names and their points)
$query = "
    SELECT u.username, COALESCE(l.points, 0) AS points
    FROM users u
    LEFT JOIN leaderboard l ON u.id = l.user_id
    ORDER BY points DESC, u.username ASC"; // Sort by points DESC, then by name ASC

$result = $conn->query($query);

if ($result === false) {
    die("Error fetching leaderboard: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f1f1f;
            color: white;
            padding: 10px 20px;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .leaderboard-container {
            width: 80%;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 100px;
            color: white;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #444;
        }

        th {
            background-color: #333;
        }

        tr:nth-child(even) {
            background-color: #2a2a2a;
        }

        tr:nth-child(odd) {
            background-color: #1f1f1f;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <a href="index.php" style="color: white; text-decoration: none;">
            <span>Flisk</span>
            <span style="color: blue;">JS</span>
        </a>
    </div>
</div>

<div class="leaderboard-container">
    <h1>Leaderboard</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Username</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rank = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rank . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['points']) . "</td>";
                    echo "</tr>";
                    $rank++;
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users found in the leaderboard.</p>
    <?php endif; ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
