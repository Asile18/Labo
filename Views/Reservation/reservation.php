<div id="allReservation">
		<div id="reservation">
			<h1>Etape 1 : Réservation</h1>

					<div class='recap'>
						
						<table>
							<tr>
								<td>Du :</td>
								<td>Au :</td>
								<td>Nom de la chambre :</td>
								<td rowspan='2'>
								<form action="?section=accueil" method="post">
									<input type="submit" value="Retour Accueil">
								</form></td>
								<a href=""></a>
							</tr>
							<tr>
								<td><?= $_SESSION["dateDebut"] ?></td>
								<td><?= $_SESSION["dateFin"] ?></td>
								<td><?= $_SESSION["nomChambre"] ?></td>
							</tr>
						</table>

					</div>
				<table>
					<tr>
						<th>Type Chambre</th>
						<th>Tarif</th>
						<th>Option</th>
						
						
					</tr>

					<tr>
						<td><?= $_SESSION["nomChambre"] ?></td>
						<td><?= $_SESSION["typeChambre"] ?></td>
						<td>
							<?= $result  ?>
							<label for='option5'>Piscine :</label><input type='checkbox' name='option' value='option5' <?= $checked[0]?> disabled>
							<label for='option6'>Voiturier :</label><input type='checkbox' name='option' value='option6' <?= $checked[1]?> disabled>
							<label for='option7'>Service de chambre :</label><input type='checkbox' name='option' value='option7' <?= $checked[2]?> disabled>
							<label for='option8'>Balcon :</label><input type='checkbox' name='option' value='option8' <?= $checked[3]?> disabled>
						</td>
					</tr>
					<tr>
						<td colspan="4">Montant Total : <span class="prixTotal"></span></td>
					</tr>
				</table>
					<form action="" method="post">
						<input type="checkbox" name="insurance" id="insurance"><label for="insurance" >Vouvez-vous une assurance annulation?</label>
						<input type="button" id="reserver" value="Valider réservation !">
					</form>
			</div>
				<div id='userInfo'>
					<div class="coordinates">
						<h1>Etape 2 : Entrée Coordonnées</h1>
						<form action="#" method="post">
							<select name="title" id="title">
								<option value="mr">M.</option>
								<option value="mrs">Mme</option>
							</select>
							<label for="firstName">Prénom :</label>
							<input id="firstName" type="text" name="firstName"><br>
							<label for="lastName">Nom :</label>
							<input id="lastName" type="text" name="lastName"><br>

							<label for="email">Adresse E-mail:</label>
							<input id="mail" type="text" name="email"><br>

							<label for="emailBis">Confirmation E-mail :</label>
							<input id="mailConf" type="text" name="emailConf"><br>

							<input type="button" id="backStep1" value="Retour Etape 1">     /
							<input type="button" id="valider" value="Valider">
						</form>
					</div>
				</div>
		
		
		<div id="payment">

				<h1>Etape 3 : Paiement</h1>
				
				<form action="?section=validation" method="post">
					<label for="firstName">Titulaire CB   :</label>
					<input id="titulaire" type="text" name="firstName"><br>

					<label for="typeCard">Type de carte :</label>
					<select id="card" name="cb">
						<option value="amEx">Américan Express</option>
						<option value="visa">Visa</option>
						<option value="masterCard">Mastercard</option>
					</select><br>

					<label for="firstName">Numéro Carte :</label>
					<input id="numCard" type="number" name="numCard" onKeyPress="if(this.value.length==16) return false;"><br>

					<label for="expirationDate">Date d'expiration :</label>
					<select id="dateExp" name="expiration">
						<option value="jan">01 - janv.</option>
						<option value="fev">02 - févr.</option>
						<option value="mars">03 - mars</option>
						<option value="avril">04 - avr.</option>
						<option value="mai">05 - mai</option>
						<option value="juin">06 - juin</option>
						<option value="juillet">07 - juill.</option>
						<option value="aout">08 - août</option>
						<option value="sept">09 - sept.</option>
						<option value="oct">10 - oct.</option>
						<option value="nov">11 - nov.</option>
						<option value="dec">12 - déc.</option>
					</select>
					<select id="aExp" name="expiration">
						<option value="annee" disabled selected>aaaa</option>
						<option value="19">2019</option>
						<option value="20">2020</option>
						<option value="21">2021</option>
						<option value="22">2022</option>
						<option value="23">2023</option>
						<option value="24">2024</option>
						<option value="25">2025</option>
						<option value="26">2026</option>
						<option value="27">2027</option>
						<option value="28">2028</option>
						<option value="29">2029</option>
					</select><br>

					<label for="expirationDate">Cryptogramme :</label>
					<input id="crypto" type="number" name="Crypto" onKeyPress="if(this.value.length==3) return false;"><br>

					<input type="button" id="backStep2" value="Retour Etape 2">
					<input type="hidden" id="ajoutPrix" name="ajoutPrix" value="">
					<input type="hidden" id="insurance2" name='insurance2' value="">
					<input type="submit" id="paymentButton" value="Valider Paiement" name="paymentButton">
				</form>
			</div>
	

</div>

	<script type="text/javascript">

$("#lastName").keyup(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let lastName = $("#lastName").val();
    if(lastName.match(regex)){
        $("#lastName").css("borderColor", "green");
    }
    else{
        $("#lastName").css("borderColor", "red");
    }
});

