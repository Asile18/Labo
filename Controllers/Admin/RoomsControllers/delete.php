<?php 
require_once("Models/Room.php");
$_SESSION["roomId"] = $_GET["room"];

if(isset($_POST["choice"])){
	if($_POST["choice"] === "yes"){
		try
		{
			
			$con->deleteOne($isDeleted);		
			
			header("Location:index.php?section=roomsselectall");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:index.php?section=roomsselectall");
	}
}
$p = "";
$rooms = $con->getRoom($_SESSION["roomId"]);
foreach ($rooms as $room) {
	$p = $rooms["roomName"];	
}
require_once("Views/Admin/RoomsViews/delete.php");
 ?>