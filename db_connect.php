<?php
$servername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "password";
$dbname = "pc314";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}