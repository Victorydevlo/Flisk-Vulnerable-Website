<?php
session_start();

$_SESSION['user'] = 'victim';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    
    $_SESSION['user_email'] = $_POST['email'];
    
    
    if ($_SESSION['user_email'] == 'flag@domain.com') {
        echo 'flag{youaredoinggreat}';
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Update</title>
</head>
<body>
    <h1>Update Profile</h1>
    <form method="POST" action="update.php">
        <label for="email">New Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
