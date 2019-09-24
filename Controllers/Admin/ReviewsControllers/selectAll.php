<?php 
require_once("Models/Review.php");


if(isset($_POST["reviewId"])){
	if(isset($_POST["approve"])){
		//requete db pour disaprove
		$con->approveOne($_POST["reviewId"]);
	}
	if(isset($_POST["disapprove"])){
		//requete db pour disaprove
		$con->disapproveOne($_POST["reviewId"]);
	}
	if(isset($_POST["delete"])){
		//requete db pour disaprove
		$con->deleteOne($_POST["reviewId"]);
	}
	// echo $_POST["delete"];
	// echo $_POST["approve"];
}




try
{
	$table = "<table class='tableAdmin'>";
	$table .= "<tr style='background-color:skyblue;color:salmon;'><th>id</th><th>Commentaire</th><th>Chambre</th><th>Valider/Désactiver</th><th>Supprimer</th></tr>";
	$reviews = $con->getAll();
	foreach ($reviews as $review) {
		if($review['isApproved']==0){
			
			$table .= '<tr style="background-color:crimson;"><td class="tdTableAdmin">' . $review['reviewId'] . '</td>';

		}
		else{
			$table .= '<tr><td class="tdTableAdmin">' . $review['reviewId'] . '</td>';
		}

		$table .= '<td class="tdTableAdmin">' . $review['comment'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $con->getRoom($review['roomId'])["roomName"] . '</td><form action="" method="POST">';
		// $table .= '<form action="" method="POST"><td class="tdTableAdmin"><input type=submit value="Approuver" name="approve"></input></td>';
		$table .= '<input type=hidden value="'.$review['reviewId'] . '" name="reviewId"></input>';


		if($review['isApproved']==0){
			$table .= '<td class="tdTableAdmin"><input type=submit value="&#x2713" name="approve"></input></td>';
			$table .= '<input type=hidden value="'.$review['reviewId'] . '" name="reviewId"></input>';
		}


		else{		
			$table .= '<td class="tdTableAdmin"><input type=submit value="&#10007" name="disapprove"></input></td>';
			$table .= '<input type=hidden value="'.$review['reviewId'] . '" name="reviewId"></input>';
		}

		$table .= '<td class="tdTableAdmin"><input type=submit value="Supprimer" name="delete"></input></td></tr></form>';

	}
	$table.="</table>";

	require_once("Views/Admin/reviewsViews/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}		


?>
