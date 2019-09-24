<?php 
require_once('Connection.php');
class User extends Connection{
	public function getAll (){
		$pdo = $this->dbConnection();
		$request = 'SELECT * FROM USER';
		$object = $pdo->query($request);
		return $object->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get ($email,$password){
        //encrypt le password
        $password = md5($password);
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM USER WHERE email=? AND password=?");
        $stmt->execute([$email,$password]); 
        return $user = $stmt->fetch();
    }

    public function getById ($id){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM USER WHERE userId=?");
        $stmt->execute([$id]); 
        return $user = $stmt->fetch();
    }

    public function getByEmail ($email){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM USER WHERE email=?");
        $stmt->execute([$email]); 
        return $user = $stmt->fetch();
    }
    
    public function insert ($firstName,$lastName,$email,$country,$phone,$password){
        //encrypt le password
        $password = md5($password);
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO USER (firstName, lastName, email, country, phone, password, roleId) VALUES (?,?,?,?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$firstName, $lastName, $email, $country, $phone, $password, 1]);
        return $stmt->rowCount();
    }

    public function updateNoPassword ($userId,$firstName,$lastName,$email,$country,$phone){
        $pdo = $this->dbConnection();
        $sql = "UPDATE USER SET firstName=?, lastName=?, email=?, country=?, phone=? WHERE userId=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$firstName,$lastName,$email,$country,$phone,$userId]);
        return $stmt->rowCount();
    }
    public function updatePassword ($userId,$password){
        //encrypt le password
        $password = md5($password);
        $pdo = $this->dbConnection();
        $sql = "UPDATE USER SET password=? WHERE userId=?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$password,$userId]);
        return $stmt->rowCount(); 
    }

    public function delete($userId){
        $pdo = $this->dbConnection();
        $sql = 'DELETE FROM USER WHERE userId = :userId';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->rowCount();
    }
 }
 $user = new User();
?>