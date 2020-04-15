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
<?php
if (!isset($_COOKIE["trend"])) {
    echo "There's no trend!<br>";
} else {
    $dc = unserialize($_COOKIE['trend']);
    arsort($dc);
    $st = array_slice($dc, 0, 5);
    echo "The top five visited products are:<br>";
    echo "<ol>";
    foreach ($st as $pd => $ct) {
        echo "<li>$pd </li>";
    }
    echo "</ol>";
    echo "<a href=\"clear.php\">Clear History</a><br>";
}
?>
<a href="product.php">RETURN</a>
</body>
</html>