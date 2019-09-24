<div id="confirmation">

		<h1>Votre réservation a bien été pris en compte</h1>
			<div class='recapReservation'>
				<table class='tabRecapReservation'>
					<tr>
						<th rowspan="6">Réservation</th>
						<td><?= $_SESSION["dateDebut"] ?></td>
					</tr>
						<td><?= $_SESSION["dateFin"] ?></td>
					<tr>
						<td><?= $_SESSION["nomHotel"] ?></td>
					</tr>
					<tr>
						<td style="color: #ffc700"><?= $stars ?></td>
					</tr>
					<tr>
						<td><?= $_SESSION["pays"] ?></td>
					</tr>
					<tr>
						<td><?= $_SESSION["nomChambre"] ?></td>
					</tr>
					<tr>
						<th>Sélection</th>
						<td><?= $_SESSION["typeChambre"] ?></td>
					</tr>
					<tr>
						<th>Options</th>
						<td>
							<?= $resultat ?>
							<label for="option">Piscine :</label><input type="checkbox" name="option" value="option6" checked disabled><br><label for="option">Voiturier :</label><input type="checkbox" name="option" value="option7" checked disabled><label for="option">Service de chambre :</label><input type="checkbox" name="option" value="option8" checked disabled><label for="option">Balcon :</label><input type="checkbox" name="option" value="option9" checked disabled></td>
					</tr>
					<tr>
						<th>Montant Total</th>
						<td><?= $_POST['ajoutPrix'] ?></td>
					</tr>
					<tr> <td colspan="2"><?= $assuranceAffichage ?></td></tr>
					<tr>
						<td colspan='2'><form action="?" method="post"><input type="submit" value="Retour Accueil"></form></td>
					</tr>
				
				</table>
			</div>
	</div>