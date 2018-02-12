<?php

$hote='localhost';
$nomBaseDonnee = 'alexsiro_tvserieslist';
$nom = 'alexsiro_tvserieslist_accesseur';
$motDePasse = 'iC39PfpAF+{x';

try {
	$connexion = new PDO("mysql:host=$hote;dbname=$nomBaseDonnee", $nom, $motDePasse);
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>