<?php 
require_once("Models/User.php");
$p = "";
if(isset( $_GET["user"])){

if(isset($_POST["choice"])){

	if($_POST["choice"] === "yes"){
		try
		{
			
			$user->delete($_GET["user"] );		
			
			header("Location:index.php?section=usersselectall");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:index.php?section=usersselectall");
	}
}

$users = $user->getById($_GET["user"]);

foreach ($users as $user) {
	$p = $users["firstName"]. " " . $users["lastName"];	
 }
}
require_once("Views/Admin/ClientsViews/delete.php");

 ?>