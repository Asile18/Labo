<?php 
require_once("Models/Reservation.php");
$_SESSION["reservationId"] = $_GET["reservation"];

if(isset($_POST["choice"])){
	if($_POST["choice"] === "yes"){
		try
		{
			
			$con->deleteOne();		
			
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
	$p = $reservation["reservationId"];	
}
require_once("Views/Admin/ReservationsViews/delete.php");
 ?>