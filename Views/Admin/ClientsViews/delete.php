<div class="container">
	<form action="#" method="post">
		<p>Etes-vous sûre de vouloir supprimer l'utilisateur ? :</p>
		<p style="color:red"><?= $p ?></p>
		<input type="radio" name="choice" value="yes">
		<label for="yes">Oui</label>
		<input type="radio" name="choice" value="no">
		<label for="no">Non</label>
		<input type="submit" value="Je suis sûr(e)">
	</form>

</div>