<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'anime');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the anime id from the URL
$id = $_GET['id'];

// Fetch the anime data based on the id
$sql = "SELECT * FROM anime WHERE id = $id";
$result = $conn->query($sql);
$anime = $result->fetch_assoc();

// Check if anime exists
if (!$anime) {
    die("Anime not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/watchplace.css">
    <link rel="stylesheet" href="./Styles/main.css">
    <title><?php echo $anime['name']; ?> - Streaming</title>
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

    <div class="container">
        <div class="box1">
            <div class="bbox1">
                <div class="episode-section">
                    <h4><?php echo $anime['name']; ?> - Watch Now</h4>
                    <h3>Episodes</h3>
                    <p class="episode-title">1 The red ranger and the mafdijskjfdskljfds</p>
                </div>
            </div>
            <div class="bbox2">
                <div class="video-section">
                    <iframe id="anime-player" src="<?php echo $anime['video_url']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="box2">
            <div class="anime-info">
                <img src="./Assects/<?php echo $anime['image_url']; ?>" alt="Anime Poster" class="anime-poster">
                <div class="description">
                    <h3><?php echo $anime['name']; ?></h3>
                    <p>Description of the anime goes here.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
