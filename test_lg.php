<?php
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
echo "Connected successfully<br>";

$username = "\"Franchesca@example.com\"";
$sql = "SELECT * FROM Users WHERE email = " . $username;
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row){
    echo $row['password'];
}
else{
    echo "Not Found!";
}
$conn->close();