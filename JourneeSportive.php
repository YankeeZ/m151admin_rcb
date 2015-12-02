<?php
session_start();
require_once "./php/dbFunction.php";

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}

$sport = getSports();

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
                for ($i = 1; $i <= 4; $i++) {
                    echo "<label for='choix$i' >Choix $i : </label><br/>";
                    echo "<select name='choix$i'>";

                    foreach ($sport as $s) {
                        echo "<option name='sport' value='$s[0]'>$s[1]</option>";
                    }
                    echo "</select><br/>";
                }
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

