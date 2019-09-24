<br>
<div class="containerLogin">
	<div class="Connecter"> 
    <form action="" method="post">
    <h2>Inscrivez-Vous</h2>
    <label for="nom">Nom :</label><input type="text" id="nom" name="nom" class="inputLogin" required><br>
    <label for="prenom">Prénom:</label><input type="text"id="prenom" name="prenom" class="inputLogin" required><br>
    <label for="email">Email:</label> <input type="text" id="email" name="email" class="inputLogin" required><br>
    <label for="password">Mot de passe:</label> <input type="password" id="password" name="password" class="inputLogin" required><br>
    <label for="passwordConfirm">Mot de passe (confirm):</label> <input type="password" id="passwordConfirm" name="passwordConfirm" class="inputLogin" required><br>
    <label for="telephone">Telephone:</label><input type="text" id="telephone" name="telephone"  class="inputLogin" required><br>
    <label for="pays">Pays:</label> 
    <select name="pays" id="pays" class="inputFix"></select><br>
    <input type="hidden" id="register" name="register" value="true">
    <input type="submit" value ="Confirmer" class="inputLogin" id="confirmButton">
    <div style="background-color:white;">
        <?= $error ?>
    </div>
    </form>
	</div>

	<div>
		<h2 id="ou">OU</h2>
	</div>

	<div class="Connecter">
    <form action="" method="post">
    <h2>Connectez-Vous</h2>
    <label for="login">Email:</label><input type="text" id="login" name="login" class="inputLogin" required><br>
    <label for="password">Mot de passe:</label><input type="password"id="password" name="password" class="inputLogin" required><br>
    <input type="hidden" id="connect" name="connect" value="true">
    <input type="submit" value ="Confirmer" class="inputLogin">
    <div style="background-color:white;">
        <?= $error2 ?>
    </div>    
    </form>
	</div>

</div>

<script>
let uri = "https://restcountries.eu/rest/v2/all";
$.ajax({

    url : uri,
	type : 'GET',
	dataType : 'html',
    success:function(rep, statut){
        let objects = eval('('+rep+')');
        console.log(objects);
        for (let i = 0; i < objects.length; i++) {
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