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
$dc['R8'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alw r8</title>
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/r8.webp" style="width:300px;height:200px;">

<h1>ALIENWARE AURORA R8</h1>

The Alienware Aurora features a meticulous, zero-fat design and is the first of its kind to offer tool-less upgrades to
graphics cards, hard drives, memory and 9th Generation Intel® Core™ Processors.

<br>


Up to Intel® Core™ i9 9900K (8-Core/16-Thread, Overclocked up to 4.7GHz across all cores)


<br>

Up to NVIDIA® GeForce RTX™ 2080 Ti 11GB GDDR6 (OC Ready)


<br>

Up to 64GB Dual Channel HyperX™ DDR4 XMP at 2933MHz

<br>

Up to 2TB M.2 PCIe NVMe SSD (Boot) + 2TB 7200RPM 3.5" SATA HDD (Storage)
<br>
<a href="product.php">RETURN</a>
</body>
</html>