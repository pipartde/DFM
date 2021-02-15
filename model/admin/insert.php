<?php


function insertAdmin($nom, $prenom, $email, $mdp,$trigramme)
{

    global $db;
    include("connexion.php");


    $query = "INSERT INTO admin (nom, prenom, email, password, trigramme) VALUES (:nom, :prenom, :email, :mdp, :trigramme)";     // Nom de colonne - Valeur des champs de la colonne.
    $query_params = array(':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':mdp' => $mdp,
        ':trigramme' => $trigramme);                  // Substitution des valeurs des champs par les valeurs des variables.


    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    return $db->lastInsertId();
}
