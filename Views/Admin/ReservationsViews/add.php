<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		.rating {
		display: inline-block;
		position: relative;
		height: 50px;
		line-height: 85px;
		font-size: 25px;
		}

		.rating label {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		cursor: pointer;
		}

		.rating label:last-child {
		position: static;
		}

		.rating label:nth-child(1) {
		z-index: 7;
		}

		.rating label:nth-child(1) {
		z-index: 6;
		} 

		.rating label:nth-child(1) {
		z-index: 5;
		}

		.rating label:nth-child(2) {
		z-index: 4;
		}

		.rating label:nth-child(3) {
		z-index: 3;
		}

		.rating label:nth-child(4) {
		z-index: 2;
		}

		.rating label:nth-child(5) {
		z-index: 1;
		}

		.rating label input {
		position: absolute;
		top: 0;
		left: 0;
		opacity: 0;
		}

		.rating label .icon {
		float: left;
		color: transparent;
		}

		.rating label:last-child .icon {
		color: #000;
		}

		.rating:not(:hover) label input:checked ~ .icon,
		.rating:hover label:hover input ~ .icon {
		color: yellow;
		}

		.rating label input:focus:not(:checked) ~ .icon:last-child {
		color: #000;
		text-shadow: 0 0 5px yellow;
		}	

form{
	
		background-color: rgba(75, 125, 231, 0.8);
}
label{
}
		input[type=text], select {
		width: 70%;
		padding: 12px 20px;
		margin: 8px 0;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
		}

		input[type=submit] {
		width: 100%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		}


label {
    display: inherit;
}

	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<title>Ajout Hotel</title>
</head>
<body> -->
	<h1>Formulaire d'ajout d'hotel</h1>
	<form action="#" method="post">
		<label for="">Start Date</label>
		<input type="date">
		<label for="">endDate</label>
		<label for="">Assurance ?</label>
		<input type="radio" name="insurance" value="yes">
<label for="">Oui</label>
<input type="radio" name="insurance" value="no">
<label for="">Non</label>
<label for="">Nombre d'enfants</label>
<input type="number" name="childrenQuantity">
<label for="">Nombre d'adultes</label>
<input type="text" name="adultQuantity">
<label for="">Prix total</label>
	</form>
	<script>
		$(':radio').change(function() {
			console.log('New star rating: ' + this.value);
		});
	</script>	
<!-- </body>
</html> -->