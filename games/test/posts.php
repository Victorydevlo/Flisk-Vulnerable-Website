<!DOCTYPE html>
<br="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf6e3;
        }

        header {
            background-color: #f4c542;
            padding: 20px;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .buttons {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .buttons a {
            text-decoration: none;
            background-color: #5c4033;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
        }

        nav {
            background-color: #5c4033;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
        }

        nav a:hover {
            background-color: #f4c542;
            color: #333;
        }

        .section {
            padding: 20px;
            text-align: center;
        }

        .section h2 {
            color: #f4c542;
        }

        .instagram-post {
            max-width: 1700px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .instagram-header {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .instagram-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .instagram-header .author {
            font-weight: bold;
            color: #333;
        }

        .instagram-content {
            padding: 15px;
            text-align: left;
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>About This Project</h1>
        <div class="buttons">
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
        </div>
    </header>

    <nav>
        <a href="about.php">About</a>
        <a href="challenges.php">Challenges</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="section">
        <h2>Welcome to the Vulnerability Playground</h2>
        <p>This project is designed to help learners explore and understand common web vulnerabilities through fun, interactive challenges.</p>
    </div>


<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=5" alt="Profile Picture">
    <span class="author">buzzQueen</span>
  </div>
  <div class="instagram-content">
    <p>“Bees are essential to our ecosystem. Love this educational site!”</p>
  </div>
</div>


<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=8" alt="Profile Picture">
    <span class="author">beekeeper42</span>
  </div>
  <div class="instagram-content">
    <p>“Just spotted a carpenter bee outside my window!”</p>
  </div>
</div>

<!-- Comment 3 + reply -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=10" alt="Profile Picture">
    <span class="author">john</span>
  </div>
  <div class="instagram-content">
    <p>“I absolutely love this site! It’s like honey for my brain.”</p>
  </div>

  <div class="reply-post">
    <div class="instagram-header">
      <img src="https://i.pravatar.cc/40?img=13" alt="Profile Picture">
      <span class="author">honeyHunter</span>
    </div>
    <div class="instagram-content">
      <p>“Haha! Sweet metaphor. Totally agree!”</p>
    </div>
  </div>
</div>

<!-- Comment 4 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=12" alt="Profile Picture">
    <span class="author">J4son</span>
  </div>
  <div class="instagram-content">
    <p>“i hacked the admin”</p>
  </div>
</div>

<!-- Comment 5 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=15" alt="Profile Picture">
    <span class="author">alex</span>
  </div>
  <div class="instagram-content">
    <p>“Thank you for creating this amazing platform!”</p>
  </div>

  <div class="reply-post">
    <div class="instagram-header">
      <img src="https://i.pravatar.cc/40?img=20" alt="Profile Picture">
      <span class="author">Owner</span>
    </div>
    <div class="instagram-content">
      <p>“You are welcome!”</p>
    </div>

    <div class="reply-post nested-reply">
      <div class="instagram-header">
        <img src="https://i.pravatar.cc/40?img=12" alt="Profile Picture">
        <span class="author">J4son</span>
      </div>
      <div class="instagram-content">
        <p>“No, it’s horrible.”</p>
      </div>
    </div>
  </div>
</div>

<!-- Comment 6 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=25" alt="Profile Picture">
    <span class="author">buzzlover</span>
  </div>
  <div class="instagram-content">
    <p>“Did you know bees communicate by dancing?”</p>
  </div>
</div>

<!-- Comment 7 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=22" alt="Profile Picture">
    <span class="author">flowerpower</span>
  </div>
  <div class="instagram-content">
    <p>“This platform is the bee's knees!”</p>
  </div>
</div>

<!-- Comment 8 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=12" alt="Profile Picture">
    <span class="author">J4son</span>
  </div>
  <div class="instagram-content">
    <p>“ping me”</p>
  </div>
</div>

<!-- Comment 9 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=18" alt="Profile Picture">
    <span class="author">nectarNerd</span>
  </div>
  <div class="instagram-content">
    <p>“Bees are like little flying scientists.”</p>
  </div>
</div>

<!-- Comment 10 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=16" alt="Profile Picture">
    <span class="author">beekarma</span>
  </div>
  <div class="instagram-content">
    <p>“Save the bees, save the world.”</p>
  </div>
</div>

<!-- Comment 11 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=12" alt="Profile Picture">
    <span class="author">J4son</span>
  </div>
  <div class="instagram-content">
    <p>“162”</p>
  </div>
</div>

<!-- Comment 12 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=14" alt="Profile Picture">
    <span class="author">buzzBook</span>
  </div>
  <div class="instagram-content">
    <p>“I just finished a course on bee behavior here. Brilliant content!”</p>
  </div>
</div>

<!-- Comment 13 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=19" alt="Profile Picture">
    <span class="author">stingZone</span>
  </div>
  <div class="instagram-content">
    <p>“When bees sting, they die. That's commitment.”</p>
  </div>
</div>

<!-- Comment 14 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=9" alt="Profile Picture">
    <span class="author">buzzbuzz</span>
  </div>
  <div class="instagram-content">
    <p>“My favorite bug-themed site!”</p>
  </div>
</div>

<!-- Comment 15 -->
<div class="instagram-post">
  <div class="instagram-header">
    <img src="https://i.pravatar.cc/40?img=12" alt="Profile Picture">
    <span class="author">J4son</span>
  </div>
  <div class="instagram-content">
    <p>“the password is Ym05MFlYTnBiWEJzWldGa2JXbHVNVEl6”</p>
  </div>
</div>



</body>
    </br>
    </br>
    </br>
    </br>
<footer>
        <p>&copy; 2023 Bee Nation. All rights reserved.</p>
    </footer>
</html>
