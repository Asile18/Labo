<?php 

require_once('Models/User.php');

$error = "";
$error2 = "";


//trouve la page precedente
$previous = "";
if(isset($_SERVER['HTTP_REFERER'])){
    $previous = substr($_SERVER['HTTP_REFERER'],strpos($_SERVER['HTTP_REFERER'],"section"),strlen($_SERVER['HTTP_REFERER']));
}
//fix pour la redirection de reservation
if(isset($_GET["previous"])){
    $_SESSION["previous"] = "section=reservation";
}
else if($previous != "section=login"){
    $_SESSION["previous"] = $previous;
}

//trouve l'url
$location = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
if ($_SERVER["SERVER_PORT"] != "80") {
    $location .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
} else {
    $location .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
}
$location = substr($location,0,strpos($location,"section"));

if(isset($_SESSION["login"])){
    //unset($_SESSION["login"]);
    header("Location: ".$location.$_SESSION["previous"]);
    die();
}
if(isset($_POST["register"])){
    if($_POST["password"] == $_POST["passwordConfirm"]){
        if($user->getByEmail($_POST["email"])){
            $error = "<p style='color:red;'>Erreur: Cet adresse e-mail existe déjà.</p>";
        }
        else{
            if($user->insert($_POST["prenom"],$_POST["nom"],$_POST["email"],$_POST["pays"],$_POST["telephone"],$_POST["password"])){
                //redirect with session login
                $log = $user->get($_POST["email"],$_POST["password"]);
                $_SESSION["login"] = $log["userId"];
                $_SESSION["roleId"] = $log["roleId"];
                header("Location: ".$location.$_SESSION["previous"]);
                die();
            }
        }
    }
    else{
        $error = "<p style='color:red;'>Erreur: Les mots de passe ne correspondent pas.</p>";
    }
}
if(isset($_POST["connect"])){
    if(isset($_POST["login"],$_POST["password"])){
        $log = $user->get($_POST["login"],$_POST["password"]);
        if($log){
            $_SESSION["login"] = $log["userId"];
            $_SESSION["roleId"] = $log["roleId"];
            header("Location: ".$location.$_SESSION["previous"]);
            die();
        }
        else{
            $error2 = "<p style='color:red;'>Erreur: login/mot de passe incorrecte.</p>";
        }
    }
    else{
        $error2 = "<p style='color:red;'>Erreur: login/mot de passe incorrecte.</p>";
    }
}

require_once("Views/Login/login.php");
?>