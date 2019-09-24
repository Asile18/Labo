<?php 
require_once("Models/User.php");

try
{
	$table = "<table class='tableAdmin'>";
	$table .= "<tr><th></th><th>Nom</th><th>Prénom</th><th>Email</th>
	<th colspan='3'></th></tr>";
	$users = $user->getAll();
	foreach ($users as $user) {
		// $table .=  '<tr><td  class="tdTableAdmin"><a class="btn-update" href="index.php?section=update&user=' . $user["userId"].'">&#9998;</a></td>';
		$table .= '<td class="tdTableAdmin">' . $user['userId'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $user['firstName'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $user['lastName'] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$user["email"] . '</td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-view" href="index.php?section=userselectone&user=' . $user["userId"].'"><button>&#128065;</button></a></td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-update" href="index.php?section=updateuser&user=' . $user["userId"].'"><button>&#x270E</button></a></td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=deleteuser&user=' . $user["userId"].'"><button>&#10007;</button></a></td>';
		$table .=  '</tr>';
	 }

	
	$table.="</table>";

	



	require_once("Views/Admin/ClientsViews/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}


?>