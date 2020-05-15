<?php
include "db_connect.php";

$sql = "SELECT * FROM Users;";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$result->free_result();
$conn->close();
$data = array();
foreach ($rows as $row) {
    array_push($data, $row);
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
