<?php 
unset($_SESSION["login"]);
unset($_SESSION["roleId"]);
$location = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
if ($_SERVER["SERVER_PORT"] != "80") {
    $location .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
} else {
    $location .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$location = substr($location,0,strpos($location,"section"));
header("Location: ".$location."section=login");
 ?>
 