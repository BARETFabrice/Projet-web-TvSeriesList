<?php

$hote='localhost';
$nomBaseDonnee = 'alexsiro_tvserieslist';
$nom = 'alexsiro_tvserieslist_accesseur';
$motDePasse = 'iC39PfpAF+{x';

try {
	$connexion = new PDO("mysql:host=$hote;dbname=$nomBaseDonnee;charset=utf8", $nom, $motDePasse,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	
} 
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>