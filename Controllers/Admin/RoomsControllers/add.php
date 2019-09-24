<?php 
require_once("Models/Room.php");
require_once("Models/Picture.php");

$error = "";
$msg = "";
$hostelsOptions="";
$message = '';

$allHostels = $con->getHostels();
foreach ($allHostels as $eachHostel) {
	$hostelsOptions.= "<option value=". $con->getHostel($eachHostel['hostelId'])['hostelId'] .">". $con->getHostel($eachHostel['hostelId'])['hostelName'] . "</option>";

}
$roomTypes = $con->getRoomTypes();
$roomResult = "";
foreach ($roomTypes as $eachRoomType) {
	$roomResult.= "<option value=". $eachRoomType["roomTypeId"] .">". $eachRoomType["roomTypeName"] . "</option>";
}

$roomOptions = $con->getOptions();
$optionResult="";
foreach ($roomOptions as $eachOption) {
	$optionResult.= "<input type='checkbox' name=". $eachOption["optionName"] . "value=". $eachOption["optionName"]. "><label>".$eachOption["optionName"]."</label><br>";

}


if(isset($_POST["roomName"], 
	$_POST["shortDescription"], 
	$_POST["longDescription"],
	$_POST["bathroomQuantity"],
	$_POST["toiletQuantity"],
	$_POST["balcony"],
	$_POST["children"],
	$_POST["adults"]))
{
	if(trim($_POST["roomName"]) != "" &&
		trim($_POST["shortDescription"]) != "" && 
		trim($_POST["longDescription"]) != "" &&
		is_numeric($_POST["bathroomQuantity"]) &&
		is_numeric($_POST["toiletQuantity"]) && 
		is_numeric($_POST["balcony"]) && 
		is_numeric($_POST["children"]) &&
		is_numeric($_POST["adults"])
	)
	{
// (trim($_POST["nom"]) != "" && trim($_POST["prenom"])){		
		try
		{
			$rooms = $con->addOne($_POST["roomName"], 
				$_POST["shortDescription"],
				$_POST["longDescription"],
				$_POST["children"],
				$_POST["adults"],
				$_POST["bathroomQuantity"],
				$_POST["toiletQuantity"],
				$_POST["balcony"],
				0,
				$_POST["roomType"],
				$_POST["hotelSelect"]);

//require_once("Models/Room.php");
// Traitement du formulaire.
			if (isset($_POST['test'])) {
				$msg .="WTF"; 
  // Récupérer les informations sur le fichier.
				$informations = $_FILES['picturePath'];
  // En extraire :
  //    - son nom
				$nom = $informations['name'];
  //    - son type MIME
				$type_mime = $informations['type'];
  //    - sa taille
				$taille = $informations['size'];
  //    - l'emplacement du fichier temporaire
				$fichier_temporaire = $informations['tmp_name'];
  //    - le code d'erreur
				$code_erreur = $informations['error'];
  // Contrôles et traitement
				switch ($code_erreur) {
					case UPLOAD_ERR_OK :
    // Fichier bien reçu.
    // Déterminer sa destination finale
					$destination = "Pictures/$nom";
    //recuperer l'id de la room
					$roomId=$con->getLastInsertId();
					$picture=$con->addPicture($destination,$roomId["roomId"]);
    //cmt recupérer l'id de la chambre ajouter
    // Copier le fichier temporaire (tester le résultat).
					if (copy($fichier_temporaire,$destination)) {
      // Copie OK => mettre un message de confirmation.
						$message  = "Transfert terminé - Fichier = $nom - ";
						$message .= "Taille = $taille octets - ";
						$message .= "Type MIME = $type_mime.";
					} else {
      // Problème de copie => mettre un message d'erreur.
						$message = 'Problème de copie sur le serveur.';
					}
					break;
					case UPLOAD_ERR_NO_FILE :
    // Pas de fichier saisi.
					$message = 'Pas de fichier saisi.';
					break;
					case UPLOAD_ERR_INI_SIZE :
    // Taille fichier > upload_max_filesize.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (taille > upload_max_filesize).';
					break;
					case UPLOAD_ERR_FORM_SIZE :
    // Taille fichier > MAX_FILE_SIZE.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (taille > MAX_FILE_SIZE).';
					break;
					case UPLOAD_ERR_PARTIAL :
    // Fichier partiellement transféré.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (problème lors du tranfert).';
					break;
					case UPLOAD_ERR_NO_TMP_DIR :
    // Pas de répertoire temporaire.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (pas de répertoire temporaire).';
					break;
					case UPLOAD_ERR_CANT_WRITE :
    // Erreur lors de l'écriture du fichier sur disque.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (erreur lors de l\'écriture du fichier sur disque).';
					break;
					case UPLOAD_ERR_EXTENSION :
    // Transfert stoppé par l'extension.
					$message  = "Fichier '$nom' non transféré ";
					$message .= ' (transfert stoppé par l\'extension).';
					break;
					default :
    // Erreur non prévue !
					$message  = "Fichier non transféré ";
					$message .= " (erreur inconnue : $code_erreur ).";
				}

			}
			$msg =" <p style=color:green;>La Chambre a bien été ajoutée " .$rooms["roomName"]."</p>";
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}

else {
	$error = "<p style=color:red;>Veuillez remplir correctement les champs</p>";
}


require_once("Views/Admin/RoomsViews/add.php");

?>