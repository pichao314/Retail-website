<?php
// open Session
//session_start();
if (!isset($_POST['username']) or !isset($_POST['password'])) {
    exit("username or password NOT FOUND");
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

print_r($data);
echo "<br>";

$name = $_POST['username'];
$password = $_POST['password'];

# accept form data
$fname = explode('@', $name)[0];
$lname = $fname;
$email = $name;
$addr = $fname . "s Home";
$hphone = "88888888";
$cphone = "88888888";


$sql = "INSERT INTO Users (firstname, lastname, email, password,homeaddr, homephone, cellphone) VALUES ('"
    . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $addr . "','" . $hphone . "','" . $cphone .
    "');";

echo "The posted query is " . $sql . "<br>";

include "db_connect.php";
echo "Database connected!<br>";
$result = $conn->query($sql);
echo $result . "<br>";
$conn->close();

?>

</body>

</html>