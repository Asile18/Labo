<h1>Modifier la chambre</h1>
	<form action="" method="post">
<?php var_dump($_POST) ?>
		<div >
			<label for="">Titre du bien:</label>
			<input type="text" name="roomName" value="<?= $room["roomName"] ?>" id="">	
		</div>

		<div>
			<label for="">Description courte:</label>
			<input type="text" name="shortDescription" value="<?= $room["shortDescription"] ?>" id="">			
		</div>

		<div >
			<label for="">Description:</label>
			<input type="text" name="longDescription" value="<?= $room["longDescription"] ?>" id="">			
		</div>

		<div >
			<label for="">Nombre de salle de bain:</label>
			<input type="text" name="bathroomQuantity" value="<?= $room["bathroomQuantity"] ?>" id="">	
		</div>	

		<div >	
			<label for="">Hôtel:</label>
			<select name="hotelSelect"  id="">
				<!-- accéder aux elements à partir de la bd et les crée dynamiquement dans la view $hotels-->
				
						<?= $hostelResult ?>
				
			</select>
		</div>
		<div >
			<label for="">Capacité enfants:</label>
			<input type="number" name="children" value="<?= $room["childrenCapacity"] ?>" id="">				
		</div>
		<div >
			<label for="">Capacité adultes:</label>
			<input type="number" name="adults" value="<?= $room["adultCapacity"] ?>" id="">				
		</div>
		<div >	
			<label for="">Type de Chambre:</label>
			<select name="roomType" value="<?= $room["roomType"] ?>" id="">
				<!-- accéder aux elements à partir de la bd et les crée dynamiquement dans la view $hotels-->
				
						<?= $roomResult ?>
				
			</select>
		</div>

		<div>
			<label for="">Nombre de toilette:</label>
			<input type="text" name="toiletQuantity" value="<?= $room["toiletQuantity"] ?>" id="">		
		</div>

		<div >
			<label for="">Balcon :</label>
			<input type="number" name="balcony" value="<?= $room["balcony"] ?>" id="">				
		</div>
		
		</div>	
				
	
	
		<div >

			<div >
				<h4>Options :</h4>
				<div class="FormHostelOptionsRadio">
			<?= $optionResult ?>
				</div>	
			</div>

	

	</div>	

</div>		
<input type="submit" value="Enregistrer" >
</form>