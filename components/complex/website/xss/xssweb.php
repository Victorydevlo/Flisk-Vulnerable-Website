<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    $filename = 'comments.txt';

    $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');

    file_put_contents($filename, $comment . PHP_EOL, FILE_APPEND);
    echo "Comment saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XSS Challenge - Submit Comment</title>
</head>
<body>
    <h1>Submit Your Comment</h1>
    <form action="xssweb.php" method="POST">
        <label for="comment">Comment:</label><br>
        <textarea name="comment" id="comment" rows="5" cols="40" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
    <p><a href="comment.php">View Comments</a></p>
</body>
</html>
