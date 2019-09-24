<?php 
require_once('Models/Forum.php');

$forums = $forum->getAll();

$result = "<div class='forum'><ul>";

for ($i=0; $i < count($forums); $i++) {
	$result .= "<li>"; 
	$result .= "<a id='couleur' href='?section=subject&forumId=". $forums[$i]["forumId"] ."'>" . $forums[$i]["forumName"] . "</a>";
	$result .= "</li>";
}

$result .= "</ul></div>";



echo $result;



require_once ("Views/Forum/forum.php");




 ?>