<?php
// open Session
session_start();
$urls = unserialize($_COOKIE['history']);
array_push($urls, $_SERVER['PHP_SELF']);
if (count($urls) > 5) {
    array_shift($urls);
}
//print_r(array_values($urls));
setcookie("history", serialize($urls), time() + (86400 * 30), "../");

$dc = unserialize($_COOKIE['trend']);
$dc['51M'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alw 51m</title>
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

<a href="product.php">RETURN</a>
</body>
</html>