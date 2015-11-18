<?php
session_start();
require_once "dbFunction.php";

if (!isset($_SESSION['user'])) {
        header("Location:index.php");
    }
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="divPrin">
            <h1>Formulaire</h1>
            <form action="#" method="post">               
                <label for="nom" >Choix 1 : </label><br/>
                <input id="nom" type="text" name="nom" value="<?php echo $nom; ?>" required><br/>

                <label for="prenom" >Choix 2 : </label><br/>
                <input id="prenom" type="text" name="prenom" value="<?php echo $prenom; ?>" required><br/>

                <label for="dateNaiss" >Choix 3 : </label><br/>
                <input id="dateNaiss" type="date" name="date" value="<?php echo $date; ?>" required><br/>

                <label for="email" >Choix 4 : </label><br/>
                <input id="email" type="email" name="email" value="<?php echo $email; ?>" required><br/>
                
                <input type="submit" value="submit" name="submit">
                
                <input type="reset" name="Reset">
                <br/>
                 <a href="afficheUtilisateur.php">Affiche Utilisateur</a>
            </form> 
        </div>
    </body>
</html>

