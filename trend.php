<?php
// open Session
session_start();
if (!isset($_COOKIE["trend"])) {
    echo "There's no trend!<br>";
} else {
    $dc = unserialize($_COOKIE['trend']);
//    print_r(array_values($dc));
//    echo "<br>";
    arsort($dc);
//    echo "<br>";
//    print_r(array_values($dc));
//    echo "<br>";
    $st = array_slice($dc, 0, 5);
//    print_r(array_values($st));
    echo "The top five visited products are:<br>";
    echo "<ol>";
    foreach ($st as $pd => $ct) {
        echo "<li>$pd </li>";
    }
    echo "</ol>";
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - TREND</title>
<!--    <link rel="stylesheet" href="style/pcstyle.css">-->
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>
<br>
<a href="product.php">RETURN</a>
</body>
</html>