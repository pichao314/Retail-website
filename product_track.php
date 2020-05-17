<?php

session_start();
# check if logged

if (isset($_COOKIE['username'])) {
    // if so, passed to session directory
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
}

# get product name
//$item = basename(__FILE__, ".php");
//$item = basename($_SERVER['REQUEST_URI'], ".php");

# get visit history
$arr = array();
if (isset($_COOKIE['history'])) {
    $arr = json_decode($_COOKIE['history'], true);
}
# push current product into visit history

$arr[$item] = $item;
//array_push($arr, $item);

# shift array if exceed 5
if (count($arr) > 5) {
    array_shift($arr);
}

# set history into cookies
$his = json_encode($arr);
setcookie('history', $his, time() + (86400 * 30), '/');

# get trend history
$dc = json_decode($_COOKIE['trend'], true);
if (isset($dc[$item])) {
    $dc[$item] += 1;
} else {
    $dc[$item] = 1;
}

# set trend into cookies
setcookie("trend", json_encode($dc), time() + (86400 * 30), "/");

#add trend and history to db for logged user
if (isset($_SESSION['username'])) {
    include "db_connect.php";

//    $sql = "UPDATE Users SET last_visit = '" . $his
//        . " 'WHERE  email='" . $_SESSION['username'] . "' AND id>0;";
    $sql = "INSERT INTO Visit (user,item) VALUES ('".$_SESSION['username']."','".$item."')";

//    echo "The update sql is :" . $sql;
    $conn->query($sql);
    $conn->close();
}

//include "db_connect.php";
//$sql = "select item,v from Visit where item='" . $item . "';";
////echo "The visit sql is:" . $sql;
////
////$sql = "UPDATE Users SET last_visit = '" . $his
////    . " 'WHERE  email='" . $_SESSION['username'] . "' AND id>0;";
//
////    echo "The update sql is :" . $sql;
//$result = $conn->query($sql);
//$row = $result->fetch_assoc();
////echo "The visited number is " . $row['v'];
//$nv = $row['v'] + 1;
//$upd = "UPDATE Visit SET v = " . $nv
//    . " WHERE  item='" . $item . "' AND id>0;";
//$conn->query($upd);
//$conn->close();