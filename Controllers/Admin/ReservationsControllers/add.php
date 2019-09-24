<?php 
require_once("Models/Reservation.php");
$error = "";
$isDeleted = 0;
if(isset($_POST["insurance"], $_POST["isCancelled"], $_POST["childrenQuantity"],$_POST["adultQuantity"],$_POST["totalPrice"],$_POST["roomId"],$_POST["userId"])){
	if(
		is_numeric($_POST["childrenQuantity"]) && 
		is_numeric($_POST["childrenQuantity"]) &&
		is_numeric($_POST["totalPrice"]) != "" &&
		is_numeric($_POST["userId"]))
	{



// (trim($_POST["nom"]) != "" && trim($_POST["prenom"])){		
		try
		{
			$hostels = $con->addOne($_POST["insurance"], $_POST["isCancelled"], $_POST["childrenQuantity"],$_POST["adultQuantity"],$_POST["totalPrice"],$_POST["roomId"],$_POST["userId"]);



			/*$users = $con->addUser($_POST["nom"], $_POST["prenom"]);*/		
		// header("Location:index.php?section=hostelsselectall");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
else {
	$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
}


require_once("Views/Admin/ReservationsViews/add.php");

?>