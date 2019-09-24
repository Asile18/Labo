<?php 


require_once("Models/Review.php");
if(isset($_POST["reviewId"])){
	if(isset($_POST["disapprove"])){
		//requete db pour disaprove
		$con->disapproveOne($_POST["reviewId"]);
	}
	echo $_POST["delete"];
	echo $_POST["approve"];
}


// require_once("Models/Review.php");
// $_SESSION["reviewId"] = $_GET["reviewId"];

// var_dump($_GET);
// 	if($_GET[""]){
// 		var_dump($_GET);
// 		try
// 		{
			
// 			$con->deleteOne();		
			
// 			header("Location:index.php?section=reviewssselectall");
// 		}
// 		catch(PDOException $e)
// 		{
// 			echo $e->getMessage();
// 		}
// 	}
// 	else {

// 		header("Location:index.php?section=reviewsselectall");
// 	}
// }
// $p = "";
// $hostels = $con->get($_SESSION["hostelId"]);
// foreach ($hostels as $hostel) {

// 	// var_dump($hostel);
// 	$p = $hostels["hostelName"];	
// }
require_once("Views/Admin/ReviewsViews/selectall.php");
 ?>