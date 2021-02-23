<?php
function recupCategory(){
    include("../model/connexion.php");
    $query = "SELECT pk_cat, nom FROM category";
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

function recupType(){
    include("../model/connexion.php");

    $query = "SELECT fk_cat, pk_typ, nom FROM type";
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

function recupTypeForCat($pk_cat){
    include("../model/connexion.php");

    $query = "SELECT fk_cat, pk_typ, nom FROM type where fk_cat = :fk_cat";
    $query_params = array(':fk_cat' => $pk_cat);
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