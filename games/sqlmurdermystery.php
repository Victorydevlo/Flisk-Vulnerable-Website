<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mmgame";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    $query = trim($_POST['query']);
    $blacklist = ['DROP', 'DELETE', 'UPDATE', 'INSERT'];
    foreach ($blacklist as $word) {
        if (stripos($query, $word) !== false) {
            die("<p style='color: red;'>Invalid query detected!</p>");
        }
    }
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        die("<p style='color: red;'>Invalid query format!</p>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        textarea {
            width: 100%;
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
            margin-top: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
</head>

<body>
    <h1>SQL Murder Mystery</h1>
    <p>Solve the case</p>

    <img src="images/ss.jpg" style="width: 750px;" class="  display: block; margin-left: auto; margin-right: auto;">

    <h3>There has been a serious murder is West City! and you have been hired to solve this crime
        We trust in you. </h3>
    <p>use what you have learned about SQL to solve this crime, there are going to be help along side you.</p>

    <h1> West City UnderGround Murder </h1>

    <p>As the police officer who has been put in charge of solving this crime, you work day and night on this,
        but somehow you slept in and lost the police report that was given to you, you do remember that
        the crime happened in West city on April 10th 2025.
    </p>

    <h2> Database </h2>

    <p>to see evrything in the database run <strong> SELECT name 
  FROM reports
 where type = 'table'</Strong>

    </p>

    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query" style="width: 670px" placeholder="Enter your SQL command here...">
            <?php echo isset($_POST['query']) ? htmlspecialchars($_POST['query']) : ''; ?>
    </textarea>
        <br>
        <button type="submit">RUN ⇩</button>

    </form>

    <p>You will have to use a detabase to retrive the information that you nned to solve this crime
        heres an example of the Database bellow, run this command - <Strong> Select * From reports where name = 'John
            Doe'</Strong>

    </p>

    <h2>Run SQL Query</h2>
    <form method="post">
        <textarea name="query" style="width: 670px" placeholder="Enter your SQL command here...">
            <?php echo isset($_POST['query']) ? htmlspecialchars($_POST['query']) : ''; ?>
    </textarea>
        <br>
        <button type="submit">RUN ⇩</button>

    </form>

    <?php if (isset($result) && $result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <?php
                $columns = array_keys($result->fetch_assoc());
                foreach ($columns as $col) {
                    echo "<th>" . htmlspecialchars($col) . "</th>";
                }
                echo "</tr>";
                $result->data_seek(0);
                ?>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <?php foreach ($columns as $col): ?>
                        <td><?php echo htmlspecialchars($row[$col]); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

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

<?php $conn->close(); ?>