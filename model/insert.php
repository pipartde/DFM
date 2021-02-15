<?php


function insertAdmin($password, $email)
{

    global $db;
    include("connexion.php");


    $query = "INSERT INTO admin (password,email) VALUES (:password, :email)";     // Nom de colonne - Valeur des champs de la colonne.
    $query_params = array(':password' => $password,
        ':email' => $email,);                  // Substitution des valeurs des champs par les valeurs des variables.


    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    return $db->lastInsertId();
}
