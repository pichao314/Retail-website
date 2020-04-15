<?php
$urls = unserialize($_COOKIE['history']);
array_push($urls, "Alienware Aurora");
if (count($urls) > 5) {
    array_shift($urls);
}
//print_r(array_values($urls));
setcookie("history", serialize($urls), time() + (86400 * 30), "/");

$dc = unserialize($_COOKIE['trend']);
$dc['Aurora'] += 1;

setcookie("trend", serialize($dc), time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alw aurora</title>
</head>
<body>

<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<img src="resource/arr.webp" style="width:300px;height:200px;">

<h1>ALIENWARE AURORA R8</h1>

A gaming desktop with the Legend Industrial Design and 9th Gen Intel® Core™ processors. Featuring improved airflow and
engineering fit for esports pros.

<br>


Up to 9th Gen Intel® Core™ i9 9900K (8-Core, Overclocked up to 4.7GHz across all cores)


<br>

Up to Dual NVIDIA® GeForce RTX™ 2080 8GB GDDR6 (NVIDIA NVLink SLI® Enabled) (OC Ready)


<br>

Up to 64GB Dual Channel HyperX™ FURY DDR4 XMP at 2933MHz

<br>

Up to 2TB M.2 PCIe NVMe SSD (Boot) + 2TB 7200RPM SATA 6Gb/s (Storage)
<br>
<a href="product.php">RETURN</a>
</body>
</html>