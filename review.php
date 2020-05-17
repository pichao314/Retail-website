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
include "db_connect.php";

$item = "index";
if (isset($_POST["item"])) {
    $item = $_POST["item"];
}

//$find = "SELECT * FROM Reviews WHERE email='" . $email . "' AND item='" . $item . "'";
//$result = $conn->query($find);
//$conn->close();
//$row = $result->fetch_assoc();
//$sql = "";
//if ($row) {
//    print_r($row);
//    echo "<br>";
//    if (isset($_GET['score'])) {
//        $sql = "UPDATE Reviews SET score = " . $score . ",post_date = CURRENT_TIMESTAMP"
//            . " WHERE  email='" . $email . "' AND item='" .
//            $item . "'";
//        echo $sql;
//    }
//    if (isset($_POST['content'])) {
//        $sql = "UPDATE Reviews SET review = '" . $review
//            . "',post_date = CURRENT_TIMESTAMP"
//            . " WHERE  email='" . $email . "' AND item='" .
//            $item . "'";
//        echo "Rating for " . $item . " successfully added!";
//    }
//} else {
//    echo "Review not found<br>";
//    $sql = "INSERT INTO Reviews (email, score, item, review) VALUES(
//        '" . $email . "', " . $score . ", '" . $item . "', '" . $review . "');";
//    echo $sql;
//}
$sql = "INSERT INTO Reviews (email, score, item, review) VALUES('"
    . $email . "', " . $score . ", '" . $item . "', '" . $review . "');";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query($sql);
print_r($result);
echo "<a href=" . $item . ".php>RETURN</a>";

$conn->close();
