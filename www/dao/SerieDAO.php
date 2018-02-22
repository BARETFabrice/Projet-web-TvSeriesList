<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modele/Serie.php";

class SerieDAO
{
	private static $_instance;
	private static $_connexion;
	
	function __construct(){
		require 'ConnexionBaseDeDonnees.php';
		self::$_connexion=$connexion;
	}
	
	function __destruct() {
	$this->connexion=null;
	}
	
	public static function getInstance()
    {
        if ((self::$_instance) == null) 
        {
            self::$_instance = new SerieDAO();
        }
        return self::$_instance;
    }
	
	function getSerie($idSerie)
	{
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM serie WHERE idSerie=:idSerie';
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $idSerie);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$serie = new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']);
		
		return $serie;
		
		//$serieDAO->getSerie(1)->getDescription(); pour utiliser
	}
	
	function ajouterSerie($serie){
		$sql = "INSERT INTO serie (titre, titre_fr, description, description_fr, image, fini)
			VALUES (:titre,:titre_fr,:description,:description_fr, NULL,:fini)";
		$stmt = self::$_connexion->prepare($sql); 
		
		$idSerie = $serie->getId();
		$titre = $serie->getTitre();
		$titre_fr = $serie->getTitre_fr();
		$description = $serie->getDescription();
		$description_fr = $serie->getDescription_fr();
		//$image = $serie->getImage();
		$fini = $serie->isFini();
		
		$stmt->bindParam(':idSerie', $idSerie);
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':titre_fr', $titre_fr);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':description_fr', $description_fr);
		//$stmt->bindParam(':image', $serie->getImage());
		$stmt->bindParam(':fini', $fini);
		
		$stmt->execute();
		
		$serie->setId(self::$_connexion->lastInsertId());
	}
	
	function supprimerSerie($id){
		$sql = 'DELETE FROM serie WHERE idSerie=:idSerie';
		$stmt = self::$_connexion->prepare($sql); 
		$stmt->bindParam(':idSerie', $id);
		$stmt->execute();
	}
	
	function modifierSerie($serie){
		$sql = 'UPDATE serie SET titre=:titre, titre_fr=:titre_fr, description=:description,
			description_fr=:description_fr, fini=:fini WHERE idSerie=:idSerie';
		$stmt = self::$_connexion->prepare($sql); 
		
		$idSerie = $serie->getId();
		$titre = $serie->getTitre();
		$titre_fr = $serie->getTitre_fr();
		$description = $serie->getDescription();
		$description_fr = $serie->getDescription_fr();
		//$image = $serie->getImage();
		$fini = $serie->isFini();
		
		
		$stmt->bindParam(':idSerie', $idSerie);
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':titre_fr', $titre_fr);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':description_fr', $description_fr);
		//$stmt->bindParam(':image', $serie->getImage());
		$stmt->bindParam(':fini', $fini);
		
		$stmt->execute();
	}
	
	function rechercherSerie($recherche){
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//SÉCURISER RECHERCHE ET IMPORTER SEULEMENT TITRE ET ID
		$sql = "SELECT idSerie, titre FROM serie WHERE titre LIKE '%$recherche%'";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':recherche', $recherche);
		$listeSerie = array();
		if ($stmt->execute()) {
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$serie = new Serie($result['idSerie'], $result['titre'], NULL, NULL, NULL, NULL, NULL);
				array_push($listeSerie, $serie);
			}
		}
		return $listeSerie;
	}
	
}

?>