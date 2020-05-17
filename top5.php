<?php
include "db_connect.php";
include "nameconv.php";
$sql = "select item as product_name,avg(score) as average_rating from Reviews group by item order by avg(score) desc limit 5";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$result->free_result();
$conn->close();
$data = array();
foreach ($rows as $row) {
    $pn = $row['product_name'];
    $row['product_name'] = get_name($pn);
    array_push($data, $row);
}

$data = json_encode($data, JSON_PRETTY_PRINT);

echo $data;