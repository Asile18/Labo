<?php 
require_once("Models/User.php");

if(isset($_GET["user"])){	
	
	$user = $user->getById($_GET['user']);
	$p = '<p>Nom :' . $user['firstName'].'</p>';
    $p.='<p> Prénom : '. $user['lastName'].'</p>';
    $p.='<p> Adresse :' . $user['email'].'</br>';
    $p.='&nbsp' . $user['phone'].'</br>';
    $p.='&nbsp' . $user['country'].'</p>';


	require_once("Views/Admin/ClientsViews/selectOne.php");
}


 ?>