<?php

// informations concernant la base de données
$DbHost = "127.0.0.1"; // Adresse
$DbName = "rentree"; // Nom de la base
$DbUser = "user"; // Nom d'utilisateur
$DbPassword = "user"; // Mot de passe utilisateur

$db = new mysqli($DbHost,  $DbUser,  $DbPassword, $DbName);
$db->query("SET NAMES 'utf8'");

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>