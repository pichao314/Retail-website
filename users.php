<?php
// open Session
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PC314 - USERS</title>
</head>

<body>
<div>
    <a href="index.php">
        <img src="resource/logo.png" alt="LOGO" style="float: left" width="196" height="70"/>
    </a><br><br><br><br>
</div>

<?php

// check if the cookie remembered the user info
if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}
if (isset($_SESSION['islogin'])) {
    // if already logged in
    echo "Hello! " . $_SESSION['username'] . ' ,Welcome to the user page!<br>';
    // alter mysql user
//    ALTER USER 'mysqlUsername'@'localhost' IDENTIFIED WITH mysql_native_password BY 'mysqlUsernamePassword'

    include "db_connect.php";
    $sql = "SELECT * FROM Users;";

    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $conn->close();

    echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>";

    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['homeaddr'] . "</td>";
        echo "<td>" . $row['homephone'] . "</td>";
        echo "<td>" . $row['cellphone'] . "</td>";
        echo "</tr>";
    }
//    while ($row = $result->fetch_assoc()) {
//        echo "<tr>";
//        echo "<td>" . $row['id'] . "</td>";
//        echo "<td>" . $row['firstname'] . "</td>";
//        echo "<td>" . $row['lastname'] . "</td>";
//        echo "<td>" . $row['email'] . "</td>";
//        echo "<td>" . $row['homeaddr'] . "</td>";
//        echo "<td>" . $row['homephone'] . "</td>";
//        echo "<td>" . $row['cellphone'] . "</td>";
//        echo "</tr>";
//        $id += 1;
//        $sql = "SELECT * FROM Users WHERE id = " . $id;
//        $conn->close();
//        // Create connection
//        $conn = new mysqli($servername, $username, $password, $dbname);
////        echo $sql . "<br>";
//        $result = $conn->query($sql);
//
//    }

    echo "</table>";
//    if ($result->num_rows > 0) {
//        // output data of each row
//        while ($row = $result->fetch_assoc()) {
//            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
//        }
//    } else {
//        echo "0 results";
//    }

    echo "<a href='operation.html'>Add or Search User</a><br>";
    echo "<a href='logout.php'>Log out</a><br>";
    echo "These are users from other sites:<br>";
    $url = "https://www.shengtao.website/company/api/users.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($res, true);
    echo "<table border='1'><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Address</th><th>Home Phone</th><th>Cell Phone</th></tr>";
    foreach ($res as $pp) {
        echo "<tr>";
        foreach ($pp as $td) {
            echo "<td>" . $td . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

} else {
    // not logged in
    echo "You haven't logged in, please <a href='login.html'>log in</a>";
}
?>

</body>

</html>