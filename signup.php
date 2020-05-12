<?php

if (!isset($_POST['signup'])) {
//    exit("Error Operation");
    print_r(explode('@', 'pichao@email.com'));
    exit();
}

$name = $_POST['username'];
$password = $_POST['password'];

$servername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "password";
$dbname = "pc314";

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

echo $sql . "<br>";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected!<br>";
    $result = $conn->query($sql);
    echo $result . "<br>";
    $conn->close();
}


$urls = array("https://www.shengtao.website/company/api/users/upsert-user.php", "http://ryanhw.com/api/user_create.php");
$data = array("username" => $name, "password" => $password);
//$postdata = json_encode($data);

foreach ($urls as $url) {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        echo($result);
        echo "<br>";
    } catch (Exception $e) {
        throw new Exception("Invalid URL", 0, $e);
        curl_close($ch);
    }
}


echo "<a href='index.php'>Return</a><br>";
echo "<a href='logout.php'>Log out</a><br>";