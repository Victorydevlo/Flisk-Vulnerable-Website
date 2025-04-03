<?php
session_start();
include '../../../userinfo/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Session expired. Please log in again."]);
    exit;
}

$user_id = $_SESSION['user_id'];

$flags = [
    'flag1' => 'flag{wireshark_challenge}',
];

$submitted_flag = null;
$submitted_value = null;

foreach ($flags as $key => $correct_flag) {
    if (isset($_POST[$key])) {
        $submitted_flag = $key;
        $submitted_value = strtolower(trim($_POST[$key]));
        break;
    }
}

if (!$submitted_flag) {
    echo json_encode(["status" => "error", "message" => "No flag submitted."]);
    exit;
}

if ($submitted_value !== strtolower($flags[$submitted_flag])) {
    echo json_encode(["status" => "error", "message" => "Incorrect flag. Try again!"]);
    exit;
}

$conn->begin_transaction();
try {
    $stmt = $conn->prepare("SELECT id FROM flag_submissions WHERE user_id = ? AND flag = ?");
    $stmt->bind_param("is", $user_id, $submitted_value);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "You have already claimed points for this flag."]);
        $stmt->close();
        $conn->rollback();
        exit;
    }
    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO flag_submissions (user_id, flag) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $submitted_value);
    $stmt->execute();
    $stmt->close();

    $points_earned = 70;

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

    echo json_encode(["status" => "success", "message" => "Correct flag! You earned $points_earned points."]);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["status" => "error", "message" => "An error occurred. Please try again."]);
}
?>
