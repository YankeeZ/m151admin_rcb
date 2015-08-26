<?php

require_once './mysqlinc.php';

function ConnexionBDD($DBNAME, $HOST, $USER, $PASSWORD) {
    try {
        $dbh = new PDO('mysql:dbname=' . $DBNAME . ';host=' . $HOST . '', $USER, $PASSWORD);
    } catch (Exception $e) {
        echo "Connexion à MySQL impossible : ", $e->getMessage();
        die();
    }
    return $dbh;
}

function CreeUtilisateur() {
    if (isset($_SESSION['submit']) && $_SESSION['submit'] == 'Sign-Up') {
        $Password = FILTER_INPUT(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);
        $cpass = FILTER_INPUT(INPUT_POST, 'cpass', FILTER_SANITIZE_STRING);

        if ($Password == $cpass) {
            $req = $dbh->prepare("Select * FROM userlogin WHERE Pseudo=:user");
            $req->bindParam(':user', $login, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            if ($result == NULL) {
                $Username = FILTER_INPUT(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
                $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $date = FILTER_INPUT(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
                $fname = FILTER_INPUT(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
                $name = FILTER_INPUT(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

                //Nous cryptons le mot de passe.
                $Password = sha1(md5($Password));

                $req = $dbh->prepare("INSERT INTO userlogin VALUES('',:username,:password,:name,:fname,'',:date,:email)");
                $req->bindParam(':username', $Username, PDO::PARAM_STR);
                $req->bindParam(':password', $Password, PDO::PARAM_STR);
                $req->bindParam(':name', $name, PDO::PARAM_STR);
                $req->bindParam(':fname', $fname, PDO::PARAM_STR);
                $req->bindParam(':date', $date, PDO::PARAM_STR);
                $req->bindParam(':email', $email, PDO::PARAM_STR);
                $req->execute();

                $_SESSION['Login'] = $_POST['Login']; // Son Login
                header('Location:Utilisateur.php');
            } else if ($Username == $Username) {
                echo "<td class='error'>L'identifiant existe déjà !</td>";
            }
        }
    }
}
