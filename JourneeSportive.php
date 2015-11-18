<?php
session_start();
require_once "dbFunction.php";

if (!isset($_SESSION['user'])) {
    header("Location:index.php");
}

$sport1 = getSports();
$sport2 = getSports();
$sport3 = getSports();
$sport4 = getSports();

if (isset($_REQUEST["Sports"])) {
    choix($idSport, $id, $Ordre);
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Choix Sports</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="divPrin">
            <h1>Choix du Sports</h1>
            <form action="#" method="post">               
                <label for="sport1" >Choix 1 : </label><br/>
                <select name="sport1">
                    <?php
                    foreach ($sport1 as $s1) {
                        echo "<option value=" . $s1[0] . ">$s1[1]</option>";
                    }
                    ?>
                </select><br/>

                <label for="sport2" >Choix 2 : </label><br/>
                <select name="sport2">
                    <?php
                    foreach ($sport2 as $s2) {
                        echo "<option value=" . $s2[0] . ">$s2[1]</option>";
                    }
                    ?>
                </select><br/>

                <label for="sport3" >Choix 3 : </label><br/>
                <select name="sport3">
                    <?php
                    foreach ($sport3 as $s3) {
                        echo "<option value=" . $s3[0] . ">$s3[1]</option>";
                    }
                    ?>
                </select><br/>

                <label for="sport4" >Choix 4 : </label><br/>
                <select name="sport4">
                    <?php
                    foreach ($sport4 as $s4) {
                        echo "<option value=" . $s4[0] . ">$s4[1]</option>";
                    }
                    ?>
                </select><br/><br/>

                <input type="submit" value="submit" name="Sports">

                <input type="reset" name="Reset">
                <br/><br/>
                <a href="afficheUtilisateur.php">Affiche Utilisateur</a>
            </form> 
        </div>
    </body>
</html>

