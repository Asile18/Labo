<?php 

require_once('Models/User.php');

$nav = "";
$client = false;
$admin = false;
if(isset($_SESSION["login"]) && isset($_SESSION["roleId"])){
    //userId & roleId
    $login = $_SESSION["login"];
    $roleId = $_SESSION["roleId"];
    $dbUser = $user->getById($login);
    $userName = $dbUser["firstName"] . " " . $dbUser["lastName"];

    //client
    if($roleId == 1){
        $client = true;
    }
    //admin
    else if($roleId == 2){
        $admin = true;
    }
}

require_once('Views/Pages/navigation.php')
?>

