<?php
$filename = 'comments.txt';

if (file_exists($filename)) {
    $comments = file($filename, FILE_IGNORE_NEW_LINES);
} else {
    $comments = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Challenge - View Comments</title>
</head>
<body>
    <h1>Comments</h1>
    <ul>
        <?php
        foreach ($comments as $comment) {
            // Vulnerable to XSS, don't sanitize before outputting
            echo "<li>" . $comment . "</li>";
        }
        ?>
    </ul>
    <p><a href="xss.php">Submit a Comment</a></p>
</body>
</html>
