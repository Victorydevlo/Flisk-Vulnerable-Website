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

if ($submitted_flag === $correct_flag) {
    $points_earned = 5;

    $stmt = $conn->prepare("SELECT user_id FROM leaderboard WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO leaderboard (user_id, points) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $points_earned);
    } else {
        $stmt = $conn->prepare("UPDATE leaderboard SET points = points + ? WHERE user_id = ?");
        $stmt->bind_param("ii", $points_earned, $user_id);
    }

    $stmt->execute();
    $stmt->close();

    $response['status'] = 'success';
    $response['message'] = 'You earned 5 points!';
} else {
    $response['message'] = 'Incorrect flag.';
}

echo json_encode($response);
?>
