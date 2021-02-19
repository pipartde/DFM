<?php

function updateAdmin($nom, $prenom, $email, $mdp, $trigramme, $pk, $superadmin)
{
    global $db;
    include('../model/connexion.php');
    $query = "UPDATE admin SET nom = :nom, prenom = :prenom, email = :email, password = :mdp, trigramme = :trigramme where pk_adm = :pk_adm";
    $query_params = array(':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':mdp' => $mdp,
        ':trigramme' => $trigramme,
        ':pk_adm' => $pk);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);

    } catch (PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    if ($superadmin == true) {
        $query = "UPDATE access SET superadmin = 1, admin = 0 where fk_adm = :pk";
        $query_params = array(':pk' => $pk);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);

        } catch (PDOException $ex) {
            die("Failed query : " . $ex->getMessage());
        }
    } else {
        $query = "UPDATE access SET superadmin = 0, admin = 1 where fk_adm = :pk";
        $query_params = array(':pk' => $pk);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);

        } catch (PDOException $ex) {
            die("Failed query : " . $ex->getMessage());
        }
    }


}
