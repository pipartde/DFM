<?php

include('fonction.php');
include('../model/admin/read.php');
include('../model/admin/insert.php');


htmlSpecialArray($_POST);
checkTrimArray($_POST);



$error = null;

if (empty($_POST["email"]) or empty($_POST["password"]) ) {
    $GLOBALS['error'] = "1";
} elseif (!verifEmail($_POST["email"])){    // contrôle si format email est ok
    $GLOBALS['error'] = "8";
} elseif (!verifMdp($_POST['password'])){
    $GLOBALS['error'] = "";                 //todo : verifier le type erreur mdp
} else {
    // contrôle si email déjà existant et donc admin
    $listeAdmin = recupTousAdmin();
    if($listeAdmin){
        foreach($listeAdmin as $admin){
            if ($admin['email'] == $_POST['email']){
                $GLOBALS['error'] = "10";
            }
        }
    }
}
var_dump($_POST);
if ($error != null){
    errorMessage("../view/login.php",$error);
} else {            // si pas d'erreur =>
    // todo : finaliser l'inscription nouvel admin
    $_POST["mdp"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $trigramme = creationTrigramme($_POST['email']);
    $nom = splitName($_POST['email'])[1];
    $prenom = splitName($_POST['email'])[0];
    $lastID = insertAdmin($nom,$prenom,$_POST['email'],$_POST['mdp'],$trigramme);
    $_SESSION['pk']=$lastID;
    echo $trigramme;
/*    unset($_POST['password']);
    header('Location: ../view/pageAdmin.php');*/

}
