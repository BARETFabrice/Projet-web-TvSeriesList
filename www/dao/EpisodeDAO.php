<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modele/Episode.php";

class EpisodeDAO
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
            self::$_instance = new EpisodeDAO();
        }
        return self::$_instance;
    }
	
	function getEpisode($idEpisode)
	{
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM episode WHERE idEpisode=:idEpisode';
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idEpisode', $idEpisode);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$episode = new Episode($result['idEpisode'], $result['idSaison'], $result['numero'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['datePremiere']);
		
		return $episode;
		
	}
	
	function ajouterEpisode($episode){
		$sql = "INSERT INTO episode (idSaison, numero, titre, titre_fr, description, description_fr, datePremiere)
			VALUES (:idSaison,:numero,:titre,:titre_fr,:description,:description_fr, datePremiere)";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSaison', $episode->getId());
		$stmt->bindParam(':numero', $episode->getNumero());
		$stmt->bindParam(':titre', $episode->getTitre());
		$stmt->bindParam(':titre_fr', $episode->getTitre_fr());
		$stmt->bindParam(':description', $episode->getDescription());
		$stmt->bindParam(':description_fr', $episode->getDescription_fr());
		$stmt->bindParam(':datePremiere', $episode->getDatePremiere());
		
		$stmt->execute();
		
		$episode->setId(self::$_connexion->lastInsertId());
	}
	
	function supprimerEpisode($id){
		$sql = 'DELETE FROM episode WHERE idEpisode=:idEpisode';
		$stmt = self::$_connexion->prepare($sql); 
		$stmt->bindParam(':idEpisode', $id);
		$stmt->execute();
	}
	
	function modifierEpisode($episode){
		$sql = 'UPDATE episode SET idSaison=:idSaison, numero=:numero, titre_fr=:titre_fr, description=:description, description_fr=:description_fr, datePremiere=:datePremiere WHERE idEpisode=:idEpisode';
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idEpisode', $episode->getId());
		$stmt->bindParam(':idSaison', $episode->getIdSaison());
		$stmt->bindParam(':numero', $episode->getNumero());
		$stmt->bindParam(':titre', $episode->getTitre());
		$stmt->bindParam(':titre_fr', $episode->getTitre_fr());
		$stmt->bindParam(':description', $episode->getDescription());
		$stmt->bindParam(':description_fr', $episode->getDescription_fr());
		$stmt->bindParam(':datePremiere', $episode->getDatePremiere());
		
		$stmt->execute();
	}
}

?>