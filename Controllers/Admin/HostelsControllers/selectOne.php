<?php 
require_once("Models/Hostel.php");

if(isset($_GET["hostel"])){	
	var_dump($_GET["hostel"]);
	$hostel = $con->get($_GET['hostel']);
	$p = '<p>' . $hostel['hostelName'].'</p>';

    $p.='<p> Nombre d\'etoiles '. $hostel['hostelStars'].'</p>';
    $p.='<p> Adresse :' . $hostel['add_streetName'].'</br>';
     $p.='&nbsp' . $hostel['add_number'].'</br>';
     $p.='&nbsp' . $hostel['add_postCode'].'</br>';
    $p.='&nbsp' . $hostel['add_country'].'</p>';
    

// 	try{
		
		
// 		foreach ($hostel as $key=) {
// 			$p = '<p>' . $hostel['hostelName'].'</p>';
// var_dump($hostel);
		
// 		}
// 	}
// 	catch(PDOException $e)
// 	{
// 		echo $e->getMessage();
// 	}

	require_once("Views/Admin/HostelsViews/SelectOne.php");
}


 ?>