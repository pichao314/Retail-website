<?php
$score = 5;
$review = "Soooooo Great!!!";
if (isset($_GET["score"])) {
    $score = $_GET["score"];
}
if (isset($_POST['content'])) {
    $review = $_POST['content'];
}
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

$email = "Franchesca@example.com";
$item = "MBP16";

$find = "SELECT * FROM Reviews WHERE email='" . $email . "' AND item='" . $item . "'";
$result = $conn->query($find);
$row = $result->fetch_assoc();
$sql = "";
if ($row) {
    print_r($row);
//    echo "<br>";
    if (isset($_GET['score'])) {
        $sql = "UPDATE Reviews SET score = " . $score . ",post_date = CURRENT_TIMESTAMP"
            . " WHERE  email='" . $email . "' AND item='" .
            $item . "'";
//        echo $sql;
    }
    if (isset($_POST['content'])) {
        $sql = "UPDATE Reviews SET review = '" . $review
            . "',post_date = CURRENT_TIMESTAMP"
            . " WHERE  email='" . $email . "' AND item='" .
            $item . "'";
//        echo $sql;
    }
} else {
//    echo "Review not found<br>";
    $sql = "INSERT INTO Reviews (email, score, item, review) VALUES(
        '" . $email . "', " . $score . ", '" . $item . "', '" . $review . "')";
//    echo $sql;
}

$conn->query($sql);

$conn->close();
