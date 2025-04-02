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
            echo "<li>" . $comment . "</li>";
        }
        ?>
    </ul>
    <p><a href="xssweb.php">Submit a Comment</a></p>
    <div id="hiddenFlag" style="display:none;">flag{this_is_the_hidden_flag}</div>
</body>
</html>
