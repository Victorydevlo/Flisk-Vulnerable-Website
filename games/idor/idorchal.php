<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR Task</title>
</head>
<body>
    <h1>Login</h1>
    <form id="login-form">
        <label for="username">Username:</label>
        <input type="text" id="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" required><br>
        <button type="submit">Login</button>
    </form>
    <div id="login-error" style="color: red; display: none;">Invalid login credentials!</div>
    <hr>
    <h2>User Profile</h2>
    <div id="user-profile" style="display: none;">
        <p id="profile-username"></p>
        <p id="profile-email"></p>
        <p id="profile-role"></p>
        <p id="profile-secret"></p>
        <button id="logout-button">Logout</button>
    </div>

    
</body>
</html>
