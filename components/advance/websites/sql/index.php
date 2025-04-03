<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'webfour';


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['input'])) {
    $input = $_POST['input'];


    $query = "SELECT * FROM webfour.webfour WHERE name = '$input'";


    echo "<p>SQL Query: $query</p>";


    if ($result = $conn->query($query)) {
        echo "<p>Query executed successfully.</p>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>" . $row['name'] . "</p>";
        }
    } else {

        echo "<p>SQL Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection Vulnerability</title>
</head>

<body>
    <h2>SQL Injection Test</h2>
    <form method="post" action="">
        <label for="input">Enter a name:</label>
        <input type="text" id="input" name="input" required>
        <input type="submit" value="Submit">
    </form>

    <?php

    ?>

</body>

</html>