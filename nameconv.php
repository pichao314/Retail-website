<?php

function get_url($item)
{
    return "http://pichao314.com/" . $item . ".php";
}

function get_name($item)
{
    $product_name = array("alw_51m" => "Alienware Area-51M ",
        "alw_m15" => "Alienware M15",
        "alw_m17" => "Alienware M17",
        "apl_mba" => "Apple MacBook Air",
        "apl_mbp" => "Apple MacBook Pro",
        "alw_r8" => "Alienware Aurora R8",
        "alw_arr" => "Alienware Aurora",
        "alw_ryzen" => "Alienware Ryzen",
        "apl_imac" => "Apple iMac",
        "apl_imp" => "Apple iMac Pro");
    return $product_name[$item];
}

//$product_name = array("alw_51m" => "Alienware Area-51M ",
//    "alw_m15" => "Alienware M15",
//    "alw_m17" => "Alienware M17",
//    "apl_mba" => "Apple MacBook Air",
//    "apl_mbp" => "Apple MacBook Pro",
//    "alw_r8" => "Alienware Aurora R8",
//    "alw_arr" => "Alienware Aurora",
//    "alw_ryzen" => "Alienware Ryzen",
//    "apl_imac" => "Apple iMac",
//    "apl_imp" => "Apple iMac Pro");
//
//foreach ($product_name as $item => $name) {
//    echo "<a href='" . get_url($item) . "'>" . $name . "</a>";
//    echo "<br>";
//}