<?php

session_start();

$arr = array();
if (isset($_COOKIE['history'])) {
    $arr = unserialize($_COOKIE['history']);
}
array_push($arr, "Alienware 51M");
if (count($arr) > 5) {
    array_shift($arr);
}
$urls = serialize($arr);
setcookie('history', $urls, time() + (86400 * 30), '/');

$dc = unserialize($_COOKIE['trend']);
$dc['51M'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>alw 51m</title>
    <link rel="stylesheet" type="text/css" href="style/review.css">
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/51m.webp" style="width:300px;height:200px;">

<h1>ALIENWARE AREA-51M</h1>

Revolutionary 17-inch gaming laptop with upgradeable, overclockable desktop 9th Gen Intel® Core™ processors and NVIDIA®
GeForce RTX™ graphics , plus a magnesium alloy chassis.

<br>


Up to 9th Generation Intel® Core™ i9-9980HK (8-Core, up to 5.0Ghz w/Turbo Boost)


<br>


Up to NVIDIA® GeForce RTX™ 2080 8GB GDDR6 with Max-Q Design

<br>

Up to 64GB, 4x16GB, DDR4 2400MHz

<br>

Up to 2TB RAID 0 (2x 1TB NVMe M.2 SSDs) + 1TB (+8GB SSHD) Hybrid Drive

<br>

Up to 17.3" FHD (1920 x 1080) 144Hz, NVIDIA G-SYNC, Eyesafe® Display Tech + Tobii Eyetracking

<br>

<h2>Reviews</h2>
<table border='1'>
    <tr>
        <th>Email</th>
        <th>Score</th>
        <th>Review</th>
    </tr>
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "password";
    $dbname = "pc314";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = "reviewer@example.com";
    $item = "alw_51m";

    $find = "SELECT * FROM Reviews WHERE item='" . $item . "'";
    $result = $conn->query($find);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $conn->close();
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['score'] . "</td>";
        echo "<td>" . $row['review'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {
// if already logged in
    echo $_SESSION['username'] . " please rate this product:";
    ?>

    <div>
        <form action="review.php" method="post">
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 1) echo "checked"; ?>
                   value=1>1
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 2) echo "checked"; ?>
                   value=2>2
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 3) echo "checked"; ?>
                   value=3>3
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 4) echo "checked"; ?>
                   value=4>4
            <input type="radio" name="score"
                <?php if (isset($score) && $score == 5) echo "checked"; ?>
                   value=5>5
            <input type="hidden" name="item" value="alw_51m">
            <br>Write your review here:<br>
            <textarea name="content"></textarea>
            <div><input type="submit" value="Submit Review"/></div>
        </form>
    </div>


    <?php
} else {
    // not logged in
    echo "Want to write review? Please <a href='login.html'>log in</a>";
}
?>
<a href="product.php">RETURN</a>
</body>
</html>