<?php 
require_once('Models/Room.php');
require_once('Models/Reservation.php');

$checked[0] = "hidden";
$checked[1] = "hidden";
$checked[2] = "hidden";
$checked[3] = "hidden";

$b=4;
$checks = $room->getOptions();
foreach ($checks as $check) {
	$checked[$b]="hidden";
	$b++;
}

if($_SESSION['wifi']){
	$checked[4] = 'visible';
}
if($_SESSION['breakfast']){
	$checked[5] = 'visible';
}
if($_SESSION['pets']){
	$checked[6] = 'visible';
}
if($_SESSION['airco']){
	$checked[7] = 'visible';
}
if($_SESSION['tv']){
	$checked[8] = 'visible';
}
if($_SESSION['piscine']){
	$checked[0] = 'checked';
}
if($_SESSION['voiturier']){
	$checked[1] = 'checked';
}
if($_SESSION['sDeChambre']){
	$checked[2] = 'checked';
}
if($_SESSION['balcon']){
	$checked[3] = 'checked';
}

$resultat='';
$opts = $room->getOptions();
$x=4;
foreach ($opts as $opt) {
	$resultat .= "<label for='option".$x."' $checked[$x]>".$opt['optionName']. ":</label><input type='checkbox' name='".$opt['optionPrice']."' value='option$x' class='check2' $checked[$x] disabled >";
	$x++;
}

$stars = '';
$star = $_SESSION['starsHotel'];
for ($i=0; $i < $star ; $i++) { 
				 $stars .= "★";
				 
}

$startDate = date("Y-m-d",strtotime($_SESSION["dateDebut"]));
$endDate = date("Y-m-d",strtotime($_SESSION["dateFin"]));
$prix=$_POST['ajoutPrix'];
$user=$_SESSION["login"];
$insurance=$_POST['insurance2'];
if($insurance==1){
	$assuranceAffichage = "Vous avez pris l'assurance annulation";
}
else{
	$assuranceAffichage = "Vous n'avez pas pris l'assurance annulation";
}

$ajoutReservation = $reservation->addOne($startDate,$endDate,$insurance,0,0,2,$prix,$_SESSION['roomId'],$user);

require_once('Views/Reservation/validation.php');
 ?>