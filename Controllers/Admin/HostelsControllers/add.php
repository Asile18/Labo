<?php 
require_once("Models/Hostel.php");
$error = "";

if(isset($_POST["hostelName"], $_POST["hostelStars"], $_POST["add_postCode"],$_POST["add_number"],$_POST["add_streetName"],$_POST["add_country"],$_POST["coo_lat"],$_POST["coo_long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"],$_POST["isDeleted"])){
	if(trim($_POST["hostelName"]) != "" &&
		
		(($_POST["add_postCode"] <= 9999) && ($_POST["add_postCode"] >= 1000 )) && 
		
		trim($_POST["add_streetName"]) != "" &&	
		is_numeric($_POST["coo_lat"]) &&
		is_numeric($_POST["coo_long"]) &&
		is_numeric($_POST["phone"]) &&
		trim($_POST["email"]) != "" &&
		is_numeric($_POST["touristTaxes"])){



// (trim($_POST["nom"]) != "" && trim($_POST["prenom"])){		
		try
	{
		$hostels = $con->addOne($_POST["hostelName"], $_POST["hostelStars"], $_POST["add_postCode"],$_POST["add_number"],$_POST["add_streetName"],$_POST["add_country"],$_POST["coo_lat"],$_POST["coo_long"],$_POST["phone"],$_POST["email"],$_POST["pool"],$_POST["valet"],$_POST["roomService"],$_POST["touristTaxes"],$_POST["isDeleted"],$_POST["forumId"]);



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


require_once("Views/Admin/HostelsViews/add.php");

?>