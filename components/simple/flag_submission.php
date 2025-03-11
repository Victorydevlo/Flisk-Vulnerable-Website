<?php
session_start();
include 'userinfo/connection.php';

$response = ['status' => 'error', 'message' => ''];

if (!isset($_SESSION['user_id'])) {
    $response['message'] = 'You must be logged in to submit a flag.';
    echo json_encode($response);
    exit;
}

$user_id = $_SESSION['user_id'];
$submitted_flag = trim(strtolower($_POST['flag']));
$correct_flag = "flag{firtst}";
$check_stmt = $conn->prepare("SELECT submitted FROM flag_submissions WHERE user_id = ? AND flag = ?");
$check_stmt->bind_param("is", $user_id, $correct_flag);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    $response['status'] = 'success';
    $response['message'] = 'Correct! You have already claimed points for this flag.';
} else {
    $points_earned = 5;
    $insert_stmt = $conn->prepare("INSERT INTO flag_submissions (user_id, flag, submitted) VALUES (?, ?, 1)");
    $insert_stmt->bind_param("is", $user_id, $correct_flag);
    $insert_stmt->execute();
    $stmt = $conn->prepare("INSERT INTO leaderboard (user_id, points) VALUES (?, ?) 
                            ON DUPLICATE KEY UPDATE points = points + ?");
    $stmt->bind_param("iii", $user_id, $points_earned, $points_earned);
    $stmt->execute();
    $stmt->close();

    $response['status'] = 'success';
    $response['message'] = 'Correct! You earned 5 points!';
}

$check_stmt->close();
echo json_encode($response);
?>