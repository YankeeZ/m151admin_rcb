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
            
          if($adminInfo != false || $_SESSION['user'] == $row[5]) {
            $html .= "<td><a href=./formulaire.php?id=" . $row[0] . ">[]</a></td>";
            $html .= "<td><a href=./afficheUtilisateur.php?idUserDelete=" . $row[0] . ">[]</a></td>";
          }
            echo $html;
        
       
       
    }
}
