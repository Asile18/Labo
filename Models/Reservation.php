<?php
require_once("Connection.php");
class Reservation extends Connection{

	public function getAll(){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM reservation ORDER BY reservationId DESC";
		$objects = $pdo->query($request);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOne($reservationId){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM reservation WHERE reservationId = :reservationId";
		
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'reservationId' => $reservationId
		));
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getReservation($reservationId){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM reservation WHERE reservationId = :reservationId";
		
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'reservationId' => $reservationId
		));
		return $objects->fetch();
	}


	public function addOne($startDate,$endDate,$insurance,$isCancelled,$childrenQuantity,$adultQuantity,$totalPrice,$roomId,$userId){
		$pdo = $this->dbConnection();
		$request = "INSERT INTO reservation (startDate,endDate,insurance,isCancelled,childrenQuantity,adultQuantity,totalPrice,roomId,userId) VALUES (:startDate,:endDate,:insurance,:isCancelled,:childrenQuantity,:adultQuantity,
		:totalPrice,:roomId,:userId)";

		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'startDate'=> $startDate,
			'endDate'=>$endDate,
			'insurance'=>$insurance,
			'isCancelled'=>$isCancelled,
			'childrenQuantity'=>$childrenQuantity,
			'adultQuantity'=>$adultQuantity,
			'totalPrice'=>$totalPrice,
			'roomId'=>$roomId,
			'userId'=>$userId,
		));
	}


	public function updateOne($startDate,$endDate,$insurance,$isCancelled,$childrenQuantity,$adultQuantity,$totalPrice,$reservationId,$userId){
		$pdo = $this->dbConnection();
		$request = "UPDATE reservation SET startDate = :startDate,  endDate = :endDate, insurance= :insurance, isCancelled= :isCancelled,childrenQuantity =:childrenQuantity , adultQuantity= :adultQuantity, totalPrice= :totalPrice, reservationId = :reservationId, userId=:userId";

		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'startDate'=> $startDate,
			'endDate'=>$endDate,
			'insurance'=>$insurance,
			'isCancelled'=>$isCancelled,
			'childrenQuantity'=>$childrenQuantity,
			'adultQuantity'=>$adultQuantity,
			'totalPrice'=>$totalPrice,
			'reservationId'=>$reservationId,
			'userId'=>$userId,
		));
	}

	public function deleteOne(){
		$pdo = $this->dbConnection();
			//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE reservation SET isCancelled = 1 WHERE reservationId = :reservationId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'reservationId' => $_SESSION['reservationId']
		));
	}

	public function undeleteOne(){
		$pdo = $this->dbConnection();
			//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE reservation SET isCancelled = 0 WHERE reservationId = :reservationId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'reservationId' => $_SESSION['reservationId']
		));
	}

	public function getByIdUser($idUser){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare('SELECT * FROM reservation LEFT JOIN user ON reservation.userId = user.userId  WHERE reservation.userId=?');
		$stmt->execute([$idUser]); 
		return $reservation = $stmt->fetch();
		
	}
	public function getRoom($roomId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM room WHERE roomId=?");
		$stmt->execute([$roomId]); 
		return $review = $stmt->fetch();
	}

	public function getRooms(){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM room";
		$objects = $pdo->query($request);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getHostelById($roomId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM room WHERE roomId=?");
		$stmt->execute([$roomId]); 
		return $review = $stmt->fetch();
	}

	public function getHostel($hostelId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM hostel WHERE hostelId=?");
		$stmt->execute([$hostelId]); 
		return $review = $stmt->fetch();
	}
		public function getHostels(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT * FROM hostel ORDER BY hostelId");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

$reservation = new reservation();
$con = new reservation();
