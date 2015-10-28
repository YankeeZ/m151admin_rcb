<?php

require_once './mysqlinc.php';

$nom = FILTER_INPUT(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$prenom = FILTER_INPUT(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$date = FILTER_INPUT(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$pseudo = FILTER_INPUT(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
$mdp = FILTER_INPUT(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
$description = FILTER_INPUT(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$id = FILTER_INPUT(INPUT_POST, 'idUser', FILTER_SANITIZE_STRING);

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

if (isset($_REQUEST['update'])) {
    ModifierUtilisateur($nom, $prenom, $date, $email, $pseudo, $mdp, $description, $id);
}
if(isset($_REQUEST['submit']))
{
    CreeUtilisateur($nom, $prenom, $date, $email, $pseudo, $mdp, $description);
}

function CreeUtilisateur($nom, $prenom, $date, $email, $pseudo, $mdp, $description) {

    $req = getConnexionBDD()->prepare("INSERT INTO user VALUES('',:nom,:prenom,:date,:email,:pseudo,SHA1(:mdp),:description)");
    $req->bindParam(':nom', $nom, PDO::PARAM_STR);
    $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $req->bindParam(':date', $date, PDO::PARAM_STR);
    $req->bindParam(':email', $email, PDO::PARAM_STR);
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $req->bindParam(':description', $description, PDO::PARAM_STR);
    $req->execute();

    header("Location:formulaire.php");
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
