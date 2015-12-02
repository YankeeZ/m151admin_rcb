<?php
session_start();
include "./php/dbFunction.php";
include "./php/dbFunctionHtml.php";

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
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
            echo "Utilisateur connecté : " . $_SESSION["user"] . " - <a href='deconnexion.php'>Déconnexion</a>";
        }
        ?>
        <div id="divTab">
            <h1>Liste Utilisateur</h1>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Email</th>
                    <th>Pseudo</th>
                    <?php
                    if (isset($_REQUEST['idUserDelete'])) {
                        DeleteUtilisateur($_REQUEST['idUserDelete']);
                    }
                    if (isset($_REQUEST['id'])) {
                        echo "<th>Retour</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $id = $_REQUEST['id'];
                        CreeTableauDetail(DetailUtilisateur($id));
                    } else {
                        echo "<th>Détail</th></tr>";
                        CreeTableau(AfficheUtilisateurs());
                    }
                    ?>
            </table>
            <a href="./JourneeSportive.php">Journée Sportive</a>
        </div>
    </body>
</html>