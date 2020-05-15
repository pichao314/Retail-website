<?php
$a = array("a" => 1);

if (array_key_exists("b", $a)) {
    echo "Key Found!<br>";
} else {
    $a['c'] = 3;
    print_r($a);
}
echo "<br>";

echo basename(__FILE__, ".php");

echo json_encode($a);

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$dbname = "pc314";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT last_visit FROM Users WHERE id = 11";

echo "The select sql is :" . $sql ."<br>";
$result = $conn->query($sql);
$conn->close();
$row = $result->fetch_assoc();
print_r($row);
echo gettype($row);
echo $row['last_visit'];