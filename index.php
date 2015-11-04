<?php
session_start();
include 'dbFunction.php';

if(isset($_SESSION['user'])) {
    header('Location: ./afficheUtilisateur.php');
}

if (isset($_REQUEST['login'])) {
    
    $userlogin = login($_REQUEST['pseudo'], $_REQUEST['mdp']);
    var_dump($userlogin);

    if ($userlogin != false) {
        $_SESSION['user'] = $_REQUEST['pseudo'];
        $_SESSION['estAdmin'] = $userlogin['estAdmin'];
        header('Location: ./afficheUtilisateur.php');
    }
    else {
        echo "<h2 style='font-size:165pt; color:red;'>LOGIN FAILED</h2>";
    }
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>
        <div id="login">
            <form action="#" method="post">
                <h1>Connexion</h1>
                <input class="decaler" type="text" placeholder="Pseudo" name="pseudo" />
                <br/><br/>
                <input class="decaler" type="password" placeholder="Mot de passe" name="mdp" />
                <br/><br/>
                <input class="decaler" type="submit" value="Connexion" name="login" />
                <br/>
                <a class="decaler" href="./formulaire.php">Inscription</a>
            </form>
        </div>
    </body>
</html>