<?php 
require_once("../../../Models/Hostel.php");
$error = "";

if(isset($_POST["hostelName"], $_POST["hostelStars"], $_POST["postCode"],$_POST["number"],$_POST["streetName"],$_POST["country"],$_POST["lat"],$_POST["long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"])){
	if(($_POST["hostelName"]) != "", $_POST["hostelStars"]  , $_POST["postCode"],$_POST["number"],$_POST["streetName"],$_POST["country"],$_POST["lat"],$_POST["long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"])))




// (trim($_POST["nom"]) != "" && trim($_POST["prenom"])){		
	try
	{
$hostels = $con->addOne($_POST["hostelName"], $_POST["hostelStars"], $_POST["postCode"],$_POST["number"],$_POST["streetName"],$_POST["country"],$_POST["lat"],$_POST["long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"])



		/*$users = $con->addUser($_POST["nom"], $_POST["prenom"]);*/		
		header("Location:index.php?section=selectAll");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

else {
	$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
}
}

require_once("Views/Admin/add.php");

?>