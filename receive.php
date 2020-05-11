<?php
// open Session
//session_start();
if (!isset($_POST['username']) or !isset($_POST['password'])) {
    exit("Username or Password Not found");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - Receive</title>
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<?php

$data = json_encode($_POST, JSON_PRETTY_PRINT);

print_r($data)


?>

</body>

</html>