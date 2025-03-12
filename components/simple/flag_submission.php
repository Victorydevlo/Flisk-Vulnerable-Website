<?php
session_start();
include '../../userinfo/connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username'])) {
    header("Location: index.php?message=" . urlencode("You must be logged in to submit a flag."));
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$submitted_flag = isset($_POST['flag']) ? trim(strtolower($_POST['flag'])) : '';

$correct_flag = "flag{first}";

// Check if the user has already submitted this flag
$check_stmt = $conn->prepare("SELECT submitted FROM flag_submissions WHERE user_id = ? AND flag = ?");
$check_stmt->bind_param("is", $user_id, $correct_flag);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    // User already submitted the flag
    header("Location: index.php?message=" . urlencode("Correct! But you have already claimed points for this flag."));
    exit;
}
$check_stmt->close();

// Insert into flag_submissions
$insert_stmt = $conn->prepare("INSERT INTO flag_submissions (user_id, flag, submitted) VALUES (?, ?, 1)");
$insert_stmt->bind_param("is", $user_id, $correct_flag);
if (!$insert_stmt->execute()) {
    die("Error inserting flag submission: " . $insert_stmt->error);
}
$insert_stmt->close();

// Award points
$points_earned = 5;

// Check if user exists in leaderboard
$stmt = $conn->prepare("SELECT points FROM leaderboard WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->store_result();

$user_exists = $stmt->num_rows > 0;
$stmt->bind_result($existing_points);
$stmt->fetch();
$stmt->close();

if ($user_exists) {
    // **FIX: Update points only if user exists**
    $update_stmt = $conn->prepare("UPDATE leaderboard SET points = points + ? WHERE user_id = ?");
    $update_stmt->bind_param("ii", $points_earned, $user_id);
    if (!$update_stmt->execute()) {
        die("Error updating leaderboard: " . $update_stmt->error);
    }
    $update_stmt->close();
} else {
    // **FIX: Ensure new users are added to the leaderboard**
    $insert_leaderboard_stmt = $conn->prepare("INSERT INTO leaderboard (user_id, username, points) VALUES (?, ?, ?)");
    $insert_leaderboard_stmt->bind_param("isi", $user_id, $username, $points_earned);
    if (!$insert_leaderboard_stmt->execute()) {
        die("Error inserting into leaderboard: " . $insert_leaderboard_stmt->error);
    }
    $insert_leaderboard_stmt->close();
}

// Redirect with success message
header("Location: index.php?message=" . urlencode("Correct! You earned 5 points!"));
exit;
?>
