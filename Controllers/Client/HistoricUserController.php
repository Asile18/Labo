<?php 
require_once('Models/Reservation.php');
require_once('Models/Room.php');
try
{
	$getReservations = $reservation->getByIdUser($_SESSION['login']);
	$isCancelled = "";
	$result='';
	if($getReservations){
		foreach($getReservations as $reservation){
			$roomName = $room->get($reservation['roomId']);
			$hostelName = $room->getHostel($roomName['hostelId']);
			if($reservation['isCancelled'] == 0){
			$isCancelled = 'non';
			}
			else{
				$isCancelled = 'oui';
			}
			$result .= '<tr><td>' .$hostelName['hostelName'].'</td><td>' .$roomName['roomName'].'</td>'.'<td>' .date("d/m/y",strtotime($reservation['startDate'])).'</td>'.'<td>' .date("d/m/y",strtotime($reservation['endDate'])).'</td>'.'<td>' .$reservation['totalPrice'].'</td>'.'<td>' .$isCancelled.'</td></tr>';

		}
	}
	require_once("Views/Historic/historicUserView.php");
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>