<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Market - Top Rated</title>

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

$urls = array("http://pichao314.com/top5.php",
    "http://ryanhw.com/api/top5rated.php",
    "https://www.shengtao.website/company/api/products/rating-highest.php",
    "http://xunand.com/top_rate.php");

foreach ($urls as $url) {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);

//        print_r(explode("/", $url));
        echo "Top rated at " . explode("/", $url)[2];

        echo "<table border='1' class='table'>
<thead class='thead-dark'>
<tr><th>Product Name</th><th>Average Rating</th>
</tr></thead>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['average_rating'] . "</td>";
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
