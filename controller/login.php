<?php

include('fonction.php');
include('../model/admin/read.php');



$error = null;

if (empty($_POST["email"]) or empty($_POST["password"])){
    $GLOBALS['error'] = "1";
}

if (!verifEmail($_POST['email'])){
    $GLOBALS['error'] = "8";
}

if (!verifMdp($_POST['password'])){
    $GLOBALS['error'] = "3";
}

$listeAdmin = recupTousAdmin();
$adminExiste = false;

foreach ($listeAdmin as $admin){
    if($_POST['email']==$admin['email']){
        $adminExiste = true;
    }
}

if($adminExiste){
    $infoAdmin = recupInfosAdmin($_POST['email']);
    $passDB = $infoAdmin['password'];
    $emailDB = $infoAdmin['email'];

    if ($_POST["email"] == $emailDB) {
        if (password_verify($_POST['password'], $passDB)) {
            // contrôle si email confirmé

            $GLOBALS['error'] = null;

        } else {
            $GLOBALS['error'] = "31";
        }
    } else {
        $GLOBALS['error'] = "";
    }
} else {
    $GLOBALS['error'] = "30";
}





if ($error != null){
    errorMessage("../view/login.php",$error);
} else {
    unset($_POST["password"]);

    header('Location: ../view/pageAdmin.php');
}

?>