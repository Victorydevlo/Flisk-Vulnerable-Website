<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .container {
            width: 300px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: 50px 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            font-size: 16px;
            margin-top: 20px;
            font-weight: bold;
        }
        .security-flag {
            text-align: center;
            font-size: 20px;
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
        .user-list {
            margin-bottom: 20px;
        }
        .user-list ul {
            list-style-type: none;
            padding: 0;
        }
        .user-list li {
            padding: 5px;
            cursor: pointer;
        }
        .user-list li:hover {
            background-color: #f0f0f0;
            border-radius: 4px;
        }
        .look-for-vulnerabilities {
            margin-top: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Available Users</h2>
    <div class="user-list">
        <ul>
            <li onclick="viewUser('john_doe')">john_doe</li>
            <li onclick="viewUser('jane_smith')">jane_smith</li>
        </ul>
    </div>

    <div class="look-for-vulnerabilities">
        <p>Look for vulnerabilities in the system</p>
    </div>
</div>

<div class="container">
    <h2>Bank App</h2>

    <div class="input-group">
        <label for="username">Enter Username</label>
        <input type="text" id="username" placeholder="Username" />
        <button onclick="viewUser()">View User Info</button>
    </div>

    <div id="userInfo"></div>

    <div class="input-group" id="transferSection" style="display: none;">
        <label for="toUsername">To Username</label>
        <input type="text" id="toUsername" placeholder="To Username" />

        <label for="amount">Amount</label>
        <input type="number" id="amount" placeholder="Amount to transfer" />

        <button onclick="transferMoney()">Transfer Money</button>
    </div>

    <div class="message" id="message"></div>
    <div class="security-flag" id="securityFlag" style="display: none;">flag{securit3breach}</div>
</div>

<script>
const users = [
    { username: "john_doe", firstName: "John", lastName: "Doe", balance: 1000 },
    { username: "jane_smith", firstName: "Jane", lastName: "Smith", balance: 1500 }
];

function viewUser(inputUsername = null) {
    const username = inputUsername || document.getElementById('username').value;
    const user = users.find(u => u.username === username);

    if (user) {
        document.getElementById('userInfo').innerHTML = `
            <p><strong>Username:</strong> ${user.username}</p>
            <p><strong>Name:</strong> ${user.firstName} ${user.lastName}</p>
            <p><strong>Balance:</strong> $${user.balance}</p>
        `;
        document.getElementById('transferSection').style.display = 'block';
        document.getElementById('message').innerHTML = '';
        document.getElementById('securityFlag').style.display = 'none';

        checkForSecurityBreach(user);
    } else {
        document.getElementById('userInfo').innerHTML = `<p>User not found</p>`;
        document.getElementById('transferSection').style.display = 'none';
    }
}

function transferMoney() {
    const fromUsername = document.getElementById('username').value;
    const toUsername = document.getElementById('toUsername').value;
    const amount = parseFloat(document.getElementById('amount').value);

    const fromUser = users.find(u => u.username === fromUsername);
    const toUser = users.find(u => u.username === toUsername);

    if (!fromUser || !toUser) {
        document.getElementById('message').innerText = 'Both users must exist.';
        return;
    }

    if (fromUser.balance < amount && amount >= 0) {
        document.getElementById('message').innerText = 'Insufficient funds.';
        return;
    }

    fromUser.balance -= amount;
    toUser.balance += amount;

    document.getElementById('message').innerText = 'Transfer successful!';

    document.getElementById('securityFlag').style.display = 'none';
}

function checkForSecurityBreach(user) {
    if (user.balance < 0) {
        document.getElementById('securityFlag').style.display = 'block';
    }
}
</script>

</body>
</html>
