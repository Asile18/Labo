<?php 
require_once("Connection.php");
class Room extends Connection{

	public function getAll(){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM room ORDER BY hostelId";
		$objects = $pdo->query($request);
		return $objects->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getChildren(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT max(childrenCapacity) as maxChild FROM room ");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getAdults(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT max(adultCapacity) as maxAdults FROM room ");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


	public function getRoom($roomId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM room WHERE roomId=?");
		$stmt->execute([$roomId]); 
		return $review = $stmt->fetch();
	}

	public function getHostelsCountry(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT * FROM hostel GROUP BY add_country");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getHostels(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT * FROM hostel ORDER BY hostelId");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getHostel($hostelId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM hostel WHERE hostelId=?");
		$stmt->execute([$hostelId]); 
		return $review = $stmt->fetch();
	}

	public function getRoomType($roomTypeId){
		$pdo = $this->dbConnection();
		$request = "SELECT * FROM room_type WHERE roomTypeId = ?";	
		$stmt = $pdo->prepare($request);
		$stmt->execute([$roomTypeId]);
		return $review = $stmt->fetch();
	}

	public function getRoomTypes(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT * FROM room_type ORDER BY roomTypeId");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOptions(){
		$pdo = $this->dbConnection();
		$stmt = $pdo -> prepare("SELECT * FROM `option` ORDER BY optionId");
		$stmt->execute([]);
		return $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addOne($roomName,$shortDescription,$longDescription,$childrenCapacity,$adultCapacity,$bathroomQuantity,$toiletQuantity,$balcony,$isDeleted,$roomTypeId,$hostelId){
		$pdo = $this->dbConnection();
		$request = "INSERT INTO room(roomName,shortDescription,longDescription,childrenCapacity,adultCapacity,bathroomQuantity,
		toiletQuantity,balcony,isDeleted,roomTypeId, hostelId) VALUES (:roomName,:shortDescription,:longDescription,:childrenCapacity,:adultCapacity,:bathroomQuantity,
		:toiletQuantity,:balcony,:isDeleted,:roomTypeId,:hostelId)";

		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'roomName'=> $roomName,
			'shortDescription'=>$shortDescription,
			'longDescription'=>$longDescription,
			'childrenCapacity'=>$childrenCapacity,
			'adultCapacity'=>$adultCapacity,
			'bathroomQuantity'=>$bathroomQuantity,
			'toiletQuantity'=>$toiletQuantity,
			'balcony'=>$balcony,
			'isDeleted'=>$isDeleted,
			'roomTypeId'=>$roomTypeId,
			'hostelId' => $hostelId
		));
	}

	public function updateOne($roomName,$shortDescription,$longDescription,$childrenCapacity,$adultCapacity,$bathroomQuantity,$toiletQuantity,$balcony,$isDeleted){
		$pdo = $this->dbConnection();
		$request = "UPDATE room SET roomName = :roomName,  shortDescription = :shortDescription, childrenCapacity= :childrenCapacity, adultCapacity= :adultCapacity,bathroomQuantity =:bathroomQuantity , toiletQuantity= :toiletQuantity, balcony= :balcony, isDeleted = :isDeleted";

		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'roomName'=> $roomName,
			'shortDescription'=>$shortDescription,
			'longDescription'=>$longDescription,
			'childrenCapacity'=>$childrenCapacity,
			'adultCapacity'=>$adultCapacity,
			'bathroomQuantity'=>$bathroomQuantity,
			'toiletQuantity'=>$toiletQuantity,
			'balcony'=>$balcony,
			'isDeleted'=>$isDeleted,
		));
	}

	public function deleteOne($isDeleted){
		$pdo = $this->dbConnection();
		//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE room SET isDeleted = true WHERE roomId = :roomId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'roomId' => $_SESSION['roomId']
		));
	}


    public function get($roomId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM ROOM WHERE roomId=?");
        $stmt->execute([$roomId]); 
        return $room = $stmt->fetch();
    }

    public function getPicture($roomId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM PICTURE WHERE roomId=?");
        $stmt->execute([$roomId]); 
        $pic = $stmt->fetch();
        return $pic["picturePath"];
    }

    public function getType($roomTypeId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM ROOM_TYPE WHERE roomTypeId=?");
        $stmt->execute([$roomTypeId]); 
        return $type = $stmt->fetch();
    }

    public function getPrice($roomTypeId, $seasonId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM PRICE WHERE roomTypeId=? AND seasonId=?");
        $stmt->execute([$roomTypeId,$seasonId]); 
        $price = $stmt->fetch();
        return $price["value"];
    }

    public function getSeasons(){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM SEASON");
        $stmt->execute(); 
        return $season = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

 	public function searchRoom($search){
		if(isset($search["daterange"])){
			$daterange = $search["daterange"];
			// var_dump($daterange);
			$daterange = explode(" ", $daterange);
			$daterange[0] = explode("-", $daterange[0]);
			$daterange[2] = explode("-", $daterange[2]);
	
			$dateDebut= $daterange[0][2] . "-" . $daterange[0][1] . "-" . $daterange[0][0];
			$dateFin = $daterange[2][2] . "-" . $daterange[2][1] . "-" . $daterange[2][0];
		}
		else{
			$dateDebut = date("d-m-Y");
			$dateFin = date("d-m-Y", strtotime("+1 day"));
		}
	
		$query = "SELECT * FROM ROOM AS ro JOIN HOSTEL AS h ON ro.hostelId = h.hostelId WHERE ro.roomId not in(SELECT re.roomId FROM `reservation` AS re WHERE re.startDate <= $dateDebut AND re.endDate >= $dateDebut OR re.startDate <= $dateFin AND re.endDate >= $dateFin)";
		//  
		//  pour avoir une liste des id des rooms déjà réservées pour la daterange 
		//  (SELECT roomId FROM `reservation` WHERE startDate <= 'dateDebut' AND endDate >= 'dateDebut' OR startDate <= 'dateFin' AND endDate >= 'dateFin');
	
		if(isset($search["adults"])){
			$query .= " AND ro.adultCapacity >= " . $search["adults"];
		}
		if(isset($search["children"])){
			$query .= " AND ro.childrenCapacity= " . $search["children"];
		}
		if(isset($search["roomType"])){
			$query .= " AND ro.roomTypeId= " . $search["roomType"];
		}
		if(isset($search["cityHotel"])){
			$query .= ' AND h.add_country = "' . $search['cityHotel'] . '"';
		}
		if(isset($search["wifi"])){
			$query .= " AND ro.roomTypeId in (SELECT e.roomTypeId FROM `existanceoptionroomtype` AS e JOIN `option` AS o ON e.optionId = o.optionId WHERE o.optionName = 'WIFI')";
		}
		if(isset($search["tv"])){
			$query .= " AND ro.roomTypeId in (SELECT e.roomTypeId FROM `existanceoptionroomtype` AS e JOIN `option` AS o ON e.optionId = o.optionId WHERE o.optionName = 'TV')";
		}
		if(isset($search["balcony"])){
			$query .= " AND ro.balcony=1";
		}
		if(isset($search["miniBar"])){
			$query .= " AND ro.roomTypeId in (SELECT e.roomTypeId FROM `existanceoptionroomtype` AS e JOIN `option` AS o ON e.optionId = o.optionId WHERE o.optionName = 'miniBar')";
		}
		if(isset($search["petsAllowed"])){
			$query .= " AND ro.roomTypeId in (SELECT e.roomTypeId FROM `existanceoptionroomtype` AS e JOIN `option` AS o ON e.optionId = o.optionId WHERE o.optionName = 'petsAllowed')";
		}
		if(isset($search["airConditioning"])){
			$query .= " AND ro.roomTypeId in (SELECT e.roomTypeId FROM `existanceoptionroomtype` AS e JOIN `option` AS o ON e.optionId = o.optionId WHERE o.optionName = 'airConditionner')";
		}
		if(isset($search["pool"])){
			$query .= " AND h.pool=1";
		}
		if(isset($search["valet"])){
			$query .= " AND h.valet=1";
		}
		if(isset($search["roomService"])){
			$query .= " AND h.roomService=1";
		}
		if(isset($search["rate"])){
			$query .= " AND h.hostelStars>=" . $search["rate"];
		}
		// var_dump($query);
		if(isset($search["search"])){
			$query .= " LIMIT 5 ";
		}
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare($query);
    $stmt->execute(); 
    return $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
 	}
	public function getSeasonId($month){
		switch ($month) {
			case "November":
			return $seasonId=  1;
			break;

			case "December":
			return $seasonId=  1;
			break;

			case "January":
				return $seasonId=  1;
				break;

			case "February":
			return $seasonId=  2;
			break;

			case "March":
			return $seasonId=  2;
			break;			
			
			case "April":
				return $seasonId=  2;
				break;

			case "May":
				return $seasonId=  3;
				break;
			case "June":
				return $seasonId=  3;
				break;
			case "July":
				return $seasonId=  3;
				break;
			case "August":			
				return $seasonId=  3;
				break;
			case "September":
				return $seasonId=  3;
				break;
			default: 
        		break;
		}
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM SEASON");
        $stmt->execute(); 
        return $season = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReview($roomId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM REVIEW WHERE roomId=?");
        $stmt->execute([$roomId]); 
        return $hostel = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserReservation($userId,$roomId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM RESERVATION WHERE userId=? AND roomId=?");
        $stmt->execute([$userId,$roomId]); 
        return $hostel = $stmt->fetch();
    }
    // public function getPrice($roomTypeId){
    //     $pdo = $this->dbConnection();
	// 	$stmt = $pdo->prepare("SELECT * FROM PRICE WHERE roomTypeId=?");
    //     $stmt->execute([$roomTypeId]); 
    //     return $price = $stmt->fetch();
    // }
 		


    public function insertReview($reviewStars,$comment,$isApproved,$userId,$roomId){
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO REVIEW (reviewStars, comment, isApproved, userId, roomId) VALUES (?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$reviewStars, $comment, $isApproved, $userId, $roomId]);
        return $stmt->rowCount();
    }

    public function getOptionPrice($optionId){
 		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM `option` WHERE optionId=?");
		$stmt->execute([$optionId]);
		$obj = $stmt->fetch();
        return $obj["optionPrice"];
 	}

    public function getOption($roomTypeId,$optionId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM existanceoptionroomtype WHERE roomTypeId=? AND optionId=?");
        $stmt->execute([$roomTypeId,$optionId]); 
        $obj = $stmt->fetch();
        return $obj;
	}

    public function addPicture($picturePath, $roomId){
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO picture (picturePath, roomId) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$picturePath, $roomId]);
        return $stmt->rowCount();
    }


    public function getLastInsertId(){
		$pdo = $this->dbConnection();
		$request = "SELECT * from room ORDER BY roomId DESC LIMIT 1 ";
		$objects = $pdo->query($request);
		return $objects->fetch();
	}

    public function getUserReview($userId,$roomId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM REVIEW WHERE userId=? AND roomId=?");
        $stmt->execute([$userId,$roomId]); 
        return $hostel = $stmt->fetch();
    }

    public function undeleteOne($isDeleted){
		$pdo = $this->dbConnection();
		//$request = "DELETE FROM hostel WHERE id = :id";
		$request = "UPDATE room SET isDeleted = 0 WHERE roomId = :roomId";/*cmt vas ton recuperer la variable*/
		$objects = $pdo->prepare($request);
		$objects->execute(array(
			'roomId' => $_SESSION['roomId']
		));
	}
}
$room = new Room();
$con = new Room();
?>
