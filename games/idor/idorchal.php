<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR Task</title>
</head>

<body>
    <h1 style="text-align: center; font-family: Arial, sans-serif; color:rgb(65, 71, 66); margin-bottom: 20px;">Welcome
        to the IDOR Challenge</h1>
    <form id="login-form" style="text-align: center; font-family: Arial, sans-serif; margin-bottom: 20px;">
        <label for="username" style="display: block; margin-bottom: 10px;">Username:</label>
        <input type="text" id="username" required style="padding: 5px; margin-bottom: 15px; width: 200px;"><br>
        <label for="password" style="display: block; margin-bottom: 10px;">Password:</label>
        <input type="password" id="password" required style="padding: 5px; margin-bottom: 15px; width: 200px;"><br>
        <button type="submit"
            style="padding: 10px 20px; background-color: rgb(65, 71, 66); color: white; border: none; cursor: pointer;">Login</button>
    </form>
    <div id="login-error" style="color: red; display: none;">Invalid login credentials!</div>
    <hr>
    <h2 style="text-align: center; font-family: Arial, sans-serif; color:rgb(65, 71, 66); margin-bottom: 20px;">User
        Profile</h2>
    <div id="user-profile"
        style="display: none; text-align: center; font-family: Arial, sans-serif; margin-top: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 10px; max-width: 400px; margin-left: auto; margin-right: auto; background-color: #f9f9f9;">
        <p id="profile-username" style="margin: 10px 0; font-size: 18px; color: #333;"></p>
        <p id="profile-email" style="margin: 10px 0; font-size: 18px; color: #333;"></p>
        <p id="profile-role" style="margin: 10px 0; font-size: 18px; color: #333;"></p>
        <p id="profile-secret" style="margin: 10px 0; font-size: 18px; color: #333;"></p>
        <button id="logout-button"
            style="padding: 10px 20px; background-color: rgb(65, 71, 66); color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
    </div>

    <script>
        const users = {
            'wonder': { username: 'wonder', email: 'wondeer@gmail.com', password: 'userpass', role: 'user', secret: null },
            'Monork': { username: 'Monork', email: 'Monark@gmail.com', password: 'adminpass', role: 'admin', secret: 'flag{bossmanofthebossmen}' }
        };

        const loginForm = document.getElementById('login-form');
        const loginError = document.getElementById('login-error');
        const userProfile = document.getElementById('user-profile');
        const profileUsername = document.getElementById('profile-username');
        const profileEmail = document.getElementById('profile-email');
        const profileRole = document.getElementById('profile-role');
        const profileSecret = document.getElementById('profile-secret');
        const logoutButton = document.getElementById('logout-button');

        // Get the user ID from the URL
        const urlParams = new URLSearchParams(window.location.search);
        const userIdFromURL = urlParams.get('id');

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

        function displayUserProfileByID(userId) {
            if (users[userId]) {
                const user = users[userId];
                profileUsername.textContent = `Username: ${user.username}`;
                profileEmail.textContent = `Email: ${user.email}`;
                profileRole.textContent = `Role: ${user.role}`;
                profileSecret.textContent = user.role === 'admin' ? `Secret: ${user.secret}` : 'No secret available for normal users';
                loginForm.style.display = 'none';
                loginError.style.display = 'none';
                userProfile.style.display = 'block';
            } else {
                loginError.style.display = 'block';
            }
        }

        if (sessionStorage.getItem('username')) {
            const username = sessionStorage.getItem('username');
            displayUserProfile(username);
        } else if (userIdFromURL) {
            // Allow direct access to user profile by manipulating the ID in the URL
            displayUserProfileByID(userIdFromURL);
        }
    </script>
</body>

</html>
