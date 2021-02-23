<?php

session_start();
include('fonction.php');
include('../model/admin/read.php');
include('../model/admin/update.php');


htmlSpecialArray($_POST);
checkTrimArray($_POST);




$listeAdmin = recupTousAdmin();
$thisAdminBefore = recupInfoAdminPK($_POST['pkadmin']);
$passDBbefore = recupPaswword($_POST['pkadmin']);

echo $_POST['pkadmin'];

if (empty($_POST['superadmin'])){
    $superadmin = false;
} else {
    $superadmin = true;
}


$error = null;
$errortype = null;

if(empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['email']) ){
    $error = "1";
    $GLOBALS['errortype'] = "champs vide";
} elseif ($_POST['nom'] === $thisAdminBefore['nom'] and $_POST['prenom'] === $thisAdminBefore['prenom'] and
    $_POST['email'] === $thisAdminBefore['email'] and empty($_POST['password']) and $superadmin === isSuperAdmin($_POST['pkadmin'])){
    $GLOBALS['error'] = null;
    $GLOBALS['errortype'] = "aucun champ modifié";
} elseif ($_POST['email'] === $thisAdminBefore['email'] and ($_POST['nom'] !== $thisAdminBefore['nom'] or $_POST['prenom'] !== $thisAdminBefore['prenom'])){
    $NewNom = $_POST['nom'];
    $NewPrenom = $_POST['prenom'];
    $NewSuperadmin = $superadmin;
    if(empty($_POST['password'])){
        $NewPass = $passDBbefore['password'];
        $NewTrigramme = $thisAdminBefore['trigramme'];
        $NewPkAdmin = $_POST['pkadmin'];
        updateAdmin($NewNom, $NewPrenom, $_POST['email'], $passDBbefore['password'], $thisAdminBefore['trigramme'], $_POST['pkadmin'], $superadmin);
        echo "mdp vide ; update ok";
    } else {
        if(!verifMdp($_POST['password'])){
            $GLOBALS['error'] = "";
            $GLOBALS['errortype'] = "mauvais format de mot de passe";
            echo "mauvais mdp format";
        } else {
            $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $NewPass = $_POST['password'];

            updateAdmin($NewNom, $NewPrenom, $_POST['email'], $_POST['password'], $thisAdminBefore['trigramme'], $_POST['pkadmin'], $superadmin);
            unset($_POST['password']);
            echo"mdp ok ; update ok";
        }
    }
} elseif ($_POST['email'] !== $thisAdminBefore['email']){
    if (!verifEmail($_POST["email"])){    // contrôle si format email est ok
        $GLOBALS['error'] = "8";
        $GLOBALS['errortype'] = "Mauvais format d'email";
    } else {
        $trigramme = updateTrigramme($_POST['email'],$thisAdminBefore['trigramme']);
        $NewNom = splitName($_POST['email'])[1];
        $NewPrenom = splitName($_POST['email'])[0];
        if(empty($_POST['password'])){
            updateAdmin($NewNom, $NewPrenom, $_POST['email'], $passDBbefore['password'],$trigramme,$_POST['pkadmin'],$superadmin);
        } else {
            if(!verifMdp($_POST['password'])){
                $GLOBALS['error'] = "";
                $GLOBALS['errortype'] = "mauvais format de mot de passe";
            } else {
                $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
                updateAdmin($NewNom, $NewPrenom, $_POST['email'], $_POST['password'], $trigramme, $_POST['pkadmin'],$superadmin);
                unset($_POST['password']);
            }
        }
    }
} else {
    if(empty($_POST['password'])){
        updateAdmin($thisAdminBefore['nom'],$thisAdminBefore['prenom'],$thisAdminBefore['email'], $passDBbefore['password'],$thisAdminBefore['trigramme'], $_POST['pkadmin'],$superadmin);
    } else {
        if(!verifMdp($_POST['password'])){
            $GLOBALS['error'] = "";
            $GLOBALS['errortype'] = "mauvais format de mot de passe";
        } else {
            $_POST["password"] = password_hash($_POST["password"], PASSWORD_BCRYPT);
            updateAdmin($thisAdminBefore['nom'],$thisAdminBefore['prenom'],$thisAdminBefore['email'], $_POST['password'], $thisAdminBefore['trigramme'], $_POST['pkadmin'],$superadmin);
            unset($_POST['password']);
        }
    }
}

if($error != null){
    header('HTTP/1.0 500 Internal Server Error');
    $retour = $errortype;
    die($retour);
} else {
    echo "success";
    //header('Location: ../view/test.php');
}


