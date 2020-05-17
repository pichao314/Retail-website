<?php
if (isset($_POST['username'])) {
    include "db_connect.php";
    include "nameconv.php";
    $email = $_POST['username'];
    $sql = "select last_visit from Users where email = '" . $email . "';";
    $sql = "select item as url, view_time as timestamp from Visit where user='" . $email . "' order by view_time DESC limit 5;";
    $result = $conn->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    $conn->close();
    if (!$row) {
        echo "[]";
    } else {
        $data = array();
        foreach ($row as $r) {
            $pn = $r['url'];
            $r['product_name'] = $pn;
            $r['url'] = get_url($pn);
            array_push($data, $r);
        }

        $data = json_encode($data, JSON_PRETTY_PRINT);

        echo $data;
    }
} else {
    echo "
<!DOCTYPE HTML>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>PC314 - TREND</title>
    <!--    <link rel=\"stylesheet\" href=\"style/pcstyle.css\">-->
</head>
<body>
<div>
    <a href=\"index.php\">
        <img src=\"resource/logo.png\" alt=\"LOGO\" style=\"float: left\" width=\"196\" height=\"70\"/>
    </a><br><br><br><br>
</div>
<br>";
    if (!isset($_COOKIE["trend"])) {
        echo "There's no trend!<br>";
    } else {
        $dc = json_decode($_COOKIE['trend'], true);
        arsort($dc);
        $st = array_slice($dc, 0, 5);
        echo "Your top five visited products are:<br>";
        echo "<ol>";
        foreach ($st as $pd => $ct) {
            echo "<li>$pd </li>";
        }
        echo "</ol>";
        echo "<a href=\"clear.php\">Clear History</a><br>";
    }
    echo "<a href=\"product.php\">RETURN</a>
</body>
</html>";
}


?>
