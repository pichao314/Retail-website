<?php
include "db_connect.php";
$sql = "select item,v from Visit order by v desc limit 5";
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