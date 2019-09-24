<?php 
require_once("../../Models/Hostels.php");
$_SESSION["id"] = $_GET["hostel"];

if(isset($_POST["choice"])){
	if($_POST["choice"] === "yes"){
		try
		{
			
			$con->deleteOne();		
			
			header("Location:index.php?section=selectAll");
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	else {

		header("Location:index.php?section=selectAll");
	}
}
$p = "";
$hostels = $con->getOne($_SESSION["id"]);
foreach ($hostels as $hostel) {
	$p = $hostel["hostelName"];	
}
require_once("Views/Admin/delete.php");
 ?>