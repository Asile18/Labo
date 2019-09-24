<?php 
require_once('Models/User.php');
try{
	
	if(isset($_POST["modifUser"])){
		$update= $user->updateNoPassword($_SESSION["login"],$_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["pays"], $_POST["phone"]);
	}

	if (isset($_POST["modifMDP"])) {
		$update = $user->updatePassword($_SESSION["login"],$_POST["password"]);
	}

	$userProfile = $user->getById($_SESSION["login"]);

	$firstNameUserProfile = $userProfile['firstName'];
	$lastNameUserProfile = $userProfile['lastName'];
	$emailUserProfile = $userProfile['email'];
	$countryUserProfile = $userProfile['country'];
	$phoneUserProfile = $userProfile['phone'];
	$passwordUserProfile = $userProfile['password'];

	$affichageUserProfile = "<tr><td>".$firstNameUserProfile."</td><td>".$lastNameUserProfile."</td><td>".$emailUserProfile."</td><td>".$countryUserProfile."</td><td>".$phoneUserProfile."</td></tr>";
}

catch(PDOException $e)
{
	echo $e->getMessage();

}
 require_once("Views/UserProfile/userProfile.php");
?>