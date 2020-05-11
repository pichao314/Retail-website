<?php
session_start();
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
$email = "test@example.com";
if (isset($_SESSION['islogin'])) {
// if already logged in
    echo $_SESSION['username'] . " 's rating successfully added!<br>";
    $email = $_SESSION['username'];
} else {
    // not logged in
    echo "Want to write review? Please <a href='login.html'>log in</a>";
}
$score = 5;
$review = "Soooooo Great!!!";
if (isset($_POST["score"])) {
    $score = $_POST["score"];
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


$item = "index";
if (isset($_POST["item"])) {
    $item = $_POST["item"];
}

$find = "SELECT * FROM Reviews WHERE email='" . $email . "' AND item='" . $item . "'";
$result = $conn->query($find);
$conn->close();
$row = $result->fetch_assoc();
$sql = "";
if ($row) {
    print_r($row);
    echo "<br>";
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
        '" . $email . "', " . $score . ", '" . $item . "', '" . $review . "');";
//    echo $sql;
}

$conn = new mysqli($servername, $username, $password, $dbname);
$result = $conn->query($sql);
echo "<a href=" . $item . ".php>RETURN</a>";

$conn->close();
