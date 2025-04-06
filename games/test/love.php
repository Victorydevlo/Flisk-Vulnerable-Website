<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeNation</title>
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
            /* Dark brown */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
        }

        nav {
            background-color: #5c4033;
            /* Dark brown */
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
            /* Yellow hover effect */
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
        <h1>Welcome to BeeNation</h1>
        <p>Your ultimate source for everything about bees!</p>
        <div class="buttons">
            <a href="login.php">Login</a>
        </div>
    </header>
    <nav>
        <a href="posts.php">Posts</a>
        <a href="love.php">Home</a>
    </nav>
    <div style="text-align: center; margin-bottom: 20px; margin-top: 20px;">
        <form action="search.php" method="get">
            <input type="text" name="query" autocomplete= "off" placeholder="Search..."
                style="padding: 10px; width: 300px; border: 1px solid #ddd; border-radius: 5px;">
            <button type="submit"
                style="padding: 10px 20px; background-color: #5c4033; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Search</button>
        </form>
    </div>
    <section id="about" class="section">
        <div class="instagram-post">
            <div class="instagram-header" style="background-color: #f4c542; color: #fff;">
                <span class="author">Bee Boss</span>
            </div>
            <div class="instagram-content">
                <p>Bees are fascinating creatures that play a crucial role in pollination and maintaining biodiversity.
                    They are known for their hard work, teamwork, and the production of honey. Without bees, many plants
                    and crops would struggle to reproduce, making them essential for our ecosystem.</p>
                <p>Did you know that there are over 20,000 species of bees worldwide? Each species has unique
                    characteristics and behaviors, contributing to the diversity of our planet. From the industrious
                    honeybee to the solitary mason bee, these insects are vital to the health of our environment.</p>
                <p>Unfortunately, bee populations are declining due to habitat loss, pesticide use, and climate change.
                    It's crucial to take action to protect these incredible creatures. Planting bee-friendly flowers,
                    reducing pesticide use, and supporting local beekeepers are just a few ways you can help.</p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 BeeNation. All rights reserved.</p>
    </footer>
</body>

</html>