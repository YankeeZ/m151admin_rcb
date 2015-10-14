<?php
require_once "dbFunction.php";
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Formulaire</title>
        <link rel="stylesheet" href="css.css">
        <script src="script.js"></script>
    </head>
    <body>
        <?php
            $id = "";
            $nom = "";
            $prenom = "";
            $date = "";
            $email = "";
            $pseudo = "";
            $desc = "";     
            if(isset($_REQUEST["id"]))
            {
                $update = DetailUtilisateur($_REQUEST["id"]);
                while ($row = $update->fetch()) {
                    $id = $row["idUser"];
                    $nom = $row["Nom"];
                    $prenom = $row["Prenom"];
                    $date = $row["DateNaissance"];
                    $email = $row["Email"];
                    $pseudo = $row["Pseudo"];
                    $desc = $row["Description"];
                }
            }
                         
        ?>
        <div id="divPrin">
            <h1>Formulaire</h1>
            <form action="afficheUtilisateur.php" method="post">               
                <label for="nom" >Nom : </label><br/>
                <input id="nom" type="text" name="nom" value="<?php echo $nom; ?>" required><br/>

                <label for="prenom" >Prénom : </label><br/>
                <input id="prenom" type="text" name="prenom" value="<?php echo $prenom; ?>" required><br/>

                <label for="dateNaiss" >Date de Naissance : </label><br/>
                <input id="dateNaiss" type="date" name="date" value="<?php echo $date; ?>" required><br/>

                <label for="email" >Email : </label><br/>
                <input id="email" type="email" name="email" value="<?php echo $email; ?>" required><br/>

                <label for="pseudo" >Pseudo : </label><br/>
                <input id="pseudo" type="text" name="pseudo" value="<?php echo $pseudo; ?>" required><br/>

                <label for="Mdp" >Mot de passe : </label><br/>
                <input id="Mdp" type="password" name="mdp" ><br/>

                <label for="Desc" >Description : </label><br/>
                <textarea id="Desc" rows="4" cols="50" value="<?php echo $pseudo; ?>" placeholder="Ce champs n'est pas obligatoire !"></textarea><br/><br/>
                <input type="submit" name="submit"><input type="reset" name="Reset">
                <input type="hidden" value="<?= $id ?>" name="idUser"/>
                <a href="afficheUtilisateur.php">Liste Utilisateurs</a>
            </form> 
        </div>
    </body>
</html>