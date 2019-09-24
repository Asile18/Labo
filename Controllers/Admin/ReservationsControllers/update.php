<?php
require_once("Models/Reservation.php");

$error = "";
// $allHostels = $con->getHostels();
$room = $con->getRoom("roomId");
$reservation = $con->getReservation($_GET["reservation"]);

$hostelResult="";



if(isset($_POST["startDate"], $_POST["endDate"],$_POST["insurance"], $_POST["childrenQuantity"],$_POST["adultQuantity"],$_POST["totalPrice"],
	$_POST["roomId"]

))
{
	$startDate = date($_POST["startDate"]);


	try
	{

		$reservations = $con->updateOne($_GET["reservation"],date($_POST["startDate"]),date($_POST["endDate"]),$_POST["insurance"],$_POST["childrenQuantity"],$_POST["adultQuantity"],$_POST["totalPrice"],$_POST["roomId"]);

		



	}

	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

else {
	$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
}


$rooms = $con->getRooms();
$roomResult = "";

foreach ($rooms as $eachRoom) {

	if($eachRoom["roomId"]==$reservation['roomId']){
		$roomResult.= "<option value=". $eachRoom["roomId"]." selected>". $eachRoom["roomName"] . "</option>" ;
	}
	else{
		$roomResult.= "<option value=". $eachRoom["roomId"].">". $eachRoom["roomName"] . "</option>";
	}
}




require_once("Views/Admin/ReservationsViews/update.php");





?>




