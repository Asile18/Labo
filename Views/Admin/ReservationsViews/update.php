	<h1>Modifier la réservation</h1>
	<form action="#" method="post">

		<div class="FormHostelName FormHostelGroups">
			<label for="">Date de début:</label>
			<input type="text" name="startDate" value="<?= $reservation["startDate"]?>">	
		</div>

		<div class="FormHostelName FormHostelGroups">
			<label for="">Date de fin:</label>
			<input type="text" name="endDate" value="<?= $reservation["endDate"]?>">		
		</div>


		<div class="FormHostelStars FormHostelGroups">
			<label for="">Assurance ?</label>
			<div>

				<label>
					<input type="radio" name="insurance" value="0" <?php if($reservation["insurance"] == 0){ echo "checked";} ?> />
					<span class="icon">Oui</span>
				</label>
				<label>
					<input type="radio" name="insurance" value="1" <?php if($reservation["insurance"] == 1){ echo "checked";} ?> />
					<span class="icon">Non</span>
					
				</label>
				
				
			</div>	
		</div>

		<div class="FormHostelAdress FormHostelGroups">
			<h3>Adresse :</h3>

			<div class="FormHostelAdressStreet">
				<label for="">Nombre d'enfants ?</label>
				<input type="number" name="childrenQuantity" value="<?= $reservation["childrenQuantity"]?>">			
			</div>


			<div class="FormHostelAdressNumber">
				<label for="">Nombre d'adultes ?</label>
				<input type="text" name="adultQuantity" value="<?= $reservation["adultQuantity"]?>">			
			</div>


			<div class="FormHostelAdressZip">
				<label for="">Prix total:</label>
				<input type="number" name="totalPrice" value="<?= $reservation["totalPrice"]?>">	
			</div>		
		</div>


	</div>

	<div class="FormHostelPhone FormHostelGroups">
		<div >	
			<label for="">Chambre</label>
			<select name="roomId" value="<?= $room["roomName"] ?>">
				<?= $roomResult ?>	
			</select>
		</div>

	</div>
</div>	
<br>	
<input type="submit" value="Modifier réservation" >
</form>
