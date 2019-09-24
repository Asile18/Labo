<h1>Formulaire d'ajout de chambres</h1>
	<form action="" method="post"  enctype="multipart/form-data">

		<div >
			<label for="">Titre du bien:</label>
			<input type="text" name="roomName" id="">	
		</div>

		<div>
			<label for="">Description courte:</label>
			<input type="text" name="shortDescription" id="">			
		</div>

		<div >
			<label for="">Description:</label>
			<input type="text" name="longDescription" id="">			
		</div>

		<div >
			<label for="">Nombre de salles de bain:</label>
			<input type="text" name="bathroomQuantity" id="">	
		</div>	

		<div >	
			<label for="">Hôtel:</label>
			<select name="hotelSelect" id="">
				<!-- accéder aux elements à partir de la bd et les crée dynamiquement dans la view $hotels-->
				
						<?= $hostelsOptions ?>
				
			</select>
		</div>
		<div >
			<label for="">Capacité enfants:</label>
			<input type="number" name="children" id="">				
		</div>
		<div >
			<label for="">Capacité adultes:</label>
			<input type="number" name="adults" id="">				
		</div>
		<div >	
			<label for="">Type de Chambre:</label>
			<select name="roomType" id="">
				<!-- accéder aux elements à partir de la bd et les crée dynamiquement dans la view $hotels-->
						<?= $roomResult ?>
				
			</select>
		</div>

		<div>
			<label for="">Nombre de toilettes:</label>
			<input type="text" name="toiletQuantity" id="">		
		</div>

		<div >
			<label for="">Balcon :</label>
			<input type="number" name="balcony" id="">				
		</div>
		
		</div>	
				
		<div >
			<div >
				<h4>Options :</h4>
				<div class="FormHostelOptionsRadio">
			<?= $optionResult ?>
					<!-- accéder aux elements à partir de la bd et les crée dynamiquement dans la view $options -->
				</div>	
			</div>
			<br>
			<div>
			      Ajout d'image : 
			      <input type="hidden" name="test" value="LOL">
			      <input size="100" type="file" name="picturePath" />
			</div>
			<br>
			<input type="submit" value="Enregistrer" >
			<?= $message ?>
			<br>
            <?= $msg ?>
	 			<!-- appeler la view de la picture -->
             <!--  <div> 
              	<form action="" method="post" enctype="multipart/form-data">
				Select image to upload:
    			<input type="file" name="picturePath" id="picturePath">
    			<input type="submit" value="Upload Image" name="picture">
    			</form>
              </div> -->	

	</div>	

</div>		

</form>