<?php
session_start();

// Simulating a logged-in user
$_SESSION['user'] = 'victim';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    // Simulate updating the profile with the provided email
    $_SESSION['user_email'] = $_POST['email'];
    
    // If the email is correctly updated, return the flag
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
    <form method="POST" action="update_profile.php">
        <label for="email">New Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
