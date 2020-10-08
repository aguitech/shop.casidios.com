<?php
session_start();
function logout(){
    session_destroy();
    session_unset();
    //$location = "location: " . $domain_url . $project_url . "php/login.php";
    $url_next = $_GET["next"];
    //header("location: ../../login.php");
    header("location: $url_next");
    
    //header("location: http://10me.net/php/login.php");
}
logout();
?>