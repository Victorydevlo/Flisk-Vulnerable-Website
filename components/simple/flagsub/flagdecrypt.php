<?php
session_start();
include '../../../userinfo/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Session expired. Please log in again."]);
    exit;
}

$user_id = $_SESSION['user_id'];
$flag = isset($_POST['flag']) ? strtolower(trim($_POST['flag'])) : '';
$correct_flags = [
    'flag{younowunderstandtheconceptofcaesar}',
    'flag{okyouareastar!}',
    'flag{youarefinallyamasteratthis}'
];

if ($flag === $correct_flag) {
    $stmt = $conn->prepare("SELECT id FROM flag_submissions WHERE user_id = ? AND flag = ?");
    $stmt->bind_param("is", $user_id, $flag);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "You have already claimed points for this flag."]);
    } else {
        $stmt->close();
        $stmt = $conn->prepare("INSERT INTO flag_submissions (user_id, flag) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $flag);
        $stmt->execute();
        $stmt->close();

        $points_earned = 10;
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

        echo json_encode(["status" => "success", "message" => "Correct! You earned 10 points."]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Incorrect flag. Try again!"]);
}
?>
