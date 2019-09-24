
<div id="contact">
<table id="affichageTableHostels">	
	<tr>	
		<th>Hotel</th>
		<th>Nombre d'étoiles</th>
		<th>Pays</th>
		<th>Adresse</th>			
	</tr>
	
		<?= $affichageTableHostel; ?>
		
</table>

<div id="mapid"></div>
</div>
<script>
var bounds = new L.LatLngBounds(new L.LatLng(-100, -190), new L.LatLng(100, 190));

var mymap = L.map('mapid',{center: bounds.getCenter(),zoom: 1.5,worldCopyJump: false,maxBounds: bounds,
  maxBoundsViscosity: 0.75});


L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	id: 'mapbox.streets'
	
}).addTo(mymap);






</script>
<?= $script ?>