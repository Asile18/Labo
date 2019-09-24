<?php 
require_once("Models/reservation.php");

try
{
	$table = "<table class='tableAdmin'>";
	$table .= "<tr><th>id</th><th>Client</th><th>Chambre</th><th>Hôtel</th><th>Début du séjour</th><th>Fin du séjour</th><th>Assurance</th><th>Nombre d'enfants</th><th>Nombre d'adultes</th><th>Prix</th><th colspan=2>Actions</th></tr>";
	$reservations = $con->getAll();
	foreach ($reservations as $reservation) {
if($reservation["isCancelled"]==1){

		$table .= '<tr style="background-color:crimson;"><td class="tdTableAdmin">' . $reservation['reservationId'] . '</td>';
}
else{
		$table .= '<tr><td class="tdTableAdmin">' . $reservation['reservationId'] . '</td>';
		}
		$table .= '<td class="tdTableAdmin">' . $con->getByIdUser($reservation['userId'])["firstName"]." ".$con->getByIdUser($reservation['userId'])["lastName"].'</td>';
		$table .= '<td class="tdTableAdmin">' . $con->getRoom($reservation['roomId'])["roomName"] . '</td>';

		$table .= '<td class="tdTableAdmin">' . $con->getHostel($con->getHostelById($reservation['roomId'])["hostelId"])["hostelName"] . '</td>';

		
		$table .= '<td class="tdTableAdmin">' . $reservation['startDate'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $reservation['endDate'] . '</td>';

		if($reservation['insurance']==0){
			$table .= '<td class="tdTableAdmin">' . "Non-assurée" . '</td>';
		}
		else{
			$table .= '<td class="tdTableAdmin">' . "Assurée" . '</td>';
		}
	

		$table .= '<td class="tdTableAdmin">' . $reservation['childrenQuantity'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $reservation['adultQuantity'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $reservation['totalPrice'] . '</td>';




		$table .= '<td class="tdTableAdmin"><a class="btn-update" href="index.php?section=updatereservation&reservation=' . $reservation["reservationId"].'"><button>&#x270E</button></a></td>';

		if($reservation['isCancelled']==1){
			$table .= '<td class="tdTableAdmin" "><a class="btn-delete" href="index.php?section=undeletereservation&reservation=' . $reservation["reservationId"].'"><button> 	&#x2713;</button></a></td></tr>';

		}

		else{
			$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=deletereservation&reservation=' . $reservation["reservationId"].'"><button>&#10007;</button></a></td></tr>';
		}
		

		// $table .= '<td class="tdTableAdmin">' . $reservation['reservationStars'] . '</td>';
		// $table .= '<td class="tdTableAdmin">' .$reservation["add_postCode"] . '</td>';
		// $table .= '<td class="tdTableAdmin">' .$reservation["add_streetName"] . '</td>';
		// $table .= '<td class="tdTableAdmin">' .$reservation["add_number"] . '</td>';
		// $table .= '<td class="tdTableAdmin">' .$reservation["add_country"] . '</td>';
		// $table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=delete&reservation=' . $reservation["reservationId"].'">&#128465;</a></td></tr>';
	}
	$table.="</table>";

	require_once("Views/Admin/ReservationsViews/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}


?>