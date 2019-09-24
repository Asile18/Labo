

<?php 
require_once("Models/Hostel.php");

try
{

	$table = "<table class='tableAdmin'>";
	$table .= "<tr style='background-color:skyblue;color:salmon;'><th>id</th><th>Nom de l'hotel</th><th>Etoiles</th><th>Rue</th><th>Numéro</th><th>Code Postal</th><th>Pays</th><th colspan=3>Actions</th></tr>";
	$hostels = $con->getAll();
	foreach ($hostels as $hostel) {
		if($hostel['isDeleted']==1){
			$table .= '<tr style="background-color:crimson;" id="hostelLine"><td class="tdTableAdmin">' . $hostel['hostelId'] . '</td>';
		}
		else{
			$table .= '<tr  id="hostelLine"><td class="tdTableAdmin">' . $hostel['hostelId'] . '</td>';
		}

		$table .= '<td class="tdTableAdmin">' . $hostel['hostelName'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $hostel['hostelStars'] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["add_streetName"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["add_number"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["add_postCode"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$hostel["add_country"] . '</td>';

		$table .= '<td class="tdTableAdmin"><a class="btn-view" href="index.php?section=hostelsselectone&hostel=' . $hostel["hostelId"].'"><button>&#128065;</button></a></td>';


		$table .= '<td class="tdTableAdmin"><a class="btn-update" href="index.php?section=updatehostel&hostel=' . $hostel["hostelId"].'"><button>&#x270E</button></a></td>';


		if($hostel['isDeleted']==1){
			$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=undeletehostel&hostel=' . $hostel["hostelId"].'"><button>&#x2713;</button></a></td></tr>';

		}
		else{
			$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=deletehostel&hostel=' . $hostel["hostelId"].'"><button>&#10007;</button></a></td></tr>';
		}
	}
	$table.="</table>";

	require_once("Views/Admin/HostelsViews/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}		


?>