<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/watchplace.css">
    <link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="./Styles/home.css">
    <link rel="stylesheet" href="./styles/login.css">

    <title>Login</title>
</head>
<body>
    <div class="nav-bar">
        <nav>
            <div class="images">
                <img style="margin-top: 4px;" src="./Assects/menu.svg" height="32px" alt="">
                <img style="margin-left: 25px;" height="42px" class="logopic" src="./Assects/image1.png" alt="Logo">
            </div>

            <input style="padding-left: 20px ; padding-right: 200px ; font-size: small; font-weight: 300;" type="text" placeholder="Search anime...">
            <ul style="display: flex; align-items: center;">
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="top-airing.html">Top Airing</a></li>
                <li><a href="good.html">Good</a></li>
            </ul>

            <ul class="icons" style="display: flex; align-items: center;">
                <li><a href="#">icon1</a></li>
                <li><a href="#">icon2</a></li>
                <li><a href="#">icon3</a></li>
            </ul>

            <button class="login">Login</button>
        </nav>
    </div>

    <div class="form-container">
        <!-- Show Error Messages Here -->


        <form class="login-form" action="process.php" method="post">
            <h2>Welcome Back !</h2>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <?php
          if (isset($_SESSION['errors'])) {
            echo '<div class="error-messages" style="color: red;     font-size: 12px;">';
            foreach ($_SESSION['errors'] as $error) {
                echo "<p>$error</p>";
            }
            echo '</div>';
            unset($_SESSION['errors']); // Clear errors after displaying
        }
          ?>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
