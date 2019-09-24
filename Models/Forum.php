<?php 
require_once('Connection.php');
class Forum extends Connection{
	public function getAll (){
		$pdo = $this->dbConnection();
		$request = 'SELECT * FROM FORUM';
		$object = $pdo->query($request);
		return $object->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubject($forumId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM SUBJECT WHERE forumId=?");
        $stmt->execute([$forumId]); 
        return $room = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMessages($subjectId){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM MESSAGE WHERE subjectId=?");
        $stmt->execute([$subjectId]); 
        return $room = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSub($subjectId){
    	$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM SUBJECT WHERE subjectId=?");
        $stmt->execute([$subjectId]); 
        return $room = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getsubjectcontent($subjectcontent){
        $pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM SUBJECT WHERE subjectcontent=?");
        $stmt->execute([$subjectcontent]); 
        return $room = $stmt->fetchAll(PDO::FETCH_ASSOC);	
 	}

 	 public function insert ($messageContent,$userId,$subjectId){
        //encrypt le password
        $date = date("Y-m-d H:i:s");
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO message (messageContent,isActive,postDate,userId,subjectId) VALUES (?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$messageContent,1,$date,$userId,$subjectId]);
        return $stmt->rowCount();
    }
}
 $forum = new Forum();
 $con = new Forum();
?>