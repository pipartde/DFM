<?php


function RecupInfosAdmin($email){
    include("connexion.php");
    $query = "SELECT password, trigramme, email FROM admin WHERE email = :email";
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


function RecupEmails(){
    include("connexion.php");
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
    include('connexion.php');

    $query = "SELECT email, password, trigramme FROM admin";
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
