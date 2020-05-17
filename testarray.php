<?php
$urls = array("http://pichao314.com/trend.php",
    "http://ryanhw.com/api/uservisiting.php",
    "https://www.shengtao.website/company/api/site/user-last-visited.php",
    "http://xunand.com/last_viewed.php");

$url = $urls[2];
$email = "admin@email.com";

try {
    $ch = curl_init();
    $name = array("username" => $email);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $name);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($result, true);
    print_r($data);
    echo "<table border='1'><tr><th>Url Name</th><th>Last Visit</th></tr>";
    foreach ($data as $row) {
        echo "<tr>";
        if (!isset($row['product_name'])) {
            print_r(explode('/', $row['url']));
            $row['product_name'] = explode('/', $row['url'])[0];
        }
        echo "<td><a href='" . $row['url'] . "'>" . $row['product_name'] . "</a> </td>";
        echo "<td>" . $row['timestamp'] . "</td>";
        echo "</tr>";
    }


    echo "</table>";
    echo "<br>";
} catch (Exception $e) {
    throw new Exception("Invalid URL", 0, $e);
}