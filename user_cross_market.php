<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Market - User Visit History</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/shop-homepage.css" rel="stylesheet">

</head>

<body>

<div><br></div>

<!-- Navigation -->
<?php
include "header.php";
//$url = "https://www.shengtao.website/company/api/users.php";
//$ch = curl_init();
# set get
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

# set post
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$res = curl_exec($ch);
//curl_close($ch);
//$res = json_decode($res, true);

$urls = array("http://pichao314.com/trend.php",
    "http://ryanhw.com/api/uservisiting.php",
    "https://www.shengtao.website/company/api/site/user-last-visited.php",
    "http://xunand.com/last_viewed.php");

foreach ($urls as $url) {
    try {
        $ch = curl_init();
        $data = array("username" => "Juli@example.com");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);

//        print_r(explode("/", $url));
        echo explode("/", $url)[2];

        echo "<table border='1'><tr><th>Product Name</th><th>Product Url</th><th>Last Visit</th></tr>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['url'] . "</td>";
            echo "<td>" . $row['timestamp'] . "</td>";
            echo "</tr>";
        }


        echo "</table>";
        echo "<br>";
    } catch (Exception $e) {
        throw new Exception("Invalid URL", 0, $e);
    }
}

include "footer.php"
?>

</body>

</html>
