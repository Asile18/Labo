<?php 
require_once('Models/Room_type.php');
require_once('Models/Hostel.php');
require_once("Models/Room.php");
try {
	$getRoomType = $room_type->getAll();
	$result='';
	foreach($getRoomType as $roomType){
		$result .= '<option value="'.$roomType['roomTypeName'].'">'.$roomType['roomTypeName'].'</option>' ;
	}	
	$getHostel = $hostel->getAll();
	$country='';
	foreach($getHostel as $hostel){
		$country .= '<option value="'.$hostel['add_country'].'">'.$hostel['add_country'].'</option>' ;
	}

} 
catch (Exception $e) {
	
}

// require_once("Views/Home/home.php");
// -------------------------------------- à rajouter en methode à Room.php et remplacer dans la variable en dessous $oomsObject

$search = array();
if(isset($_GET["daterange"])){
    $search["daterange"] = $_GET["daterange"];
}else{
    $search["search"] = false;
}

//  
//  pour avoir une liste des id des rooms déjà réservées pour la daterange 
//  (SELECT roomId FROM `reservation` WHERE startDate <= 'dateDebut' AND endDate >= 'dateDebut' OR startDate <= 'dateFin' AND endDate >= 'dateFin');

if(isset($_GET["adults"])){
    $search["adults"] = $_GET["adults"];
}
if(isset($_GET["children"])){
    $search["children"] = $_GET["children"];
}
if(isset($_GET["roomType"])){
    $search["roomType"] = $_GET["roomType"];
}
if(isset($_GET["cityHotel"])){
    $search["cityHotel"] = $_GET["cityHotel"];
}
if(isset($_GET["wifi"])){
    $search["wifi"] = $_GET["wifi"];
}
if(isset($_GET["tv"])){
    $search["tv"] = $_GET["tv"];
}
if(isset($_GET["balcony"])){
    $search["balcony"] = $_GET["balcony"];
}
if(isset($_GET["miniBar"])){
    $search["miniBar"] = $_GET["miniBar"];
}
if(isset($_GET["petsAllowed"])){
    $search["miniBar"] = $_GET["miniBar"];
}
if(isset($_GET["airConditioning"])){
    $search["airConditioning"] = $_GET["airConditioning"];
}
if(isset($_GET["pool"])){
    $search["pool"] = $_GET["pool"];
}
if(isset($_GET["valet"])){
    $search["miniBar"] = $_GET["miniBar"];
}
if(isset($_GET["roomService"])){
    $search["roomService"] = $_GET["roomService"];
}
if(isset($_GET["rate"])){
    $search["rate"] = $_GET["rate"];
}


$roomObjects= $room->searchRoom($search);
$roomsArray = array();
$date= getdate()["month"];
$seasonId= $room->getSeasonId($date);

if($roomObjects)
{
    for($i=0; $i< count($roomObjects); $i++)
    {
        if($roomObjects[$i]["isDeleted"] == '0')
        {
            $roomName[$i]= $roomObjects[$i]["roomName"];
            $roomId[$i]= $roomObjects[$i]["roomId"];
            $descriptionShort[$i] = $roomObjects[$i]["shortDescription"];
            $roomTypeArray[$i] = $room->getType($roomObjects[$i]["roomTypeId"]);
            $roomTypeName[$i]= $roomTypeArray[$i]["roomTypeName"];
            $picturePath[$i] = $room->getPicture($roomObjects[$i]["roomId"]);
            if ($picturePath[$i] == "")
            { 
             $picturePath[$i] = "https://images.pexels.com/photos/1838554/pexels-photo-1838554.jpeg";
            }
            $hostelArray[$i] = $room->getHostel($roomObjects[$i]["hostelId"]);
            $hostelName[$i]= $hostelArray[$i]["hostelName"];
            $hostelStars[$i]= $hostelArray[$i]["hostelStars"];
            $price[$i]= $room->getPrice($roomTypeArray[$i]["roomTypeId"], $seasonId); 
            $priceValue[$i]= (float)$price[$i];
        
           
            $roomArray[$i] = 
                array(
                    'roomName' => $roomName[$i],
                    'descriptionShort' => $descriptionShort[$i],
                    'roomType' => $roomTypeName[$i], 
                    'picturePath' => $picturePath[$i], 
                    'hostelName' => $hostelName[$i], 
                    'hostelStars' => $hostelStars[$i], 
                    'priceValue' => $priceValue[$i], 
                    'roomId' =>$roomId[$i]
                );
            array_push($roomsArray, $roomArray[$i]);
     
            
        }
    }
}
else{
    $noChambre = ">:(";
}
    require_once("Views/Home/home.php");
 ?>