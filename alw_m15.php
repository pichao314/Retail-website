<?php

$urls = unserialize($_COOKIE['history']);
array_push($urls, "Alienware M15");
if (count($urls) > 5) {
    array_shift($urls);
}
//print_r(array_values($urls));
setcookie("history", serialize($urls), time() + (86400 * 30),'/');

$dc = unserialize($_COOKIE['trend']);
$dc['M15'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30),'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alw m15</title>
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/m15.webp" style="width:300px;height:200px;">

<h1>ALIENWARE m15</h1>

The New Alienware m15 is thinner and lighter than the previous generation. Packed with Advanced Alienware Cryo-Tech v3.0
and the latest in NVIDIA® GeForce RTX™ graphics.

<br>


Up to 9th Generation Intel® Core™ i9-9980HK (8-Core, up to 5.0Ghz w/Turbo Boost)


<br>

Up to NVIDIA® GeForce RTX™ 2080 8GB GDDR6 with Max-Q Design

<br>


Up to 16GB, 2x8GB, DDR4 2666MHz

<br>

Up to 4TB (2x 2TB PCIe M.2 SSD) RAID 0

<br>

Up to 15.6" OLED UHD (3840 x 2160) 60Hz, Eyesafe® Display Tech + Tobii Eyetracking
<br>
<a href="product.php">RETURN</a>
</body>
</html>