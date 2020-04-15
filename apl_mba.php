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
$dc['MBA'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>apl mba</title>
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/mba.jpg" style="width:300px;height:200px;">

<h1>APPLE MACBOOK AIR</h1>

13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 native resolution at 227 pixels per inch with support for millions of colors

<br>


Touch ID sensor


<br>


1.1GHz dual-core Intel Core i3, Turbo Boost up to 3.2GHz, with 4MB L3 cache


<br>



256GB PCIe-based SSD

Configurable to 512GB, 1TB, or 2TB SSD

<br>

8GB of 3733MHz LPDDR4X onboard memory

Configurable to 16GB of memory
<br>
<a href="product.php">RETURN</a>
</body>
</html>