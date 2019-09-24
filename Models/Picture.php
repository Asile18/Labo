<?php 

require_once("Connection.php");
class Picture extends Connection{
	public function getPicture($pictureId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM picture WHERE pictureId=?");
        $stmt->execute([$pictureId]); 
        return $option = $stmt->fetch();
	}

	// public function getOptions(){
	// $pdo = $this->dbConnection();
	// 	$stmt = $pdo -> prepare("SELECT * FROM option ORDER BY optionId");
	// 	$stmt->execute([]);
	// 	return $option = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// }

    public function addPicture($picturePath, $roomId){
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO picture (picturePath, roomId) VALUES (?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$picturePath, $roomId]);
        return $stmt->rowCount();
    }

}


$picture = new Picture();

?>