$("#lastName").change(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let lastName = $("#lastName").val();
    if(lastName.match(regex)){
        $("#lastName").css("borderColor", "green");
    }
    else{
        $("#lastName").css("borderColor", "red");
    }
});
$("#firstName").keyup(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let firstName = $("#firstName").val();
    if(firstName.match(regex)){
        $("#firstName").css("borderColor", "green");
    }
    else{
        $("#firstName").css("borderColor", "red");
    }
});
$("#firstName").change(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let firstName = $("#firstName").val();
    if(firstName.match(regex)){
        $("#firstName").css("borderColor", "green");
    }
    else{
        $("#firstName").css("borderColor", "red");
    }
});

$("#titulaire").keyup(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let titulaire = $("#titulaire").val();
    if(titulaire.match(regex)){
        $("#titulaire").css("borderColor", "green");
    }
    else{
        $("#titulaire").css("borderColor", "red");
    }
});
$("#titulaire").change(function(){
    let regex = "^[a-zA-ZÁ-ù]{4,55}$";
    let titulaire = $("#titulaire").val();
    if(titulaire.match(regex)){
        $("#titulaire").css("borderColor", "green");
    }
    else{
        $("#titulaire").css("borderColor", "red");
    }
});

$("#mail").keyup(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    let mail = $("#mail").val();
    if(mail.match(regex)){
        $("#mail").css("borderColor", "green");
    }
    else{
        $("#mail").css("borderColor", "red");
    }
});
$("#mail").change(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    var mail = $("#mail").val();
    if(mail.match(regex)){
        $("#mail").css("borderColor", "green");
    }
    else{
        $("#mail").css("borderColor", "red");
    }
});
$("#mailConf").keyup(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    let mailConf = $("#mailConf").val();
    let mail = $("#mail").val();
    if((mailConf.match(regex)) && (mailConf==mail)){
        $("#mailConf").css("borderColor", "green");
    }
    else{
        $("#mailConf").css("borderColor", "red");
    }
});
$("#mailConf").change(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    let mailConf = $("#mailConf").val();
    let mail = $("#mail").val();
    if(mailConf.match(regex) &&(mailConf==mail)){
        $("#mailConf").css("borderColor", "green");       
    }
    else{
        $("#mailConf").css("borderColor", "red");       
    }  
});
		
		$("#reserver").click(function(){
			$("#reservation").css('display','none');
			$("#userInfo").css('display','flex');
			
		})

		$("#valider").click(function(){
			if (($("#firstName").val() != '')&&($("#lastName").val() != '')&&($("#mail").val() != '')&&($("#mailConf").val() != '')){
			$("#userInfo").css('display','none');
			$("#payment").css('display','block');
		}
		else{
			alert("Veuillez compléter le formulaire svp!");
			$("#title").css('border', '2px solid crimson');
			$("#firstName").css('border', '2px solid crimson');
			$("#lastName").css('border', '2px solid crimson');
			$("#mail").css('border', '2px solid crimson');
			$("#mailConf").css('border', '2px solid crimson');
		}
		})

				$("#backStep1").click(function(){
					$("#reservation").css('display','block');
					$("#userInfo").css('display','none');
				})

				$("#backStep2").click(function(){
					$("#reservation").css('display','none');
					$("#userInfo").css('display','flex');
					$("#payment").css('display','none');
				})

		

		let prixTotal = parseFloat(<?= $prixTotal ?>);
		let insurance = 0;
		$('#insurance').change(function(){
			if(this.checked){
				prixTotal += 100;
				insurance=1;
				$('#insurance2').val(insurance);
				let test = this.name;
				$('.prixTotal').html(prixTotal);
				$('#ajoutPrix').val(prixTotal);
				$('#insuranceValidation').html('<td colspan="2">Assurance annulation</td>');
				console.log($('#insurance2').val())
			}
			else{
				prixTotal -= 100;
				insurance=0;
				$('#insurance2').val(insurance);
				$('.prixTotal').html(prixTotal);
				$('#ajoutPrix').val(prixTotal);
				$('#insuranceValidation').empty() ;
				console.log($('#insurance2').val())
			}
		})
		$('.prixTotal').html(prixTotal);
		$('#ajoutPrix').val(prixTotal);
		$('#insurance2').val(insurance);

		
		$('.check').change(function(){
			if(this.checked){
				prixTotal += parseFloat(this.name);
				let test = this.name;
				$('.prixTotal').html(prixTotal);
				$('#ajoutPrix').val(prixTotal);
				$('#insurance2').val(insurance);
				console.log($('.check2'))
				$('.check2').each(function(){
					if(this.name==test){
						$(this).attr('checked','checked')
					}
				})
			}
			else{
				prixTotal -= parseFloat(this.name);
				console.log(prixTotal)
				$('.prixTotal').html(prixTotal);
				$('#ajoutPrix').val(prixTotal);
				$('#insurance2').val(insurance);
				$('.check2').each(function(){
					if(this.name==test){
						$(this).removeAttr('checked')
					}
				})	
			}
		})
		
		$("#paymentButton").click(function(){
			if (($("#titulaire").val() != '')&&($("#card").val() != '')&&($("#numCard").val() != '')&&($("#aExp").val() != '')&&($("#crypto").val() != '')){
			$("#payment").css('display','none');
			$("#confirmation").css('display','block');

			}
		else{
			alert("Veuillez compléter le formulaire svp!");
			$("#titulaire").css('border', '2px solid crimson');
			$("#card").css('border', '2px solid crimson');
			$("#numCard").css('border', '2px solid crimson');
			$("#aExp").css('border', '2px solid crimson');
			$("#crypto").css('border', '2px solid crimson');
			}
		})

	</script>