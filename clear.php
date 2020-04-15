<?php
session_start();
// set the expiration date to one hour ago
setcookie("history", "", time() - 3600);
setcookie("trend", "", time() - 3600);
?>
<!DOCTYPE HTML>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}
if (!isset($_COOKIE["history"])) {
    echo "Cookie deleted!";
} else {
    echo $_COOKIE["history"];
}
?>

</body>
</html>