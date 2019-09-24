<?php 
require_once("Models/Room.php");


try
{
	$table = "<table class='tableAdmin'>";
	$table .= "<tr style='background-color:skyblue;color:salmon;'><th>id</th><th>Nom de la chambre</th><th>Description</th><th>Type de chambre</th><th>Hôtel</th><th colspan=3>Actions</th></tr>";
	$rooms = $con->getAll();
	foreach ($rooms as $room) {
		if($room['isDeleted']==1){
			
			$table .= '<tr style="background-color:crimson;" id="roomLine"><td class="tdTableAdmin">' . $room['roomId'] . '</td>';

		}
		else{
			$table .= '<tr id="roomLine"><td class="tdTableAdmin">' . $room['roomId'] . '</td>';
		}

			//$table .= '<tr id="roomLine"><td>' . $room['roomId'] . '</td>';
		$table .= '<td class="tdTableAdmin">' . $room['roomName'] . '</td>';
		$table .= '<td class="tdTableAdmin" id="selectAllDescriptionArea">' . $room['shortDescription'] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$con->getRoomType($room['roomTypeId'])["roomTypeName"] . '</td>';
		$table .= '<td class="tdTableAdmin">' .$con->getHostel($room['hostelId'])["hostelName"] . '</td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-view" href="index.php?section=room&roomId=' . $room["roomId"].'"><button>&#128065;</button></a></td>';
		$table .= '<td class="tdTableAdmin"><a class="btn-update" href="index.php?section=updateroom&room=' . $room["roomId"].'"><button>&#x270E</button></a></td>';

		if($room['isDeleted']==1){
			$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=undeleteroom&room=' . $room["roomId"].'"><button> 	&#x2713;</button></a></td></tr>';

		}

		else{
			$table .= '<td class="tdTableAdmin"><a class="btn-delete" href="index.php?section=deleteroom&room=' . $room["roomId"].'"><button>&#10007;</button></a></td></tr>';
		}
	}

	$table.="</table>";

	require_once("Views/Admin/RoomsViews/selectAll.php");

}
catch(PDOException $e)
{
	echo $e->getMessage();
}


?>