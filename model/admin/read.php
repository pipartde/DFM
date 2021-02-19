<?php


function RecupInfosAdmin($email){
    include("../model/connexion.php");
    $query = "SELECT pk_adm, password, trigramme, email FROM admin WHERE email = :email";
    $query_params = array( ':email' => $email );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
function recupInfoAdminTrig($trigramme){
    include("../model/connexion.php");
    $query = "SELECT pk_adm, password, trigramme, email FROM admin WHERE trigramme = :trigramme";
    $query_params = array( ':trigramme' => $trigramme );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
function recupInfoAdminPK($pk){
    include("../model/connexion.php");
    $query = "SELECT pk_adm, nom, prenom, password, trigramme, email FROM admin WHERE pk_adm = :pk";
    $query_params = array( ':pk' => $pk );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}

function recupPaswword($pk){
    include("../model/connexion.php");
    $query = "SELECT password FROM admin WHERE pk_adm = :pk";
    $query_params = array( ':pk' => $pk );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}


function RecupEmails(){
    include("../model/connexion.php");
    $query = "SELECT email FROM admin";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function recupTousAdmin(){

    global $db;
    include('../model/connexion.php');

    $query = "SELECT pk_adm, nom, prenom, email, password, trigramme FROM admin";
    $query_params = array();

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function recupTrigramme(){
    global $db;
    include('../model/connexion.php');

    $query = "SELECT trigramme FROM admin";
    $query_params = array();

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function recupAccess($pkadmin){

    global $db;
    include('../model/connexion.php');

    $query = "SELECT * FROM access WHERE fk_adm = :fk_admin";
    $query_params = array( ':fk_admin' => $pkadmin);

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}