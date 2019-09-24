<?php
//trouve l'url
$location = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
if ($_SERVER["SERVER_PORT"] != "80") {
    $location .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
} else {
    $location .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$location = substr($location,0,strpos($location,"section"));

if(!isset($_SESSION["login"])){
    header("Location: ".$location."section=login&previous=reservation");
}
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

$stars = '';
$star = $_SESSION['starsHotel'];
for ($i=0; $i < $star ; $i++) { 
				 $stars .= "★";
				 
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

$result='';
$opts = $room->getOptions();
$a=4;
$optsRoom = $room->getAll();
$resultat='';
$x=4;
foreach ($opts as $opt) {
	$result .= "<label for='option".$a."' $checked[$a]>".$opt['optionName']. ":</label><input type='checkbox' name='".$opt['optionPrice']."' value='option$a' class='check' $checked[$a]>";
	$a++;
}
foreach ($opts as $opt) {
	$resultat .= "<label for='option".$x."' $checked[$x]>".$opt['optionName']. ":</label><input type='checkbox' name='".$opt['optionPrice']."' value='option$a' class='check2' $checked[$x] disabled >";
	$x++;
}
$prixTotal = 0;

if($_SESSION['prixTotale']){
	$prixTotal += $_SESSION['prixTotale'];
}

require_once("Views/Reservation/reservation.php");
if(isset($_POST['ajoutPrix'])){
	echo $_POST['prixTot'];
}
// if(isset($_POST['ajoutBdReservation'])){
// 	echo "test"; 
// 	$classname="prixTotal";
//     $finder = new DomXPath($doc);
//     $prixTot = $finder->query("//*[contains(@class, '$classname')]");
// 	$ajoutReservation = $reservation->addOne($_SESSION["dateDebut"],$_SESSION["dateFin"]);

// }


 ?>