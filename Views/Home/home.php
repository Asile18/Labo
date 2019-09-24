<h1>Bienvenue à GestHostel</h1>
<form action="." method="get" id="roomSearchForm">
	<div>
		<input type="text" id="today" name="daterange" />
		<select name="adults" id="nbrAdult">
			<option value="" disabled selected>Nombre d'adultes</option>
			<?php
			$adults = $room->getAdults();

			for ($i = 1; $i <= $adults[0]['maxAdults']; $i++) {
				?>
				<option value="<?= $i ?>"><?= $i ?></option>
			<?php
			}

			?>
		</select>
		<select name="children" id="nbrChild">

			<option value="" disabled selected>Nombre d'enfants</option>
			<?php
			$children = $room->getChildren();

			for ($i = 1; $i <= $children[0]['maxChild']; $i++) {
				?>
				<option value="<?= $i ?>"><?= $i ?></option>
			<?php
			}

			?>
		</select>
		<select name="roomType" id="roomType">
			<option value="" disabled selected>Type de chambre</option>
			<?php
			$chambre = $room->getRoomTypes();
			for ($i = 0; $i < sizeof($chambre); $i++) {
				$chambreType = $chambre[$i]["roomTypeName"];
				?>
				<option value="<?= $chambre[$i]["roomTypeId"] ?>"><?= $chambreType ?></option>
			<?php
			}

			?>
		</select>
		<select name="cityHotel" id="cityHotel">
			<option value="" disabled selected>Pays</option>
			<?php
			$country = $room->getHostelsCountry();
			for ($i = 0; $i < sizeof($country); $i++) {
				$countryName = $country[$i]["add_country"];
				?>
				<option value="<?= $country[$i]["add_country"] ?>"><?= $countryName ?></option>
			<?php
			}

			?>
		</select>
		<input type="submit" value="Chercher une chambre" id="btnHotelRecherche">
		<input type="button" value="+ Recherches avancées" id="btnRechercheAvancee">
	</div>
	<div id="rechercheAvancee">
		<div id="avancedSearch">
			<table>
				<tr>
					<td><label for="wifi">Wifi</label>
						<input type="checkbox" name="wifi"></td>
					<td><label for="tv">Tv</label>
						<input type="checkbox" name="tv"></td>
					<td><label for="balcony">Balcony</label>
						<input type="checkbox" name="balcony"></td>
				</tr>
				<tr>
					<td><label for="miniBar">Mini-bar</label>
						<input type="checkbox" name="miniBar"></td>
					<td><label for="petsAllowed">Pets allowed</label>
						<input type="checkbox" name="petsAllowed"></td>
					<td><label for="airConditioning">Air conditioning</label>
						<input type="checkbox" name="airConditioning"></td>
				</tr>
				<tr>
					<td><label for="pool">pool</label>
						<input type="checkbox" name="pool"></td>
					<td><label for="valet">Valet</label>
						<input type="checkbox" name="valet"></td>
					<td><label for="roomService">Room service</label>
						<input type="checkbox" name="roomService"></td>
				</tr>
			</table>
		</div>
		<div id="blocStar">
			<div class="rate">

				<p>Nombre d'étoiles</p>
				<input type="radio" id="star5" name="rate" value="5" />
				<label for="star5" title="text"></label>
				<input type="radio" id="star4" name="rate" value="4" />
				<label for="star4" title="text"></label>
				<input type="radio" id="star3" name="rate" value="3" />
				<label for="star3" title="text"></label>
				<input type="radio" id="star2" name="rate" value="2" />
				<label for="star2" title="text"></label>
				<input type="radio" id="star1" name="rate" value="1" />
				<label for="star1" title="text"></label>

			</div>
		</div>

	</div>
</form>

<?php if (isset($noChambre)) { ?>
	<h2 class='confirmation'> Pas de chambre disponible pour ces conditions </h2>
<?php } ?>
<script>
	$(function() {
		$('input[name="daterange"]').daterangepicker({
			opens: 'left',
			locale: {
				format: 'DD-MM-YYYY'
			}
		});
	});
	var field = document.querySelector('#today');
	var date = new Date();

	// Set the date
	field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
		'-' + date.getDate().toString().padStart(2, 0);

	$('#btnRechercheAvancee').on('click', function() {
		if (($('#rechercheAvancee').css('display') == 'none')) {
			$('#rechercheAvancee').css('display', 'block');
		} else {
			$('#rechercheAvancee').css('display', 'none');
		}

	})
	$('#btnHotelRecherche').on('click', function() {
		if (($('#hotelRecherche').css('display') == 'none')) {
			$('#hotelRecherche').css('display', 'block');
		} else {
			$('#hotelRecherche').css('display', 'none');
		}

	})
</script>
<?php
// var_dump($roomArray);
// die;
// echo $roomsArray[0].$roomArray[0]["picturePath"];
// echo $roomsArray[1].$roomArray[0]["picturePath"];
// echo strtoupper($roomsArray[2].$roomArray[0]["roomName"]);
for ($i = 0; $i < count($roomsArray); $i++) {
	// for($y=0; $y< count($roomsArray[$i]); $y++)
	// {



	echo
		'<div class="roomSearch">
				<div class="roomImg">
					<img src=' . $roomsArray[$i]["picturePath"] . '>
				</div>
				<div class="roomInfo">
					<h4 class="capitalize">' . $roomsArray[$i]["hostelName"] . '</h4>
					<h3>' . $roomsArray[$i]["roomName"] . ' - ' . $roomsArray[$i]["roomType"] . '</h3>
					<h4>
						<span class="fas fa-euro-sign">' . $roomsArray[$i]["priceValue"] . ' - </span>
						<span class="fas fa-star" >' . $roomsArray[$i]["hostelStars"] . '</span>
					</h4>	
					<p>' . $roomsArray[$i]["descriptionShort"] . '</p>
					<button type="button" onclick= "showRoom(' . $roomsArray[$i]["roomId"] . ')" >See more</button>
				</div>
			</div>';
	// }      
}
?>
<script>
	function showRoom(id) {
		console.log(id);
		let link = window.location.href;
		console.log(link);

		let sourceUrl = link.split("?");
		// console.log(sourceUrl);
		let date;
		if (sourceUrl.length >= 2 && sourceUrl[1].includes("daterange")) {
			let urlArgs = sourceUrl[1].split("&");
			date = "&" + urlArgs[0];
		} else {
			date = "&daterange=" + $("[name='daterange']").val().replace(/ /gi, "+");
		}
		// console.log(date);

		let linkAdded = sourceUrl[0] + "?section=room&roomId=" + id + date;
		// let res = link.substring(0, link.search("section"));
		// window.location.href= linkAdded;
		window.location.replace(linkAdded);
		// console.log(linkAdded);
		// 
		//     res = res  ;
	}
</script>