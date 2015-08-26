<?php 

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
    <div id="divPrin">
        <h1>Formulaire</h1>
        <form method="post">
            Nom : <br/>
            <input type="text" name="Nom" required=""><br/>
            Prénom : <br/>
            <input type="text" name="Prenom" required=""><br/>
            Date de Naissance : <br/>
            <input type="date" name="date" required=""><br/>
            Email : <br/>
            <input type="email" name="email" required=""><br/>
            Pseudo : <br/>
            <input type="text" name="pseudo" required=""><br/>
            Mot de passe : <br/>
            <input type="password" name="password" required=""><br/>
            Description : <br/>
            <textarea rows="4" cols="50">Description</textarea><br/><br/>
            <input type="submit" name=".$_SESSION['submit']." valu=".$_SESSION['Sign-Up']."><input type="reset" name="Reset">
        </form> 
    </div>
</body>
</html>