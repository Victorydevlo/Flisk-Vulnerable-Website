<?php
session_start();
$_SESSION['flag'] = 'flag{learnerlevel}';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #222;
            color: white;
        }
        input[type="text"] {
            padding: 8px;
            width: 300px;
        }
        button {
            padding: 8px;
            background-color: #ff4500;
            color: white;
            border: none;
            cursor: pointer;
        }
        .hint {
            margin-top: 20px;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Find the Flag</h1>
    <p>Your goal: Make the session ID appear on the screen.</p>
    
    <form method="GET">
        <input type="text" name="query" placeholder="Search here...">
        <button type="submit">Search</button>
    </form>
    
    <div class="hint">
        <p>Hint: Sometimes, websites reflect back what you input.</p>
        <p>Hint: Scripts can be injected where user input is not properly sanitized.</p>
        <p>Hint: Think about how JavaScript interacts with cookies.</p>
    </div>
    
    <?php
    if (isset($_GET['query'])) {
        echo "<p>Results for: " . $_GET['query'] . "</p>";
    }
    ?>
</body>
</html>
