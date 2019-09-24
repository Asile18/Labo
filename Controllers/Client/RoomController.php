<?php 

require_once('Models/Room.php');
require_once('Models/Review.php');

//Rajout de commentaire
if(isset($_POST["comment"], $_POST["stars"],$_SESSION["login"],$_GET["roomId"])){
    $comment = $_POST["comment"];
    $stars = $_POST["stars"];
    $isApproved = 0;
    $room->insertReview($stars,$comment,$isApproved,$_SESSION["login"],$_GET["roomId"]);
}
//Effacer commentaire (ADMIN)
if(isset($_GET["action"],$_SESSION["roleId"],$_GET["reviewId"])){
    //Si admin
    if($_SESSION["roleId"] == 2){
        if($_GET["action"] == "disapprove"){
            $review->disapproveOne($_GET["reviewId"]);
        }
        else if($_GET["action"] == "approve"){
            $review->approveOne($_GET["reviewId"]);
        }
    }
}
//Affichage de base
if(isset($_GET["roomId"])){
    $id = $_GET["roomId"];
    $roomObj = $room->get($id);
    if($roomObj){
        $roomName = $roomObj["roomName"];
        $descriptionShort = $roomObj["shortDescription"];
        $description = $roomObj["longDescription"];
        $children = $roomObj["childrenCapacity"];
        $adults = $roomObj["adultCapacity"];
        $bathrooms = $roomObj["bathroomQuantity"];
        $toilets = $roomObj["toiletQuantity"];
        $balcony = $roomObj["balcony"];
        $roomType = strtoupper($room->getType($roomObj["roomTypeId"])["roomTypeName"]);
        $picturePath = $room->getPicture($id);
        if(!$picturePath){
            $picturePath = "https://image.shutterstock.com/z/stock-vector-unavailable-red-rubber-stamp-vector-isolated-1433120663.jpg";
        }
        $hostelObj = $room->getHostel($roomObj["hostelId"]);
        $hostel = $hostelObj["hostelName"];
        $hostelRue = $hostelObj["add_streetName"];
        $hostelPostCode = $hostelObj["add_postCode"];
        $hostelCountry = $hostelObj["add_country"];
        $hostelNumber = $hostelObj["add_number"];
        $hostelStars =  round($hostelObj["hostelStars"],1);
        $hostelStringStars = "";
        $counHs = 0;
        for($i = 0; $i < $hostelStars; $i++){
            $hostelStringStars .= "★";
            $counHs++;
        }
        for($i = 0; $i < (5-$counHs); $i++){
            $hostelStringStars .= "☆";
        }
        $hostelLat = $hostelObj["coo_lat"];
        $hostelLong = $hostelObj["coo_long"];
        
        if(isset($_GET["daterange"])){
            //recherche des dates de season pour trouver le prix
            $myDate = $_GET["daterange"];
            $anneeDebut = explode("-",$myDate)[2];
            $anneeFin = explode("-",$myDate)[5];
            $myDateStart = explode("-",$myDate)[1] . "/" . explode("-",$myDate)[0];
            $myDateEnd = explode("-",$myDate)[4] . "/" . substr(explode("-",$myDate)[3], 1, 2);
            $totalDays = dateDifference($myDateStart . "/" . $anneeDebut, $myDateEnd . "/" . $anneeFin);
            $seasons = $room->getSeasons();
            //Cree tableaux de prix par jour dependant des seasons pour la reservation et l'affichage du prix
            $tableauxPrix = array();
            for($y = 0; $y <= $totalDays; $y++){
                $calcDate = date('m/d', strtotime('+'.$y.' day', strtotime($myDateStart)));
                for($i = 0; $i < count($seasons); $i++){
                    //change le format jour/mois en mois/jour
                    $start = explode("/",$seasons[$i]["startDate"])[1] . "/" . explode("/",$seasons[$i]["startDate"])[0];
                    $end = explode("/",$seasons[$i]["endDate"])[1] . "/" . explode("/",$seasons[$i]["endDate"])[0];
                   
                    $upperBound = new DateTime($end);
                    $lowerBound = new DateTime($start);
                    $checkDate = new DateTime($calcDate);
                    if ($lowerBound < $upperBound) {
                        $between = $lowerBound < $checkDate && $checkDate < $upperBound;
                    } else {
                        $between = $checkDate < $upperBound || $checkDate > $lowerBound;
                    }
                    if($between){
                        $season = $seasons[$i]["seasonId"];
                        $pr = $room->getPrice($roomObj["roomTypeId"],$season);
                        array_push($tableauxPrix,$pr);
                    }
                }
            }
            $price1 = min($tableauxPrix);
            $price2 = max($tableauxPrix);
            $_SESSION["dateDebut"] = explode("-",$myDate)[0] . "-" . explode("-",$myDate)[1] . "-" . explode("-",$myDate)[2] ;
            $_SESSION["dateFin"] = substr(explode("-",$myDate)[3], 1, 2) . "-" . explode("-",$myDate)[4] . "-" . explode("-",$myDate)[5];
            $_SESSION["nomChambre"] = $roomName;
            $_SESSION["typeChambre"] = $roomType;
            $_SESSION["prixTotale"]  = array_sum($tableauxPrix);
            $_SESSION["nomHotel"] = $hostel;
            $_SESSION["starsHotel"] = $hostelStars;
            $_SESSION["pays"] = $hostelCountry;
            $_SESSION['roomId']= $_GET["roomId"];
            //OPTION
            $_SESSION["balcon"] = $balcony;
            $_SESSION["sDeChambre"] = $hostelObj["roomService"];
            $_SESSION["voiturier"] = $hostelObj["valet"];
            $_SESSION["piscine"] = $hostelObj["pool"];
            $_SESSION["wifi"] = $room->getOption($roomObj["roomTypeId"],1) ? true : false;
            $_SESSION["wifi_price"] = $room->getOptionPrice(1);
            $_SESSION["breakfast"] = $room->getOption($roomObj["roomTypeId"],2) ? true : false;
            $_SESSION["breakfast_price"] = $room->getOptionPrice(2);
            $_SESSION["pets"] = $room->getOption($roomObj["roomTypeId"],3) ? true : false;
            $_SESSION["pets_price"] = $room->getOptionPrice(3);
            $_SESSION["airco"] = $room->getOption($roomObj["roomTypeId"],4) ? true : false;
            $_SESSION["airco_price"] = $room->getOptionPrice(4);
            $_SESSION["tv"] = $room->getOption($roomObj["roomTypeId"],5) ? true : false;
            $_SESSION["tv_price"] = $room->getOptionPrice(5);
        }

        //$price = $room->getPrice($roomObj["roomTypeId"],SEASON);
        $review = $room->getReview($id);
        if($review){
            $reviewData = "";
            $reviewStarsNum = 0;
            $reviewStars = "";
            $countS = 0;
            $approvedReviewCount = 0;
            for($i = 0; $i < count($review); $i++){
                if($review[$i]["isApproved"] == 1){
                    $countR = 0;
                    $soloReviewStars = "";
                    for($y = 0; $y < $review[$i]["reviewStars"]; $y++){
                        $soloReviewStars .= "★";
                        $countR++;
                    }
                    for($y = 0; $y < (5-$countR); $y++){
                        $soloReviewStars .= "☆";
                    }
                    $reviewData .= "<p> " . $review[$i]["comment"] . " (" . $soloReviewStars .") </p>";
                    $reviewStarsNum += $review[$i]["reviewStars"];
                    //admin
                    if(isset($_SESSION["roleId"])){
                        if($_SESSION["roleId"] == 2){
                            //peux désapprouver les commentaire
                            $reviewData .= "<a href='?section=room&roomId=".$id."&reviewId=".$review[$i]["reviewId"] ."&action=disapprove'>Désapprouver</a>";
                        }
                    }
                    $approvedReviewCount++;
                }
                else{
                    if(isset($_SESSION["roleId"])){
                        $countR = 0;
                        $soloReviewStars = "";
                        for($y = 0; $y < $review[$i]["reviewStars"]; $y++){
                            $soloReviewStars .= "★";
                            $countR++;
                        }
                        for($y = 0; $y < (5-$countR); $y++){
                            $soloReviewStars .= "☆";
                        }
                        $reviewData .= "<p style='color:green;'> " . $review[$i]["comment"] . " (" . $soloReviewStars .") - Avis doit être approuvé par un administrateur! </p>";
                        //$reviewStarsNum += $review[$i]["reviewStars"];
                   
                        if($_SESSION["roleId"] == 2){
                            //peux approuver les commentaire
                            $reviewData .= "<a href='?section=room&roomId=".$id."&reviewId=".$review[$i]["reviewId"] ."&action=approve'>Approuver</a>";
                        }
                    }
                }
            }
            if($approvedReviewCount){
                $reviewStarsNum = round(($reviewStarsNum / $approvedReviewCount));
            }
            for($i = 0; $i < $reviewStarsNum; $i++){
                $reviewStars .= "★";
                $countS++;
            }
            for($i = 0; $i < (5-$countS); $i++){
                $reviewStars .= "☆";
            }
            $canReview = false;
            //Recherche l'utilisateur qui a deja reservé cette chambre
            if(isset($_SESSION["login"])){
                $userId = $_SESSION["login"];
                $res = $room->getUserReservation($userId,$id);
                if($res){
                    //utilisateur a déjà reversé cette chambre, il peut donne un avis
                    //verifier qu'il n'a pas deja donné son avis
                    $result = $room->getUserReview($userId,$id);
                    if(!$result){
                        $canReview = true;
                    }
                }
            }
        }
        require_once("Views/Room/room.php");
    }
    else{
        echo "<h2>Erreur:</h2><p>La chambre n'existe pas.</p>";
    }
}
else{
    echo "<h2>Erreur:</h2><p>La chambre n'existe pas.</p>";
}
function dateDifference($start_date, $end_date)
{
    $diff = strtotime($start_date) - strtotime($end_date);
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
}
?>