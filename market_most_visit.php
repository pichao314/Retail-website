<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Market - Most Visit</title>

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

$urls = array("http://pichao314.com/topvisit.php",
    "http://ryanhw.com/api/top5visited.php",
    "https://www.shengtao.website/company/api/products/most-visited.php",
    "http://xunand.com/most_liked.php");

$total = array();

foreach ($urls as $url) {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);

//        print_r(explode("/", $url));
        echo "Most visted product at " . explode("/", $url)[2];

        echo "<table border='1' class='table'>
<thead class='thead-dark'>
<tr>
<th>Product Name</th>
<th>Total Visit</th>
</tr>
</thead>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['count'] . "</td>";
            $total[$row['product_name']] = $row['count'];
            echo "</tr>";
        }


        echo "</table>";
        echo "<br>";
    } catch (Exception $e) {
        throw new Exception("Invalid URL", 0, $e);
    }
}

echo "Global Total Visit:<br>";
echo "<table border='1' class='table'>
<thead class='thead-dark'>
<tr>
<th>Product Name</th>
<th>Total Visit</th>
</tr>
</thead>";

arsort($total);

foreach ($total as $product=>$count) {
    echo "<tr>";
    echo "<td>" . $product. "</td>";
    echo "<td>" . $count. "</td>";
    echo "</tr>";
}


echo "</table>";
echo "<br>";


include "footer.php"
?>

</body>

</html>