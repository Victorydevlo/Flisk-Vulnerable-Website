<?php
session_start();
include '../../userinfo/connection.php';
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mmgame";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function executeQuery($conn, $query)
{
    $blacklist = ['DROP', 'DELETE', 'UPDATE'];
    foreach ($blacklist as $word) {
        if (stripos($query, $word) !== false) {
            return "<p style='color: red;'>Invalid query detected!</p>";
        }
    }
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $output = "<table><tr>";
            $columns = array_keys($result->fetch_assoc());
            foreach ($columns as $col) {
                $output .= "<th>" . htmlspecialchars($col) . "</th>";
            }
            $output .= "</tr>";
            $result->data_seek(0);
            while ($row = $result->fetch_assoc()) {
                $output .= "<tr>";
                foreach ($columns as $col) {
                    $output .= "<td>" . htmlspecialchars($row[$col]) . "</td>";
                }
                $output .= "</tr>";
            }
            $output .= "</table>";
            return $output;
        } else {
            return "<p>No results found.</p>";
        }
    } else {
        return "<p style='color: red;'>Invalid query format!</p>";
    }
}

function checkKiller($conn, $query)
{
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $result = $conn->query("SELECT * FROM solutions WHERE name = 'Demitry Colton'");
    
    if ($result && $result->num_rows > 0) {
        $conn->query("DELETE FROM solutions");
        return "<p>Well done, Demitry Colton is the killer! Here’s the flag: flag{GoldMedalMaster}</p>";
    }

    $conn->query("DELETE FROM solutions");
    return "<p>They are not the killer!</p>";
}

$result1 = $result2 = $result3 = $result4 ="";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['query1'])) {
        $query1 = trim($_POST['query1']);
        $result1 = executeQuery($conn, $query1);
    }
    if (isset($_POST['query2'])) {
        $query2 = trim($_POST['query2']);
        $result2 = executeQuery($conn, $query2);
    }
    if (isset($_POST['query3'])) {
        $query3 = trim($_POST['query3']);
        $result3 = executeQuery($conn, $query3);
    }
    if (isset($_POST['query4'])) {
        $query4 = trim($_POST['query4']);
        $result4 = checkKiller($conn, $query4);
    }
}

$conn->close();
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
    <title>SQL Murder Mystery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
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
    <h1>SQL Murder Mystery</h1>
    <p>Solve the case</p>

    <img src="../images/ss.jpg" style="width: 750px;" class="  display: block; margin-left: auto; margin-right: auto;">

    <h3>There has been a serious murder is West City! and you have been hired to solve this crime
        We trust in you. </h3>
    <p>use what you have learned about SQL to solve this crime, there are going to be help along side you.</p>

    <h1> West City UnderGround Murder </h1>

    <p>As the police officer who has been put in charge of solving this crime, you work day and night on this,
        but somehow you slept in and lost the police report that was given to you, you do remember that
        the crime happened in West city on April 10th 2025.
    </p>

    <h2> Database </h2>

    <p>To see evrything in the database run
        <strong>
            SHOW tables;
        </Strong>
    </p>

    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query1"
            placeholder="Enter your SQL command here..."><?php echo isset($_POST['query1']) ? htmlspecialchars($_POST['query1']) : ''; ?></textarea>
        <br>
        <button type="submit">RUN ⇩</button>
    </form>
    <div><?php echo $result1; ?></div>

    <p>You will have to use a detabase to retrive the information that you need to solve this crime
        heres an example of the Database bellow, run this command - <Strong> Select * From reports where name = 'John
            Doe'</Strong>

    </p>
    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query2"
            placeholder="Enter your SQL command here..."><?php echo isset($_POST['query2']) ? htmlspecialchars($_POST['query2']) : ''; ?></textarea>
        <br>
        <button type="submit">RUN ⇩</button>
    </form>
    <div><?php echo $result2; ?></div>


    <p>Now that you have what you need to find the murderer you can begin. If you're really comfortable with SQL, you
        can probably get it from here.
    </p>
    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query3"
            placeholder="Enter your SQL command here..."><?php echo isset($_POST['query3']) ? htmlspecialchars($_POST['query3']) : ''; ?></textarea>
        <br>
        <button type="submit">RUN ⇩</button>
    </form>
    <div><?php echo $result3; ?></div>

    <h1>Insert Answer here</h1>
    <p>INSERT INTO solutions VALUES ("") and if the name you have inserted is correct you will get the points</p>
    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query4" 
        placeholder="Enter your SQL command here..."><?php echo isset($_POST['query4']) ? htmlspecialchars($_POST['query4']) : ''; ?></textarea>
        <br>
        <button type="submit">RUN ⇩</button>
    </form>
    <div><?php echo $result4; ?></div>

    <script>
        function updateLineNumbers() {
            let textArea = document.getElementById('queryInput');
            let lines = textArea.value.split('\n').length;
            let lineNumbers = document.getElementById('lineNumbers');
            lineNumbers.innerHTML = Array.from({ length: lines }, (_, i) => i + 1).join('<br>');
        }
        updateLineNumbers();
    </script>

</body>

</html>