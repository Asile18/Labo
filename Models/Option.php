<?php 

require_once("Connection.php");
class Option extends Connection{
	public function getOption($optionId){
		$pdo = $this->dbConnection();
		$stmt = $pdo->prepare("SELECT * FROM option WHERE optionId=?");
        $stmt->execute([$optionId]); 
        return $option = $stmt->fetch();
	}

	// public function getOptions(){
	// 	$pdo = $this->dbConnection();
	// 	$request = "SELECT * FROM `option` ORDER BY optionId";
	// 	$objects = $pdo->query($request);
	// 	return  $objects->fetchAll(PDO::FETCH_ASSOC);
	// }

    public function addOption($optionId,$optionName,$optionPrice,$isPossible){
        $pdo = $this->dbConnection();
        $sql = "INSERT INTO option (optionId, optionName, optionPrice, isPossible) VALUES (?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$optionId, $optionName, $optionPrice, $isPossible]);
        return $stmt->rowCount();
    }

}


$option = new Option();
$con = new Option();

?>
