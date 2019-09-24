<?php 

require_once("Models/reservation.php");
$_SESSION["reservationId"] = $_GET["reservation"];

if(isset($_POST["choice"])){
	if($_POST["choice"] === "yes"){
		try
		{
			
			$con->undeleteOne();		
			
			header("Location:index.php?section=reservationsselectall");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:index.php?section=reservationsselectall");
	}
}
$p = "";
$reservations = $con->getOne($_SESSION["reservationId"]);
foreach ($reservations as $reservation) {

	//var_dump($reservation);
	$p = $reservation["reservationId"];	
}
require_once("Views/Admin/reservationsViews/undelete.php");
 ?>