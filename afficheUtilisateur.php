<?php
include "dbFunction.php";
include "dbFunctionHtml.php";
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste Utilisateurs</title>
  <link rel="stylesheet" href="css.css">
  <script src="script.js"></script>
</head>
<body>
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
        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            echo "<th>Mot de passe</th><th>Retour</th><th>Modifier</th></tr>";
            CreeTableauDetail(DetailUtilisateur($id));
        }
        else {
            echo "<th>Détail</th></tr>";
            CreeTableau(AfficheUtilisateurs());
        }
        ?>
        </table>
        <a href="./formulaire.php">Inscription</a>
    </div>
</body>
</html>