<?php 
require_once("Connection.php");
class Hostel extends Connection{

	public function getAll(){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM hostel ORDER BY hostelId";
		$objects = $pdo->query($request);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}


	public function get($id){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM HOSTEL WHERE hostelId=?");
        $stmt->execute([$id]); 
        return $hostel = $stmt->fetch();
    }

	public function getOne($hostelId){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM hostel WHERE hostelId = :$hostelId";
		
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'hostelId' => $hostelId
		));
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}


	// public function updateHostel($hostelName,$hostelStars,$postCode,$number,$streetName,$country,$lat,$long,$phone,$email,$pool,$valet,$roomService,$touristTaxes,$isDeleted,$forumId){
	// 	$pdo = $this->dbConnection();
	// 	$request = "UPDATE hostel SET hostelName = :hostelName,  hostelStars = :hostelStars, add_postCode= :add_postCode, add_number= :add_number,add_streetName =:add_streetName , add_country= :add_country, coo_lat= :coo_lat,coo_long = :coo_long, phone= :phone, email= :email, pool= :pool, valet= :valet, roomService= :roomService, touristTaxes= :touristTaxes, isDeleted = :isDeleted, $forumId = :forumId
	// 	WHERE hostelId = :hostelId";

	// 	$objects = $pdo->prepare($request);
	// 	$objects->execute(array(
	// 		'hostelName'=> $hostelName,
	// 		'hostelStars'=>$hostelStars,
	// 		'add_postCode'=>$postCode,
	// 		'add_number'=>$number,
	// 		'add_streetName'=>$streetName,
	// 		'add_country'=>$country,
	// 		'coo_lat'=>$lat,
	// 		'coo_long'=>$long,
	// 		'phone'=>$phone,
	// 		'email'=>$email,
	// 		'pool'=>$pool,
	// 		'valet'=>$valet,
	// 		'roomService'=>$roomService,
	// 		'touristTaxes'=>$touristTaxes,
	// 		'isDeleted'=>$isDeleted,
	// 		'forumId'=> $forumId
	// 	));
	// }

	public function updateOne($hostelId, $hostelName,$hostelStars,$postCode,$number,$streetName,$country,$lat,$long,$phone,$email,$pool,$valet,$roomService,$touristTaxes,$isDeleted,$forumId){
	    $pdo = $this->dbConnection();
	    $sql = "UPDATE hostel SET hostelName = ?,hostelStars = ?,add_postCode = ?,add_number = ?,add_streetName = ?,add_country =?,coo_lat= ?,coo_long= ?,phone=?,email=?,pool=?,valet=?,roomService=?,touristTaxes=?,isDeleted=?,forumId=? WHERE hostelId = ?";
	    $stmt = $pdo->prepare($sql);
	    $stmt->execute([$hostelName,$hostelStars,$postCode,$number,$streetName,$country,$lat,$long,$phone,$email,$pool,$valet,$roomService,$touristTaxes,$isDeleted,$forumId,$hostelId]);
	    return $stmt->rowCount();
	}

	public function deleteOne($isDeleted){
		$pdo = $this->dbConnection();
		//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE hostel SET isDeleted = 1 WHERE hostelId = :hostelId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'hostelId' => $_SESSION['hostelId']
		));
	}


	public function undeleteOne($isDeleted){
		$pdo = $this->dbConnection();
		//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE hostel SET isDeleted = 0 WHERE hostelId = :hostelId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'hostelId' => $_SESSION['hostelId']
		));
	}



}
$hostel = new Hostel();
$con = new Hostel();
?>
