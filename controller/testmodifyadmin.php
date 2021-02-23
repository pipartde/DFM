<?php

session_start();
include('fonction.php');
include('../model/admin/read.php');
include('../model/admin/update.php');


$error = null;
$errortype = null;
$superadmin = null;

htmlSpecialArray($_POST);
checkTrimArray($_POST);
//checkEmptyArray($_POST);



$listeAdmin = recupTousAdmin();
$thisAdminBefore = recupInfoAdminPK($_POST['pkadmin']);
$passDBbefore = recupPaswword($_POST['pkadmin']);


$superadmin = SuperAdmin($_POST['superadmin']);







function SuperAdmin($postadmin){
    if (empty($postadmin)){
        return $GLOBALS['superadmin']=false;
    } else {
        return $GLOBALS['superadmin']=true;
    }
}