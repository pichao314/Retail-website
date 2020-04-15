<?php
if (!isset($_COOKIE['history'])) {
    $arr = array();
    setcookie('history', serialize($arr),time() + (86400 * 3),'/');
} else {
    $urls = unserialize($_COOKIE['history']);
//    print_r(array_values($urls));
}
if (!isset($_COOKIE['trend'])) {
    $dc = array("51M"=>0,"Aurora"=>0,"M15"=>0,"M17"=>0,"R8"=>0,"RYZEN"=>0,"IMAC"=>0,"IMP"=>0,"MBA"=>0,"MBP"=>0);
    setcookie("trend",serialize($dc),time() + (86400 * 30), '/');
} else {
    $items = unserialize($_COOKIE['trend']);
//    print_r(array_values($items));
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - Products</title>
    <link rel="stylesheet" href="style/pcstyle.css">
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<div>
    <ul>
        <li><a href="history.php">Last visited</a> </li>
        <li><a href="trend.php">Most visited</a> </li>
    </ul>
</div>

<h1>Laptops</h1>
<table>
    <tr>
        <th>Product</th>
        <th>Model</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>
            <a href="alw_51m.php">

                <img src="resource/51m.webp" style="width:300px;height:200px;"></td>
        </a>
        <td>Alienware 51M</td>
        <td>Revolutionary 17-inch gaming laptop with upgradeable, overclockable desktop 9th Gen Intel® Core™ processors
            and NVIDIA® GeForce RTX™ graphics , plus a magnesium alloy chassis.
        </td>
    </tr>
    <tr>
        <td>
            <a href="alw_m15.php">

                <img src="resource/m15.webp" style="width:300px;height:200px;"></td>
        </a>
        <td>Alienware M15</td>
        <td>The New Alienware m15 is thinner and lighter than the previous generation. Packed with Advanced Alienware
            Cryo-Tech v3.0 and the latest in NVIDIA® GeForce RTX™ graphics.
        </td>
    </tr>
    <tr>
        <td>
            <a href="alw_m17.php">

                <img src="resource/m17.webp" style="width:300px;height:200px;"></td>
        </a>
        <td>Alienware M17</td>
        <td>Alienware’s thinnest 17" laptop ever. With optional hyper-efficient 8-phase voltage regulation, Cryo-Tech
            cooling v3.0 & new Legend industrial design alongside the latest in NVIDIA® GeForce RTX™ graphics.
        </td>
    </tr>
    <tr>
        <td>
            <a href="apl_mba.php">

                <img src="resource/mba.jpg" style="width:300px;height:200px;"></td>
        </a>
        <td>MacBook Air</td>
        <td>1.1GHz dual-core Intel Core i3, Turbo Boost up to 3.2GHz, with 4MB L3 cache

            Configurable to 1.1GHz quad-core Intel Core i5, Turbo Boost up to 3.5GHz, with 6MB L3 cache; or 1.2GHz
            quad-core Intel Core i7, Turbo Boost up to 3.8GHz, with 8MB L3 cache
        </td>
    </tr>
    <tr>
        <td>
            <a href="apl_mbp.php">

                <img src="resource/mbp.jpeg" style="width:300px;height:200px;"></td>
        </a>
        <td>MacBook Pro</td>
        <td>2.6GHz 6‑core Intel Core i7, Turbo Boost up to 4.5GHz, with 12MB shared L3 cache

            Configurable to 2.4GHz 8‑core Intel Core i9, Turbo Boost up to 5.0GHz, with 16MB shared L3 cache
        </td>
    </tr>
</table>
<h1>Desktops</h1>
<table>
    <tr>
        <th>Product</th>
        <th>Model</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>
            <a href="alw_r8.php">
                <img src="resource/r8.webp" style="width:200px;height:300px;"></td>
        </a>
        <td>Alienware AURORA R8</td>
        <td>The Alienware Aurora features a meticulous, zero-fat design and is the first of its kind to offer tool-less
            upgrades to graphics cards, hard drives, memory and 9th Generation Intel® Core™ Processors.
        </td>
    </tr>
    <tr>
        <td>
            <a href="alw_arr.php">

                <img src="resource/arr.webp" style="width:200px;height:300px;"></td>
        </a>
        <td>Alienware ARURORA</td>
        <td>A gaming desktop with the Legend Industrial Design and 9th Gen Intel® Core™ processors. Featuring improved
            airflow and engineering fit for esports pros.
        </td>
    </tr>
    <tr>
        <td>
            <a href="alw_ryzen.php">

                <img src="resource/ryzen.webp" style="width:200px;height:300px;"></td>
        </a>
        <td>Alienware AURORA RYZEN</td>
        <td>High-performance desktop with up to 16-core 3rd Gen AMD Ryzen™ overclockable processors designed for gamers
            who create.
        </td>
    </tr>
    <tr>
        <td>
            <a href="apl_imac.php">

                <img src="resource/imac.jpeg" style="width:300px;height:259px;"></td>
        </a>
        <td>iMac</td>
        <td>2.3GHz dual-core 7th-generation Intel Core i5 processor, Turbo Boost up to 3.6GHz</td>
    </tr>
    <tr>
        <td>
            <a href="apl_imp.php">

                <img src="resource/imacpro.jpeg" style="width:300px;height:250px;"></td>
        </a>
        <td>iMac Pro</td>
        <td>3.2GHz 8-core Intel Xeon W processor, Turbo Boost up to 4.2GHz
        </td>
    </tr>
</table>

</body>

</html>