<?php
$nom = FILTER_INPUT(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
$prenom = FILTER_INPUT(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
$date = FILTER_INPUT(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
$email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$pseudo = FILTER_INPUT(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
$mdp = FILTER_INPUT(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
$description = FILTER_INPUT(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$id = FILTER_INPUT(INPUT_POST, 'idUser', FILTER_SANITIZE_STRING);

$classe = FILTER_INPUT(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);
$sport = FILTER_INPUT(INPUT_POST, 'sport', FILTER_SANITIZE_STRING);
$choix1 = FILTER_INPUT(INPUT_POST, 'choix1', FILTER_SANITIZE_STRING);
$choix2 = FILTER_INPUT(INPUT_POST, 'choix2', FILTER_SANITIZE_STRING);
$choix3 = FILTER_INPUT(INPUT_POST, 'choix3', FILTER_SANITIZE_STRING);
$choix4 = FILTER_INPUT(INPUT_POST, 'choix4', FILTER_SANITIZE_STRING);

