<?php
function CreeTableau($tableau) {
    foreach ($tableau as $row) {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td><a href=./afficheUtilisateur.php?id=".$row[0].">[]</a></td>";
    } 
}

function CreeTableauDetail($tableau) {
    foreach ($tableau as $row) {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td><a href=./afficheUtilisateur.php>[]</a></td><td><a href=./formulaire.php?id=".$row[0].">[]</a></td>";
    } 
}

