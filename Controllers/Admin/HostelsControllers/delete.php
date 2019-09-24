<?php 

require_once("Models/Hostel.php");
$_SESSION["hostelId"] = $_GET["hostel"];

if(isset($_POST["choice"])){
	if($_POST["choice"] === "yes"){
		try
		{
			
			$con->deleteOne($isDeleted);		
			
			header("Location:index.php?section=hostelsselectall");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:index.php?section=hostelsselectall");
	}
}
$p = "";
$hostels = $con->get($_SESSION["hostelId"]);
foreach ($hostels as $hostel) {

	// var_dump($hostel);
	$p = $hostels["hostelName"];	
}
require_once("Views/Admin/HostelsViews/delete.php");
 ?>