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
//    echo "Connected successfully<br>";
//
//    // sql to create table
//    $sql = "CREATE TABLE Users (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//firstname VARCHAR(30) NOT NULL,
//lastname VARCHAR(30) NOT NULL,
//email VARCHAR(50),
//homeaddr VARCHAR(50),
//homephone VARCHAR(50),
//cellphone VARCHAR(50),
//reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//)";
//
//    if (!$conn->query("DROP TABLE IF EXISTS Users") || !$conn->query($sql) === TRUE) {
//        echo "Error creating table: " . $conn->error;
//    }
////    echo "Table Users created successfully <br>";
//
//    $sql = "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Franchesca', 'Kirch', 'Franchesca@example.com','Kirch home','0000000','0000000');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Detra', 'Yeomans', 'Detra@example.com','Yeomans home','1111111','1111111');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Corene', 'Legge', 'Corene@example.com','Legge home','2222222','2222222');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Kurtis', 'Meza', 'Kurtis@example.com','Meza home','3333333','3333333');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Marlyn', 'Kinkel', 'Marlyn@example.com','Kinkel home','4444444','4444444');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Courtney', 'Barranco', 'Courtney@example.com','Barranco home','5555555','5555555');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Antonia', 'Morrisey', 'Antonia@example.com','Morrisey home','6666666','6666666');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Anthony', 'Mars', 'Anthony@example.com','Mars home','7777777','7777777');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Shila', 'Robarge', 'Shila@example.com','Robarge home','8888888','8888888');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Jovita', 'Forsyth', 'Jovita@example.com','Forsyth home','9999999','9999999');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Juli', 'Ruybal', 'Juli@example.com','Ruybal home','10101010101010','10101010101010');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Celsa', 'Beacham', 'Celsa@example.com','Beacham home','11111111111111','11111111111111');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Akiko', 'Tremblay', 'Akiko@example.com','Tremblay home','12121212121212','12121212121212');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Socorro', 'Riffe', 'Socorro@example.com','Riffe home','13131313131313','13131313131313');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Christi', 'Greenidge', 'Christi@example.com','Greenidge home','14141414141414','14141414141414');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Bethany', 'Fontaine', 'Bethany@example.com','Fontaine home','15151515151515','15151515151515');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Daniell', 'Mckiernan', 'Daniell@example.com','Mckiernan home','16161616161616','16161616161616');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Dillon', 'Grayer', 'Dillon@example.com','Grayer home','17171717171717','17171717171717');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Alease', 'Goertz', 'Alease@example.com','Goertz home','18181818181818','18181818181818');";
//    $sql .= "INSERT INTO Users (firstname, lastname, email, homeaddr, homephone, cellphone) VALUES ('Keith', 'Spieker', 'Keith@example.com','Spieker home','19191919191919','19191919191919');";
//
//    if ($conn->multi_query($sql) === TRUE) {
//        $last_id = $conn->insert_id;
////        echo "New record created successfully. Last inserted ID is: " . $last_id . "<br>";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
//    }
//
//    $conn->close();
//    // Create connection
//    $conn = new mysqli($servername, $username, $password, $dbname);
//
//// Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }

//    $id = 1;
//    $sql = "SELECT * FROM Users WHERE id = " . $id;
//    echo $sql . "<br>";

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