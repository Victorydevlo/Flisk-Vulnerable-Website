<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR Task</title>
</head>
<body>
    <h1 style="text-align: center; font-family: Arial, sans-serif; color:rgb(65, 71, 66); margin-bottom: 20px;">Welcome to the IDOR Challenge</h1>
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

    <script>
        const users = {
            'wonder': { username: 'wonder', email: 'wondeer@gmail.com', password: 'userpass', role: 'user', secret: null },
            'Monork': { username: 'Monork', email: 'Monark@gmail.com', password: 'adminpass', role: 'admin', secret: '55' }
        };

        const loginForm = document.getElementById('login-form');
        const loginError = document.getElementById('login-error');
        const userProfile = document.getElementById('user-profile');
        const profileUsername = document.getElementById('profile-username');
        const profileEmail = document.getElementById('profile-email');
        const profileRole = document.getElementById('profile-role');
        const profileSecret = document.getElementById('profile-secret');
        const logoutButton = document.getElementById('logout-button');

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (users[username] && users[username].password === password) {
                sessionStorage.setItem('username', username);
                displayUserProfile(username);
            } else {
                loginError.style.display = 'block';
            }
        });

        logoutButton.addEventListener('click', () => {
            sessionStorage.removeItem('username');
            window.location.reload();
        });

        function displayUserProfile(username) {
            const user = users[username];
            profileUsername.textContent = `Username: ${user.username}`;
            profileEmail.textContent = `Email: ${user.email}`;
            profileRole.textContent = `Role: ${user.role}`;
            profileSecret.textContent = user.role === 'admin' ? `Secret: ${user.secret}` : 'No secret available for normal users';
            loginForm.style.display = 'none';
            loginError.style.display = 'none';
            userProfile.style.display = 'block';
        }

        if (sessionStorage.getItem('username')) {
            const username = sessionStorage.getItem('username');
            displayUserProfile(username);
        }
    </script>
</body>
</html>
