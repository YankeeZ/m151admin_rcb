<?php

require_once 'mysqlinc.php';
require_once 'getData.php';

function getConnexionBDD() {
    static $dbh = null;
    if ($dbh == null) {
        try {
            $dbh = new PDO('mysql:dbname=' . DBNAME . ';host=' . HOST . '', USER, PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connexion à MySQL impossible : ", $e->getMessage();
            die();
        }
    }
    return $dbh;
}

function CreeUtilisateur($nom, $prenom, $date, $email, $pseudo, $mdp, $description, $classe) {

    $req = getConnexionBDD()->prepare("INSERT INTO user VALUES('',:nom,:prenom,:date,:email,:pseudo,SHA1(:mdp),:description, 0, :classe)");
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->bindParam(':email', $email, PDO::PARAM_STR);
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $req->bindParam(':description', $description, PDO::PARAM_STR);
    $req->bindParam(':classe', $classe, PDO::PARAM_STR);
    $req->execute();

}

function AfficheUtilisateurs() {
    $result = "SELECT * FROM user";
    return getConnexionBDD()->query($result);
}

function DetailUtilisateur($id) {
    $result = "SELECT * FROM user WHERE idUser=$id";
    return getConnexionBDD()->query($result);
}

function ModifierUtilisateur($nom, $prenom, $date, $email, $pseudo, $mdp, $description, $id) {

    $req = getConnexionBDD()->prepare("UPDATE user SET Nom=:nom, Prenom=:prenom, DateNaissance=:date, Email=:email, Pseudo=:pseudo, MotDePasse=SHA1(:mdp), Description=:description WHERE idUser=$id");
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->bindParam(':email', $email, PDO::PARAM_STR);
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $req->bindParam(':description', $description, PDO::PARAM_STR);
    $req->execute();
}

function DeleteUtilisateur($id) {
    $result = "DELETE FROM user WHERE idUser=$id";
    return getConnexionBDD()->query($result);
}

function login($pseudo, $mdp) {
    $req = getConnexionBDD()->prepare("SELECT idUser, Pseudo, MotDePasse FROM user WHERE BINARY Pseudo = :pseudo AND MotDePasse = SHA1(:mdp) LIMIT 1");
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch();
}

function estAdmin($pseudo) {
    $req = getConnexionBDD()->prepare("SELECT idUser FROM user WHERE Pseudo=:pseudo AND estAdmin=1");
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch();
}

function getClasses() {
    $result = "SELECT * FROM classes";
    return getConnexionBDD()->query($result);
}

function getSportsInactifs() {
    $result = "SELECT * FROM sports WHERE inactifs=0";
    return getConnexionBDD()->query($result)->fetchAll();
}

function getSports() {
    $result = "SELECT * FROM sports";
    return getConnexionBDD()->query($result)->fetchAll();
}

function choix($id, $choix1, $choix2, $choix3, $choix4) {
    try {
        getConnexionBDD()->beginTransaction();
        $req = getConnexionBDD()->prepare("INSERT INTO choix VALUES(:idSport1, $id, 1)");
        $req->bindParam(':idSport1', $choix1, PDO::PARAM_STR);
        $req->execute();

        $req = getConnexionBDD()->prepare("INSERT INTO choix VALUES(:idSport2, $id, 2)");
        $req->bindParam(':idSport2', $choix2, PDO::PARAM_STR);
        $req->execute();

        $req = getConnexionBDD()->prepare("INSERT INTO choix VALUES(:idSport3, $id, 3)");
        $req->bindParam(':idSport3', $choix3, PDO::PARAM_STR);
        $req->execute();

        $req = getConnexionBDD()->prepare("INSERT INTO choix VALUES(:idSport4, $id, 4)");
        $req->bindParam(':idSport4', $choix4, PDO::PARAM_STR);
        $req->execute();
        getConnexionBDD()->commit();

        return true;
    } catch (Exception $e) {
        getConnexionBDD()->rollBack();
        return false;
    }
}
