<?php
// operation after log out
session_start();
header('Content-type:text/html; charset=utf-8');
// delete session
$username = $_SESSION['username'];
$_SESSION = array();
session_destroy();

// delete cookie
setcookie('username', '', time() - 99);
setcookie('code', '', time() - 99);

// msg
echo "Bye, " . $username . '<br>';
echo "<a href='login.html'>Log in again</a>";

