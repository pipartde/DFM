<?php
function deleteAdmin($pk){

    global $db;
    include("connexion.php");

    $query = "  DELETE
                FROM admin
                WHERE pk_adm = ?";
    $query_params = array($pk);


    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}

function deleteAccess($pkAdmin){

    global $db;
    include("connexion.php");

    $query = "  DELETE
                FROM access
                WHERE fk_adm = ?";
    $query_params = array($pkAdmin);


    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
        die("Failed query : " . $ex->getMessage());
    }
}