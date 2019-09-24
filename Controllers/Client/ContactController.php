<?php 
	require_once("Models/Hostel.php");
try {
	$hots = $hostel->getAll();
	$script = '<script>';
	$affichageTableHostel = "";
	$i = 0;
	foreach ($hots as $hot) {
		if($hot['isDeleted']==0){
			$hostelId = $hot['hostelId'];
			$starsData = $hot['hostelStars'];
			$stars = "";
			for ($i=0; $i < $starsData ; $i++) { 
				 $stars .= "★";
				 
			}
			$markerNameLink = "<a href=index.php?section=hostel&idHostel=" . $hostelId . ">".$hot['hostelName']. "</a>";
			$script .= "var marker$i = L.marker([".$hot['coo_lat'].", ".$hot['coo_long']."],).addTo(mymap).bindPopup('<b>$markerNameLink</b><br><span class=contactStar>$stars</span>')
			.openPopup();" ;
			
	$affichageTableHostel .=  '<tr><td>' . $hot['hostelName'] .'</td><td class="contactStar">'. $stars .   '</td><td>' .$hot['add_country'] .'</td><td>'.$hot['add_streetName'].' '.$hot['add_number'].', '.$hot['add_postCode'].'</td></tr>';
		};
		$i++;
		$stars = null;
	}
	$script .= '</script>';
	
} catch (PDOException $e) {
	echo $e->getMessage();
}
 require_once("Views/Contact/contact.php");
?>
