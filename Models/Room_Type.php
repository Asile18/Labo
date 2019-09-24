<?php
require_once("Connection.php");
class room_type extends Connection{


public function getAll(){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM room_type ORDER BY roomTypeId";
		$objects = $pdo->query($request);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
}

public function getRoomType($roomTypeId){
	$pdo = $this->dbConnection();
	$request = "SELECT * FROM room_type WHERE roomTypeId = :$roomTypeId";	
	$objects = $pdo->prepare($request);
	$objects->execute(array(
		'roomTypeId' => $roomTypeId
	));
	return $objects->fetchAll(PDO::FETCH_ASSOC);
}


//   public function getHostel($hostelId){
//         $pdo = $this->dbConnection();
//         $stmt = $pdo->prepare("SELECT * FROM hostel WHERE hostelId=?");
//         $stmt->execute([$hostelId]); 
//         return $review = $stmt->fetch();
//     }




// public function addOne($roomName,$shortDescription,$longDescription,$childrenCapacity,$adultCapacity,$bathroomQuantity,$toiletQuantity,$balcony,$isDeleted){
// 	$pdo = $this->dbConnection();
// 	$request = "INSERT INTO room VALUES (:roomName,:shortDescription,:longDescription,:childrenCapacity,:adultCapacity,:bathroomQuantity,
// 	:toiletQuantity,:balcony,:isDeleted)";

// 	$objects = $pdo->prepare($request);
// 	$objects->execute(array(
// 		'roomName'=> $roomName,
// 		'shortDescription'=>$shortDescription,
// 		'longDescription'=>$longDescription,
// 		'childrenCapacity'=>$childrenCapacity,
// 		'adultCapacity'=>$adultCapacity,
// 		'bathroomQuantity'=>$bathroomQuantity,
// 		'toiletQuantity'=>$toiletQuantity,
// 		'balcony'=>$balcony,
// 		'isDeleted'=>$isDeleted,
		


// 	));

// }

// public function updateOne($roomName,$shortDescription,$longDescription,$childrenCapacity,$adultCapacity,$bathroomQuantity,$toiletQuantity,$balcony,$isDeleted){
// 	$pdo = $this->dbConnection();
// 	$request = "UPDATE room SET roomName = :roomName,  shortDescription = :shortDescription, childrenCapacity= :childrenCapacity, adultCapacity= :adultCapacity,bathroomQuantity =:bathroomQuantity , toiletQuantity= :toiletQuantity, balcony= :balcony, isDeleted = :isDeleted";

// 	$objects = $pdo->prepare($request);
// 	$objects->execute(array(
// 		'roomName'=> $roomName,
// 		'shortDescription'=>$shortDescription,
// 		'longDescription'=>$longDescription,
// 		'childrenCapacity'=>$childrenCapacity,
// 		'adultCapacity'=>$adultCapacity,
// 		'bathroomQuantity'=>$bathroomQuantity,
// 		'toiletQuantity'=>$toiletQuantity,
// 		'balcony'=>$balcony,
// 		'isDeleted'=>$isDeleted,
// 	));
// }

// public function deleteOne($isDeleted){
// 	$pdo = $this->dbConnection();
// 		//$request = "DELETE FROM hostel WHERE id = :id";
// 	$request = "UPDATE room SET isDeleted = true WHERE roomId = :roomId";/*cmt vas ton recuperer la variable*/
// 	$objects = $pdo->prepare($request);
// 	$objects->execute(array(
// 		'roomId' => $_SESSION['roomId']
// 	));
// }


}
// $con = new Room();
$room_type = new room_type();

$room_type = new room_type();
$con = new room_type();
// >>>>>>> master
?>
