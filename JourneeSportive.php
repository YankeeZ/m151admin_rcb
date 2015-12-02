<?php
session_start();
require_once "./php/dbFunction.php";
require_once "./php/dbFunctionHtml.php";

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}

if (isset($_REQUEST["Sports"])) {
    choix($_SESSION['idUser'], $choix1, $choix2, $choix3, $choix4);
    header("Location:afficheUtilisateur.php");
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Choix Sports</title>
        <link rel="stylesheet" href="./css/css.css">
    </head>
    <body>
        <div id="divPrin">
            <h1>Choix du Sports</h1>
            <form action="#" method="post">               
                <?php
                    ChoixSports(getSportsInactifs())
                ?>
                <br/><br/>
                <input type="submit" value="submit" name="Sports">
                <input type="reset" name="Reset">
                <br/><br/>
                <a href="afficheUtilisateur.php">Affiche Utilisateur</a>
            </form> 
        </div>
    </body>
</html>

