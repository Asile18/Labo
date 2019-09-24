<?php 
require_once('Models/Forum.php');
require_once('Models/User.php');

$messages = $forum->getMessages($_GET["subjectId"]);
$subject = $forum->getSub($_GET["subjectId"]);

echo "<br><a class='h1' href='?section=subject&forumId=". $_GET["forumId"] ."'>Retour</a>";
echo "<h2 class='box'>" . $subject[0]["subjectTitle"] . "</h2>";
echo "<div class='contentForum'><p>" . $subject[0]["subjectContent"] . "</p></div>";
echo '<div class="msgs">';
for ($i=0; $i < count($messages); $i++) {
	$userObj = $user->getById($messages[$i]["userId"]);
	echo "<br>"; 
	echo "<div class='msg";
	if($i %2 == 0){
		echo " bgc-even";
	}
	else{
		echo " bgc-odd";
	}
	echo "'><p><q>". $messages[$i]["messageContent"] . "</q></p>";
	echo "<p class='msg'>". $userObj["firstName"] . " " . $userObj["lastName"] . " " . $messages[$i]["postDate"] . " </p></div>";
}
echo "</div>";
if(isset($_SESSION["login"])){
	$userId = $_SESSION["login"];
	if (isset($_POST["msg"])) {
		$nb = $forum->insert($_POST["msg"],$userId,$_GET["subjectId"]);
		header("Refresh:0");

	}
	require_once("Views/Forum/messages.php");


	require_once ("Views/Forum/forum.php");



}


 ?>