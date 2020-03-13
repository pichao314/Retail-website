<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - USERS</title>
</head>

<body>
<div>
<a href="index.php">
    <img src="logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
</a><br><br><br><br>
</div>

<?php
header('Content-type:text/html; charset=utf-8');
// open Session
session_start();

// check if the cookie remembered the user info
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {
    // if already logged in
    echo "Hello! " . $_SESSION['username'] . ' ,Welcome to the user page!<br>';
    echo "<div>
    Current users:<br>
    <uo>
        <li>Mary Smith</li>
        <li>John Wang</li>
        <li>Alex Bington</li>
    </uo>
</div>";
    echo "<a href='logout.php'>Log out</a>";
} else {
    // not logged in
    echo "You haven't logged in, please<a href='login.php'>log in</a>";
}
?>

</body>

</html>