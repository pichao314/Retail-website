
<?php
header('Content-type:text/html; charset=utf-8');
// operation after log out
session_start();
// delete session
$username = $_SESSION['username'];
$_SESSION = array();
session_destroy();

// delete cookie
setcookie('username', '', time()-99);
setcookie('code', '', time()-99);

// msg
echo "    <a href=\"index.php\">
        <img src=\"logo.png\" alt=\"LOGO\" style=\"float: left\" width=\"196\" height=\"70\"/>
    </a>";
echo "Bye, ".$username.'<br>';
echo "<a href='login.html'>Log in again</a>";

?>