<?php 
require_once("../../Models/Hostel.php");

if(isset($_GET["hostel"])){	
	try{
		$hostels = $con->getOne($_GET['hostel']);
		
		foreach ($hostels as $hostel) {
			$p = '<p>' . $hostel['hostelName'].'</p>';
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

	require_once("Views/Admin/HostelsViews/selectOne.php");
}


 ?>