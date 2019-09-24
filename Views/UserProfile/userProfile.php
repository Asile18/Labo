
<table id="tableUserProfile">
	<tr>
		<th>Prénom</th>
		<th>Nom</th>
		<th>Email</th>
		<th>Pays</th>
		<th>Téléphone</th>
	</tr>
	<?= $affichageUserProfile ?>
</table>

<div id="userProfile">
<h4>Modifiez votre profil</h4>
<form action="" method="post" id="formUserProfile">
	<label for="firstName">Prénom :</label>
	<input type="text" name="firstName" value="<?=$firstNameUserProfile?>" id="prenom" class="inputFix"><br>
	<label for="lastName">Nom :</label>
	<input type="text" name="lastName" value="<?=$lastNameUserProfile?>" id="nom" class="inputFix"><br>
	<label for="email">Email :</label>
	<input type="text" name="email" value="<?=$emailUserProfile?>" id="email" class="inputFix"><br>
	<label for="country">Pays :</label>	
	<select name="pays" id="pays" class="inputFix"></select><br>
	<label for="phone">Téléphone :</label>
	<input type="text" name="phone" value="<?=$phoneUserProfile?>" id="telephone" class="inputFix"><br>
	<input type="submit" value="Modifier" name="modifUser">
</form>
<h4>Modifiez votre mot de passe</h4>
<form action="" method="post">
    <label for="password">Mot de passe:</label> <input type="password" id="password" name="password" class="inputLogin" required><br>
    <label for="passwordConfirm">Mot de passe (confirm):</label> <input type="password" id="passwordConfirm" name="passwordConfirm" class="inputLogin" required><br>
    <input type="submit" value="Modifier" name="modifMDP">
</form>
</div>

<script>
let uri = "https://restcountries.eu/rest/v2/all";
let test = <?= json_encode($countryUserProfile) ?>;
$.ajax({

    url : uri,
	type : 'GET',
	dataType : 'html',
    success:function(rep, statut){
        let objects = eval('('+rep+')');
        for (let i = 0; i < objects.length; i++) {
        	if (objects[i].name == test){
        		$("#pays").append("<option value="+objects[i].name+" selected>"+objects[i].name+"</option>");
        	}
            $("#pays").append("<option value="+objects[i].name+">"+objects[i].name+"</option>");
        }
    }
});

let nomO = false;
let prenomO = false;
let emailO = false;
let telephoneO = false;
let passwordO = false;
let passwordConfO = false;

$("#nom").keyup(function(){
    let regex = "^[a-zA-Z]{4,55}$";
    let nom = $("#nom").val();
    if(nom.match(regex)){
        $("#nom").css("borderColor", "green");
        nomO = true;
    }
    else{
        $("#nom").css("borderColor", "red");
        nomO = false
    }
});

$("#nom").change(function(){
    let regex = "^[a-zA-Z]{4,55}$";
    let nom = $("#nom").val();
    if(nom.match(regex)){
        $("#nom").css("borderColor", "green");
        nomO = true;
    }
    else{
        $("#nom").css("borderColor", "red");
        nomO = false
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});

$("#prenom").keyup(function(){
    let regex = "^[a-zA-Z]{4,55}$";
    let prenom = $("#prenom").val();
    if(prenom.match(regex)){
        $("#prenom").css("borderColor", "green");
        prenomO = true;
    }
    else{
        $("#prenom").css("borderColor", "red");
        prenomO = false;
    }
});

$("#prenom").change(function(){
    let regex = "^[a-zA-Z]{4,55}$";
    let prenom = $("#prenom").val();
    if(prenom.match(regex)){
        $("#prenom").css("borderColor", "green");
        prenomO = true;
    }
    else{
        $("#prenom").css("borderColor", "red");
        prenomO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});


$("#email").keyup(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    let email = $("#email").val();
    if(email.match(regex)){
        $("#email").css("borderColor", "green");
        emailO = true;
    }
    else{
        $("#email").css("borderColor", "red");
        emailO = false;
    }
});

$("#email").change(function(){
    let regex = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}";
    let email = $("#email").val();
    if(email.match(regex)){
        $("#email").css("borderColor", "green");
        emailO = true;
    }
    else{
        $("#email").css("borderColor", "red");
        emailO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});

$("#telephone").keyup(function(){
    let regex = "^[0-9]{4,12}";
    let telephone = $("#telephone").val();
    if(telephone.match(regex)){
        $("#telephone").css("borderColor", "green");
        telephoneO = true;
    }
    else{
        $("#telephone").css("borderColor", "red");
        telephoneO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});

$("#telephone").change(function(){
    let regex = "^[0-9]{6,12}";
    let telephone = $("#telephone").val();
    if(telephone.match(regex)){
        $("#telephone").css("borderColor", "green");
        telephoneO = true;
    }
    else{
        $("#telephone").css("borderColor", "red");
        telephoneO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});

$("#password").keyup(function(){
    let regex = "^[a-zA-Z0-9._%+-]{6,30}$";
    let password = $("#password").val();
    if(password.match(regex)){
        $("#password").css("borderColor", "green");
        passwordO = true;
    }
    else{
        $("#password").css("borderColor", "red");
        passwordO = false;
    }
});

$("#password").change(function(){
    let regex = "^[a-zA-Z0-9._%+-]{6,30}$";
    let password = $("#password").val();
    if(password.match(regex)){
        $("#password").css("borderColor", "green");
        passwordO = true;
    }
    else{
        $("#password").css("borderColor", "red");
        passwordO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});

$("#passwordConfirm").keyup(function(){
    let regex = "^[a-zA-Z0-9._%+-]{6,30}$";
    let password = $("#passwordConfirm").val();
    if(password.match(regex)){
        $("#passwordConfirm").css("borderColor", "green");
        passwordConfirmO = true;
    }
    else{
        $("#passwordConfirm").css("borderColor", "red");
        passwordConfirmO = false;
    }
});

$("#passwordConfirm").change(function(){
    let regex = "^[a-zA-Z0-9._%+-]{6,30}$";
    let password = $("#passwordConfirm").val();
    if(password.match(regex)){
        $("#passwordConfirm").css("borderColor", "green");
        passwordConfirmO = true;
    }
    else{
        $("#passwordConfirm").css("borderColor", "red");
        passwordConfirmO = false;
    }
    if(nomO && prenomO && emailO && telephoneO && passwordO && passwordConfirmO ){
        $("#confirmButton").prop( "disabled", false );
    }
    else{
        $("#confirmButton").prop( "disabled", true );
    }
});
</script>