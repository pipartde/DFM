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

function recupType($category){
    include("../model/connexion.php");

    $query = "SELECT pk_typ, nom FROM type where fk_cat = :category";
    $query_params = array(':category' => $category);
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