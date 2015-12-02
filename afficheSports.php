<?php
session_start();
require_once "./php/dbFunction.php";
require_once "./php/dbFunctionHtml.php";

$admin = estAdmin($_SESSION['user']);

if ($admin === false) {
    header("Location:afficheUtilisateur.php");
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste Utilisateurs</title>
        <link rel="stylesheet" href="./css/css.css">
    </head>
    <body>
        <?php
        if (isset($_SESSION['user'])) {
            echo "Utilisateur connecté : " . $_SESSION["user"] . " - <a href='./php/deconnexion.php'>Déconnexion</a>";
        }
        ?>
        <div id="divTab">
            <h1>Listes Sports</h1>
            <table>
                <tr>
                    <th>Sports</th>
                    <th>Modifier</th>
                    <th>Inactifs</th>
                    <?php
                    AfficheSports(getSports());
                    ?>
            </table>
            <a href="./JourneeSportive.php">Journée Sportive</a>
        </div>
    </body>
</html>