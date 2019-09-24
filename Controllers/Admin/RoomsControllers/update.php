<?php 
require_once("Models/Room.php");
$room = $con->getRoom($_GET["room"]);
$hostel = $con->getHostel($room["hostelId"]);

$error = "";
$hostelResult="";
$selected="";
$allHostels = $con->getHostels();
foreach ($allHostels as $eachHostel) {
	if($eachHostel["hostelId"]==$room['hostelId']){
		$hostelResult.= "<option value=". $eachHostel["hostelId"] ." selected>". $eachHostel["hostelName"] . "</option>";

	}
	else{
		$hostelResult.= "<option value=". $eachHostel["hostelId"].">". $eachHostel["hostelName"] . "</option>";
	}

}

$roomTypes = $con->getRoomTypes();
$roomResult = "";

foreach ($roomTypes as $eachRoomType) {

	if($eachRoomType["roomTypeId"]==$room['roomTypeId']){
		$roomResult.= "<option value=". $eachRoomType["roomTypeId"]." selected>". $eachRoomType["roomTypeName"] . "</option>" ;
	}
	else{
		$roomResult.= "<option value=". $eachRoomType["roomTypeId"].">". $eachRoomType["roomTypeName"] . "</option>";
	}
}


$roomOptions = $con->getOptions();
$optionResult="";
foreach ($roomOptions as $eachOption) {
	$optionResult.= "<input type='checkbox' name=". $eachOption["optionName"] . "value=". $eachOption["optionName"]. "><label>".$eachOption["optionName"]."</label><br>";
}

if(isset($_POST["roomName"], 
	$_POST["shortDescription"], 
	$_POST["longDescription"],
	$_POST["bathroomQuantity"],
	$_POST["toiletQuantity"],
	$_POST["balcony"],
	$_POST["children"],
	$_POST["adults"]))
{
// (trim($_POST["nom"]) != "" && trim($_POST["prenom"])){		
		try
		{
			$rooms = $con->updateOne($_POST["roomName"], 
				$_POST["shortDescription"],
				$_POST["longDescription"],
				$_POST["children"],
				$_POST["adults"],
				$_POST["bathroomQuantity"],
				$_POST["toiletQuantity"],
				$_POST["balcony"],
				0,
				$_GET["room"]
			);

header("Location:index.php?section=roomsselectall");

			/*$users = $con->addUser($_POST["nom"], $_POST["prenom"]);*/		
			// header("Location:index.php?section=RoomsSelectAll");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	
}

else {
	$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
}


require_once("Views/Admin/RoomsViews/update.php");

?>