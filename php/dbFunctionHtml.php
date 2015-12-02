<?php

function CreeTableau($tableau) {
    foreach ($tableau as $row) {
        echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td><a href=./afficheUtilisateur.php?id=" . $row[0] . ">[]</a></td>";
    }
}

function CreeTableauDetail($tableau) {
    $adminInfo = estAdmin($_SESSION['user']);
    foreach ($tableau as $row) {

        $html = "";
        $html .= "<tr>";
        $html .= "<td>" . $row[0] . "</td>";
        $html .= "<td>" . $row[1] . "</td>";
        $html .= "<td>" . $row[2] . "</td>";
        $html .= "<td>" . $row[3] . "</td>";
        $html .= "<td>" . $row[4] . "</td>";
        $html .= "<td>" . $row[5] . "</td>";
        $html .= "<td><a href=./afficheUtilisateur.php>[]</a></td>";

        if ($adminInfo != false || $_SESSION['user'] == $row[5]) {
            $html .= "<td><a href=./formulaire.php?id=" . $row[0] . ">[]</a></td>";
            $html .= "<td><a href=./afficheUtilisateur.php?idUserDelete=" . $row[0] . ">[]</a></td>";
        }
        echo $html;
    }
}

function ChoixSports($sport) {
    for ($i = 1; $i <= 4; $i++) {
        $html = "";
        $html .= "<label for='choix$i' >Choix $i : </label><br/>";
        $html .= "<select name='choix$i'>";

        foreach ($sport as $s) {
            $html .= "<option name='sport' value='$s[0]'>$s[1]</option>";
        }
        $html .= "</select><br/>";
        echo $html;
    }
}

function AfficheSports($Sports) {
    foreach ($Sports as $S) {
        if($S['inactifs'] === 0){$check = "checked";}
        $html = "";
        $html .= "<tr>";
        $html .= "<td>" . $S['Label'] . "</td>";
        $html .= "<td><a>[]</a></td>";
        $html .= "<td><input type='checkbox'". $check."></td>";
        $html .= "</tr>";
        echo $html;
    }
}
