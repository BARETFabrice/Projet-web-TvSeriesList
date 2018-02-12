<?php

require_once '../modele/Serie.php';

class SerieDAO
{
	private $connexion;
	
	function __construct(){
		require_once 'ConnexionBaseDeDonnees.php';
		$this->connexion=$connexion;
	}
	
	function __destruct() {
	$this->connexion=null;
	}
	
	function getSerie($idSerie)
	{
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM Serie WHERE idSerie=:idSerie';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $idSerie);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$serie = new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']);
		
		return $serie;
		
		//$serieDAO->getSerie(1)->getDescription(); pour utiliser
	}
	
	function ajouterSerie($serie){
		$sql = "INSERT INTO Serie (titre, titre_fr, description, description_fr, image, fini)
			VALUES (:titre,:titre_fr,:description,:description_fr,:image,:fini)";
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':titre', $serie->getTitre());
		$stmt->bindParam(':titre_fr', $serie->getTitre_fr());
		$stmt->bindParam(':description', $serie->getDescription());
		$stmt->bindParam(':description_fr', $serie->getDescription_fr());
		$stmt->bindParam(':image', $serie->getImage());
		$stmt->bindParam(':fini', $serie->isFini());
		
		$stmt->execute();
		
		$serie->setId($this->connexion->lastInsertId());
	}
	
	function supprimerSerie($serie){
		$sql = 'DELETE FROM Serie WHERE idSerie=:idSerie';
		$stmt = $this->connexion->prepare($sql); 
		$stmt->bindParam(':idSerie', $serie->getId());
		$stmt->execute();
	}
	
	function modifierSerie($serie){
		$sql = 'UPDATE Serie SET titre=:titre, titre_fr=:titre_fr, description=:description,
			description_fr=:description_fr, image=:image, fini=:fini WHERE idSerie=:idSerie';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $serie->getId());
		$stmt->bindParam(':titre', $serie->getTitre());
		$stmt->bindParam(':titre_fr', $serie->getTitre_fr());
		$stmt->bindParam(':description', $serie->getDescription());
		$stmt->bindParam(':description_fr', $serie->getDescription_fr());
		$stmt->bindParam(':image', $serie->getImage());
		$stmt->bindParam(':fini', $serie->isFini());
		
		$stmt->execute();
	}
	
	function getSerieLesPlusVue(){}
}

$serieDAO = new SerieDAO();

?>