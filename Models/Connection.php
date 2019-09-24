<?php 
class Connection{
	protected function dbConnection(){
		// connexion avec la base de données avec PDO
		$db = "mysql:host=localhost;dbname=gesthostel;charset=utf8";
		$user = "root";
		$pwd = "";
		
		try
		{
			$pdo = new PDO($db, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $pdo;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
 }
?>