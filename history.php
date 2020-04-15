<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - HISTORY</title>
    <link rel="stylesheet" href="style/pcstyle.css">
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>
<?php
if (!isset($_COOKIE['history'])) {
    echo "There's no history!<br>";
} else {
    echo "The last five visited products are:<br>";
    $urls = unserialize($_COOKIE['history']);
    foreach ($urls as $url) {
        echo "$url <br>";
    }
    echo "<a href=\"clear.php\">Clear History</a>
<br>";
}

?>

<a href="product.php">RETURN</a>
</body>
</html>