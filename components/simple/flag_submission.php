<?php
session_start();
include '../../userinfo/connection.php';

error_log("Session user_id: " . ($_SESSION['user_id'] ?? 'EMPTY'), 0);

// Ensure session user_id is set
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Session expired. Please log in again."]);
    exit;
}

$user_id = $_SESSION['user_id'];
$flag = isset($_POST['flag']) ? strtolower(trim($_POST['flag'])) : '';
$correct_flag = "flag{first}";

$conn->begin_transaction();

try {
    // Verify user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        throw new Exception("Invalid session. Please log in again.");
    }
    $stmt->close();

    // Check if flag was already submitted
    $stmt = $conn->prepare("SELECT id FROM flag_submissions WHERE user_id = ? AND flag = ?");
    $stmt->bind_param("is", $user_id, $correct_flag);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        throw new Exception("You have already claimed points for this flag.");
    }
    $stmt->close();

    // Insert new flag submission
    $stmt = $conn->prepare("INSERT INTO flag_submissions (user_id, flag, submitted) VALUES (?, ?, 1)");
    $stmt->bind_param("is", $user_id, $correct_flag);
    $stmt->execute();
    $stmt->close();

    $points_earned = 5;

    // Update leaderboard
    $stmt = $conn->prepare("SELECT points FROM leaderboard WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($existing_points);

    if ($stmt->fetch()) {
        $new_points = $existing_points + $points_earned;
        $stmt->close();

        $stmt = $conn->prepare("UPDATE leaderboard SET points = ? WHERE user_id = ?");
        $stmt->bind_param("ii", $new_points, $user_id);
        $stmt->execute();
    } else {
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO leaderboard (user_id, points) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $points_earned);
        $stmt->execute();
    }
    $stmt->close();

    $conn->commit();

    echo json_encode(["status" => "success", "message" => "Correct! You earned 5 points."]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
