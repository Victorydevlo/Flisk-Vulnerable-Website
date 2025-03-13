<?php
// Include the database connection file
include '../userinfo/connection.php';

// Fetch all users from the users table
$query = "SELECT id, username FROM users";
$result = $conn->query($query);

// Check if there are any users in the database
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $username = $row['username']; // Get the username

        // Check if the user already exists in the leaderboard table
        $check_query = $conn->prepare("SELECT user_id FROM leaderboard WHERE user_id = ?");
        $check_query->bind_param("i", $user_id);
        $check_query->execute();
        $check_query->store_result();

        if ($check_query->num_rows == 0) {
            // Insert the user into the leaderboard with 0 points and their username
            $insert_query = $conn->prepare("INSERT INTO leaderboard (user_id, username, points) VALUES (?, ?, ?)");
            $initial_points = 0; // Set initial points to 0
            $insert_query->bind_param("isi", $user_id, $username, $initial_points); // 'i' for integer, 's' for string
            $insert_query->execute();
            $insert_query->close();
        }
        $check_query->close();
    }

    echo "Migration successful! All existing users have been added to the leaderboard.";
} else {
    echo "No users found in the database.";
}

// Close the database connection
$conn->close();
?>
