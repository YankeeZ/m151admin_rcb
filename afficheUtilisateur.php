<?php
include "dbFunction.php";
include "dbFunctionHtml.php";
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Liste Utilisateur</title>
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
            </tr>
        <?php
            CreeTableau(getAfficheUtilisateur());
        ?>
        </table>
        
    </div>
</body>
</html>