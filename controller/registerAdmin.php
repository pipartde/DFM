<?php

include('fonction.php');
include('../model/read.php');
include('../model/insert.php');

htmlSpecialArray($_POST);
checkTrimArray($_POST);


$listeAdmin = recupTousAdmin();
$emails = RecupEmails();

$error = null;

if (empty($_POST["email"]) or empty($_POST["password1"]) ) {
    $GLOBALS['error'] = "1";
} elseif (!verifEmail($_POST["email"])){    // contrôle si format email est ok
    $GLOBALS['error'] = "8";
} elseif (!verifMdp($_POST['password'])){
    $GLOBALS['error'] = "";                 //todo : verifier le type erreur mdp
} else {
    // contrôle si email déjà existant et donc admin
    foreach($listeAdmin as $admin){
        if ($admin['email'] == $_POST['email']){
            $GLOBALS['error'] = "10";
        }
    }
}

if ($error != null){
    errorMessage("../view/login.php",$error);
} else {            // si pas d'erreur =>
    // todo : finaliser l'inscription nouvel admin
    $lastID = insertAdmin($_POST['login'],$_POST['password1'],$_POST['email'],$timest,$token);

    //envoi du mail de vérification
    envoiMailVerif($lastID,$_POST['login'],$token);
    echo "success";
}
