<?php

session_start();
include('fonction.php');
include('../model/admin/read.php');
include('../model/admin/insert.php');


htmlSpecialArray($_POST);
checkTrimArray($_POST);



$error = null;
$superadmin = false;

if (empty($_POST["email2"]) or empty($_POST["password2"]) ) {
    $GLOBALS['error'] = "1";
} elseif (!verifEmail($_POST["email2"])){    // contrôle si format email est ok
    $GLOBALS['error'] = "8";
} elseif (!verifMdp($_POST['password2'])){
    $GLOBALS['error'] = "";                 //todo : verifier le type erreur mdp
} else {
    // contrôle si email déjà existant et donc admin
    $listeAdmin = recupTousAdmin();
    if($listeAdmin){
        foreach($listeAdmin as $admin){
            if ($admin['email'] == $_POST['email2']){
                $GLOBALS['error'] = "10";
            }
        }
    }
}

if (!empty($_POST['superadmin'])){
    $superadmin = true;
}

if ($error != null){
    errorMessage("../view/pageAdmin.php",$error);
} else {            // si pas d'erreur =>
    // todo : finaliser l'inscription nouvel admin
    $_POST["mdp"] = password_hash($_POST["password2"], PASSWORD_BCRYPT);
    $trigramme = creationTrigramme($_POST['email2']);
    $nom = splitName($_POST['email2'])[1];
    $prenom = splitName($_POST['email2'])[0];

    $lastID = insertAdmin($nom,$prenom,$_POST['email2'],$_POST['mdp'],$trigramme);   // création de l'admin
    insertAcces($lastID,$superadmin);                                               // création de l'accès pour cet admin


    unset($_POST['password2']);
    header('Location: ../view/pageAdmin.php');

}
