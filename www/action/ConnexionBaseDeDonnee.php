<?php

$hote='localhost';
$nomBaseDonnee = 'alexsiro_tvserieslist';
$nom = 'alexsiro_tvserieslist_accesseur';
$motDePasse = 'iC39PfpAF+{x';

$connexion = new PDO("mysql:host=$hote;dbname=$nomBaseDonnee", $nom, $motDePasse);

?>