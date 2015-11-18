<?php
session_start();
require_once "dbFunction.php";

if (isset($_SESSION['user'])) {
    if(isset($_REQUEST["id"])) {
        header('"Location:formulaire.php?id=$_REQUEST["id"]"');
    }
    else {
        header("Location:afficheUtilisateur.php");
    }
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
        <?php
            $id = "";
            $nom = isset($_REQUEST["nom"]) ? $_REQUEST["nom"] : "";
            $prenom = isset($_REQUEST["prenom"]) ? $_REQUEST["prenom"] : "";
            $date = isset($_REQUEST["date"]) ? $_REQUEST["date"] : "";
            $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
            $pseudo = isset($_REQUEST["pseudo"]) ? $_REQUEST["pseudo"] : "";
            $desc = isset($_REQUEST["desc"]) ? $_REQUEST["desc"] : "";
            
            if(isset($_REQUEST["id"]))
            {
                $Detail = DetailUtilisateur($_REQUEST["id"]);
                while ($row = $Detail->fetch()) {
                    $id = $_REQUEST["id"];
                    $nom = $row["Nom"];
                    $prenom = $row["Prenom"];
                    $date = $row["DateNaissance"];
                    $email = $row["Email"];
                    $pseudo = $row["Pseudo"];
                    $desc = $row["Description"];
                }
            }  
         
        if(isset($_SESSION['user'])) {
            echo "Utilisateur connecté : ".$_SESSION["user"]." - <a href='deconnexion.php'>Déconnexion</a>";    
        }
        
        $classe = getClasses();
        
        ?>
        <div id="divPrin">
            <h1>Formulaire</h1>
            <form action="#" method="post">               
                <label for="nom" >Nom : </label><br/>
                <input id="nom" type="text" name="nom" value="<?php echo $nom; ?>" required><br/>

                <label for="prenom" >Prénom : </label><br/>
                <input id="prenom" type="text" name="prenom" value="<?php echo $prenom; ?>" required><br/>

                <label for="dateNaiss" >Date de Naissance : </label><br/>
                <input id="dateNaiss" type="date" name="date" value="<?php echo $date; ?>" required><br/>

                <label for="email" >Email : </label><br/>
                <input id="email" type="email" name="email" value="<?php echo $email; ?>" required><br/>
                
                <label for="classe" >Classe : </label><br/>
                <select name="classe">
                    <?php
                        foreach ($classe as $c){
                            echo "<option value=".$c[0].">$c[1]</option>";
                        }
                    ?>
                </select><br/>

                <label for="pseudo" >Pseudo : </label><br/>
                <input id="pseudo" type="text" name="pseudo" value="<?php echo $pseudo; ?>" required><br/>

                <label for="Mdp" >Mot de passe : </label><br/>
                <input id="Mdp" type="password" name="mdp" required placeholder="<?php if(isset($_REQUEST["id"])) { echo "Will change if empty"; } ?>"><br/>

                <label for="Desc" >Description : </label><br/>
                <textarea id="Desc" rows="4" cols="50" value="<?php echo $desc; ?>" placeholder="Ce champs n'est pas obligatoire !"></textarea><br/><br/>
                
                <?php if(isset($_REQUEST["id"])) { ?>
                <input type="submit" value="update" name="update">
                
                <?php } else { ?>
                <input type="submit" value="submit" name="submit">
                <?php } ?>
                
                <input type="reset" name="Reset">
                <input type="hidden" value="<?php echo $id ?>" name="idUser"/>
                <br/>
                <?php if(!isset($_SESSION['user'])) { ?>
                <a href="index.php">Connexion</a>
                <?php } else { ?> 
                 <a href="afficheUtilisateur.php">Affiche Utilisateur</a>
                <?php } ?>
            </form> 
        </div>
    </body>
</html>