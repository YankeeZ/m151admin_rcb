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
        <form action="dbFunction.php" method="post">
            <label for="nom" >Nom : </label><br/>
            <input id="nom" type="text" name="nom" required><br/>
            
            <label for="prenom" >Prénom : </label><br/>
            <input id="prenom" type="text" name="prenom" required><br/>
            
            <label for="dateNaiss" >Date de Naissance : </label><br/>
            <input id="dateNaiss" type="date" name="date" required><br/>
            
            <label for="email" >Email : </label><br/>
            <input id="email" type="email" name="email" required><br/>
            
            <label for="pseudo" >Pseudo : </label><br/>
            <input id="pseudo" type="text" name="pseudo" required><br/>
            
            <label for="Mdp" >Mot de passe : </label><br/>
            <input id="Mdp" type="password" name="mdp" required><br/>
            
            <label for="Desc" >Description : </label><br/>
            <textarea id="Desc" rows="4" cols="50">Description</textarea><br/><br/>
            
            <input type="submit" name="submit"><input type="reset" name="Reset">
        </form> 
    </div>
</body>
</html>