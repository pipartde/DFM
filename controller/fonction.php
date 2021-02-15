<?php

function htmlSpecialArray($post){
    foreach($post as $key => $elem){
        $_POST[$key] = htmlspecialchars($elem);
    }
}

function checkTrimArray($post){
    foreach($post as $key => $elem){
        $_POST[$key] = trim($elem);
    }
}

function checkPost($login, $password, $passDB, $loginDB){
    if(isset($login) AND isset($password)){
        if(empty($login)){
            return 'Veuillez indiquer votre login svp !';
        }elseif(empty($password)){
            return 'Veuillez indiquer votre mot de passe svp !';
        }elseif($login !== $loginDB){
            return 'Votre login est faux !';
        }elseif(!password_verify($password, $passDB)){
            return 'Erreur Password';
        }else{
            return 'ok';
        }
    }else{
        return 'login ou mdp pas present';
    }
}

function errorMessage($location,$error){
    switch ($error){
        case 1:$message="Veuillez remplir tous les champs svp !";break;
        case 2:$message="Mauvais format de votre Login.";break;
        case 3:$message="Mauvais format de mot de passe.";break;
        case 4:$message="Compte d'administrateur validé.";break;
        case 5:$message="Veuillez indiquer votre login svp !";break;
        case 6:$message="compte non activé";break;
        case 7:$message="Veuillez entrer des mots de passe identique svp !";break;
        case 8:$message="Mauvais format d'email";break;
        case 9:$message="Un email de confirmation vous a été envoyé.";break;
        case 10:$message="Ce Login est déjà pris.";break;
        case 11:$message="Vous devez avoir entre 12 et 200 ans.";break;
        case 12:$message="Une personne est déjà inscrite avec ce Nom et Prénom.";break;
        case 13:$message="Mauvais format de votre nom/prénom.";break;
        case 14:$message="Mauvais format de votre d'équipe.";break;
        case 15:$message="Ce nom d'équipe est déjà pris.";break;
        case 16:$message="Les noms/prénoms des joueurs d'une équipe ne peuvent pas être identique.";break;
        case 17:$message="Il y a un soucis avec les noms/prenoms des membres de l'équipe";break;
        case 18:$message="Les pseudos des joueurs d'une équipe ne peuvent pas être identique.";break;
        case 19:$message="Il y a un soucis avec les pseudos des membres de l'équipe";break;
        case 20:$message="Les emails des joueurs d'une équipe ne peuvent pas être identique.";break;
        case 21:$message="Il y a un soucis avec les emails des membres de l'équipe";break;
        case 22:$message="Votre équipe a bien été enregistrée.";break;
        case 23:$message="Modification OK.";break;
        case 24:$message="Effacement Joueur confirmé.";break;
        case 25:$message="Effacement de l'équipe entière confirmé.";break;
        case 26:$message="Il y a un problème avec votre token.";break;
        case 27:$message="Votre compte n'a pas été activé.";break;
        case 28:$message="Capcha non conforme !";break;
        case 29:$message="Modification annulée.";break;
        case 30:$message="Le login n'existe pas.";break;
        case 31:$message="Mauvais mot de passe!";break;

        default:$message="erreur inconnue";break;
    }
    header("Location: ".$location."?message=".$message);
}




function verifMdp($aVerifier){
    if (strlen($aVerifier) >= 8) {
        if (verifMajuscule($aVerifier)) {
            if (verifMinuscule($aVerifier)) {
                if (verifNombre($aVerifier)) {
                    if (verifSpecial($aVerifier)){
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verifLogin($aVerifier){
    if(strlen($aVerifier) >= 6){
        if (verifMajuscule($aVerifier)) {
            if (preg_match("#^[a-zA-Z]+[a-zA-Z0-9àçéèùî._*-]*$#", $aVerifier)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verifMajuscule($aVerifier)
{
    if (preg_match("#[A-Z]#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

function verifMinuscule($aVerifier)
{
    if (preg_match("#[a-z]#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

function verifSpecial($aVerifier)
{
    if (preg_match("#[.!?@%£$*_-]{1,}#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

function verifNombre($aVerifier)
{
    if (preg_match("#[0-9]#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

function verifEmail($aVerifier){
    if ((preg_match("#^[a-zA-Z0-9àçéèùî]+[a-zA-Z0-9àçéèùî._-]*@(wavre.be)$#", $aVerifier))
        and (filter_var($aVerifier, FILTER_VALIDATE_EMAIL))){
        return true;
    }
    else{
        return false;
    }
}

function envoiMailVerif($lastID, $login, $token){
    $to = RecupLastEmail($lastID)['email'];
    $subject = 'Confirmation de votre e-mail';
    $message = "
        Bonjour $login,
        Veuillez cliquer sur ce lien : http://localhost/egames_project/controller/tokenVerification.php?token=$token pour valider votre inscription en tant qu'Admin.
        Attention, ce lien n'est valide que 48h.";

    mail($to,$subject,$message);
}

function envoiMailConf($lastID, $nom, $prenom){
    $to = RecupLastEmail($lastID)['email'];
    $subject = 'Confirmation de votre inscription';
    $message = "
        Bonjour $nom $prenom,
        Nous vous confirmons votre inscription pour le tournoi Egames de Wavre 2021 !";

    mail($to,$subject,$message);
}

function verifAge($aVerifier)
{
    if (preg_match("#^(0?[1][2-9]|[2-9][0-9]|[1][0-9][0-9]|200)$#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

function verifNom($aVerifier)
{
    if (preg_match("#^([a-zA-Z]{2,}\s[a-zA-Z]+'?-?[a-zA-Z]{2,}\s?([a-zA-Z]+)?)#", $aVerifier)) {
        return true;
    } else {
        return false;
    }
}

