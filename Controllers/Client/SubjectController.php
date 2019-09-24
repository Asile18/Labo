<?php 
require_once('Models/Forum.php');
require_once('Models/User.php');

$subjects = $forum->getSubject($_GET["forumId"]);
echo '<div>';
for ($i=0; $i < count($subjects); $i++) {
	$userObj = $user->getById($subjects[$i]["userId"]);
	echo "<br>"; 
	echo "<br><a class='h1' href='?section=forum" ."'>Retour</a>";
	echo "<a style='color:aliceblue;' href='?section=messages&subjectId=". $subjects[$i]["subjectId"] ."&forumId=". $_GET["forumId"] ."'><div class='msg";
	if($i %2 == 0){
		echo " bgc-even";
	}
	else{
		echo " bgc-odd";
	}
	echo "'><p class='msg'>". $subjects[$i]["subjectTitle"] . "</q></p>";
	echo "<p class='msg'>". $userObj["firstName"] . " " . $userObj["lastName"] . " " . $subjects[$i]["postDate"] . "</p></div></a>";
}
echo "</div>";


 ?>