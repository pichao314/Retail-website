<?php
// set the expiration date to one hour ago
setcookie("history", "", time() - 3600,'/');
setcookie("trend", "", time() - 3600,'/');
?>
<!DOCTYPE HTML>
<html>
<title>CLEAR</title>
<body>

<?php
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.<br>";
} else {
    echo "Cookies are disabled.<br>";
}
if (!isset($_COOKIE["history"])) {
    echo "Cookie history deleted!<br>";
} else {
    echo "<br> Refresh this page to delete!<br>";
}
if (!isset($_COOKIE["trend"])) {
    echo "Cookie trend deleted!<br>";
} else {
    echo "<br> Refresh this page to delete!<br>";
}
?>

<a href="history.php">RETURN</a>

</body>
</html>