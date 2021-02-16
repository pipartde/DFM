<?php
session_start();
include('fonction.php');
include('../model/admin/read.php');


$error = null;

if (empty($_POST["email"]) or empty($_POST["password"])) {
    $GLOBALS['error'] = "1";
}
if (!verifMdp($_POST['password'])) {
    $GLOBALS['error'] = "3";
}

$viaMail = true;
if (strlen($_POST['email']) > 10) {
    if (!verifEmail($_POST['email'])) {
        $GLOBALS['error'] = "8";
    }
} else {
    $viaMail = false;
}

$listeAdmin = recupTousAdmin();
$adminExiste = false;

foreach ($listeAdmin as $admin) {
    if ($viaMail) {
        if ($_POST['email'] == $admin['email']) {
            $adminExiste = true;
        }
    } else {
        if ($_POST['email'] == $admin['trigramme']) {
            $adminExiste = true;
        }
    }
}

if ($adminExiste) {
    if ($viaMail) {
        $infoAdmin = recupInfosAdmin($_POST['email']);
        $passDB = $infoAdmin['password'];
        $trigramme = $infoAdmin['trigramme'];
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
        $infoAdmin = recupInfoAdminTrig($_POST['email']);
        $passDB = $infoAdmin['password'];
        $trigramme = $infoAdmin['trigramme'];
        $emailDB = $infoAdmin['email'];
        if ($_POST['email'] == $trigramme) {
            if (password_verify($_POST['password'], $passDB)) {
                $GLOBALS['error'] = null;

            } else {
                $GLOBALS['error'] = "31";
            }
        } else {
            $GLOBALS['error'] = "";
        }
    }
} else {
    $GLOBALS['error'] = "30";
}


if ($error != null) {
    errorMessage("../view/login.php",$error);
} else {
    unset($_POST["password"]);
    $_SESSION['pk'] = $infoAdmin['pk_adm'];
    $_SESSION['email'] = $infoAdmin['email'];
    $_SESSION['trigramme'] = $infoAdmin['trigramme'];
    if (isSuperAdmin($infoAdmin['pk_adm'])) {
        $_SESSION['admin'] = false;
        $_SESSION['superadmin'] = true;
    } else {
        $_SESSION['admin'] = true;
        $_SESSION['superadmin'] = false;
    }

    header('Location: ../view/pageAdmin.php');
}

?>