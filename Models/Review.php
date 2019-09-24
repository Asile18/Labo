<?php 
require_once('Connection.php');
class Review extends Connection{
	public function getAll (){
		$pdo = $this->dbConnection();
		$request = 'SELECT * FROM review ORDER BY roomId';
		$object = $pdo->query($request);
		return $object->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoom($roomId){
        $pdo = $this->dbConnection();
        $stmt = $pdo->prepare("SELECT * FROM ROOM WHERE roomId=?");
        $stmt->execute([$roomId]); 
        return $review = $stmt->fetch();
    }

    public function getOne ($reviewId){
        
       
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM review WHERE reviewId=?");
        $stmt->execute([$email,$password]); 
        return $review = $stmt->fetch();
    }
    
    public function addOne ($reviewStars,$comment,$isApproved,$userId,$roomId){
      
       
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO review (reviewStars,comment,isApproved,userId,roomId) VALUES (?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$reviewStars,$comment,$isApproved,$userId,$roomId]);
        return $stmt->rowCount();
    }

    public function updateOne ($reviewStars,$comment,$isApproved,$userId,$roomId){
       
       
        $sql = "UPDATE review SET reviewStars=?,comment=?,isApproved=?,userId=?,roomId=? WHERE reviewId=?";
        $stmt= $dpo->prepare($sql);
        $stmt->execute([$name, $surname, $sex, $id]);
        return $stmt->rowCount();
    }

    public function deleteOne($reviewId){
        $pdo = $this->dbConnection();
        $sql = 'DELETE FROM review WHERE reviewId = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$reviewId]);
        return $stmt->rowCount();
    }

public function approveOne($reviewId){
    $pdo = $this->dbConnection();
    $sql = "UPDATE review SET isApproved = 1 WHERE reviewId = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$reviewId]);
    return $stmt->rowCount();
}

public function disapproveOne($reviewId){
        $pdo = $this->dbConnection();
    $sql = "UPDATE review SET isApproved = 0 WHERE reviewId = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$reviewId]);
    return $stmt->rowCount();
}


 }
 $review = new Review();
 $con = new Review();
?>