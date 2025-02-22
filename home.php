<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'anime');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all anime data
$sql = "SELECT * FROM anime";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/watchplace.css">
    <link rel="stylesheet" href="./Styles/main.css">
    <link rel="stylesheet" href="./Styles/home.css">
    <title>Document</title>
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

            <a href="login.php"></a>
        </nav>
    </div>

    <div class="box">
        <div class="section">
            <?php while($row = $result->fetch_assoc()) : ?>
                <div class="anime-info">
                <a href="stream.php?id=<?php echo $row['id']; ?>">
                    <img height="400px"  src="./Assects/<?php echo $row['image_url']?>" alt="<?php echo $row['name']?>" class="anime-poster">
                    <div class="description">
                        <h3><?php echo $row['name']; ?></h3>
                        <h4>Epoisode : </h4>
                    </div>
                </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
