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

$id = 1;
$sql = "SELECT * FROM Users WHERE id = " . $id;
//    echo $sql . "<br>";

$result = $conn->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {

//    echo "<tr>";
//    echo "<td>" . $row['id'] . "</td>";
//    echo "<td>" . $row['firstname'] . "</td>";
//    echo "<td>" . $row['lastname'] . "</td>";
//    echo "<td>" . $row['email'] . "</td>";
//    echo "<td>" . $row['homeaddr'] . "</td>";
//    echo "<td>" . $row['homephone'] . "</td>";
//    echo "<td>" . $row['cellphone'] . "</td>";
//    echo "</tr>";
    array_push($data, $row);
    $id += 1;
    $sql = "SELECT * FROM Users WHERE id = " . $id;
    $conn->close();
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
//        echo $sql . "<br>";
    $result = $conn->query($sql);

}

$data = json_encode($data, JSON_PRETTY_PRINT);

echo $data;

//    if ($result->num_rows > 0) {
//        // output data of each row
//        while ($row = $result->fetch_assoc()) {
//            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
//        }
//    } else {
//        echo "0 results";
//    }

$conn->close();