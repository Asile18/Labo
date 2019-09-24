<?php 
require_once("../../Models/Hostel.php");

try
{
	$table = "<table class='tableAdmin'>";
	$table .= "<tr><th></th><th>id</th><th>Nom de l'hotel</th><th>Autre</th><th></th></tr>";
	$hostels = $con->getAll();
	foreach ($hostels as $hostel) {
		$table .=  '<tr><td class="tdTableAdmin"><a class="btn-update" href="index.php?section=update&hostel=' . $hostel["hostelId"].'">&#9998;</a></td>';
		$table .= '<td class="tdTableAdmin">' . $hostel['hostelId'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $hostel['hostelName'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $hostel['hostelStars'] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["postcode"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["streetName"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["number"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["country"] . '</td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=delete&hostel=' . $hostel["hostelId"].'">&#128465;</a></td></tr>';
	}
	$table.="</table>";

	require_once("Views/Admin/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}


?>