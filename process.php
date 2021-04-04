<?php

session_start();
date_default_timezone_set("Asia/Singapore");

if(isset($_POST["reset"])){
    session_destroy();
    header("location: index.php");

}

function randomizer($min,$max){
    return rand($min,$max);
}
function resultLog ($result){
    array_unshift($_SESSION["logs"],"<p class='bg_earn'>You entered a {$_POST['building']} and earned $result golds. " . date("F d Y h:i A") . "</p>");
}
if (empty($_SESSION["score"])){
    $_SESSION["score"] = 0;
    $_SESSION["logs"] = [];
}
if(isset($_POST["building"]) && $_POST["building"] == "farm"){
    $result = randomizer(10,20);
    $_SESSION["score"] += $result;
    resultLog($result);
}
if(isset($_POST["building"]) && $_POST["building"] == "cave"){
    $result = randomizer(5,10);
    $_SESSION["score"] += $result;
    resultLog($result);
}
if(isset($_POST["building"]) && $_POST["building"] == "house"){
    $result = randomizer(2,5);
    $_SESSION["score"] += $result;
    resultLog($result);
}
if(isset($_POST["building"]) && $_POST["building"] == "casino"){
    $earn_or_take = randomizer(0, 1);
    $result = randomizer(0,50);
    if ($earn_or_take) {
        $_SESSION["score"] += $result;
        resultLog($result);
    } else {
        $_SESSION["score"] -= $result;
        array_unshift($_SESSION["logs"],"<p class='bg_lost'> You entered a {$_POST['building']} and lost $result golds. " . date("F d Y h:i A") ."</p>");
    }
}

header("location: index.php");


die();