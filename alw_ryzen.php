<?php
// open Session
session_start();
$urls = unserialize($_COOKIE['history']);
array_push($urls,"Alienware Ryzen");
if (count($urls) > 5) {
    array_shift($urls);
}
//print_r(array_values($urls));
setcookie("history", serialize($urls), time() + (86400 * 30), "/");

$dc = unserialize($_COOKIE['trend']);
$dc['RYZEN'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alw ryzen</title>
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/ryzen.webp" style="width:300px;height:200px;">

<h1>ALIENWARE AURORA R8</h1>

High-performance desktop with up to 16-core 3rd Gen AMD Ryzen™ overclockable processors designed for gamers who create.

<br>


Up to AMD Ryzen™ 9 3950X (16-Core, 64MB L3 Cache, Max Boost Clock of 4.7GHz)


<br>

Up to NVIDIA® GeForce RTX™ 2080 Ti 11GB GDDR6 (OC Ready)


<br>


Up to 64GB Dual Channel HyperX™ FURY DDR4 XMP at 3200MHz

<br>

Up to 2TB M.2 PCIe NVMe SSD (Boot) + 2TB 7200RPM SATA 6Gb/s (Storage)
<br>
<a href="product.php">RETURN</a>
</body>
</html>