<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modele/Saison.php";

class SaisonDAO
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
            self::$_instance = new SaisonDAO();
        }
        return self::$_instance;
    }
	
	function getSaison($idSaison)
	{
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM saison WHERE idSaison=:idSaison';
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSaison', $idSaison);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$saison = new Saison($result['idSaison'], $result['idSerie'], $result['numero'], $result['titre'], $result['titre_fr'], $result['image'], $result['fini']);
		
		return $saison;
	}
	
	function ajouterSaison($saison){
		$sql = "INSERT INTO saison (idSerie, numero, titre, titre_fr, image, fini)
			VALUES (:idSerie,:numero,:titre,:titre_fr,:image,:fini)";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $saison->getIdSerie());
		$stmt->bindParam(':numero', $saison->getNumero());
		$stmt->bindParam(':titre', $saison->getTitre());
		$stmt->bindParam(':titre_fr', $saison->getTitre_fr());
		$stmt->bindParam(':image', $saison->getImage());
		$stmt->bindParam(':fini', $saison->isFini());
		
		$stmt->execute();
		
		$saison->setId(self::$_connexion->lastInsertId());
	}
	
	function supprimerSaison($saison){
		$sql = 'DELETE FROM saison WHERE idSaison=:idSaison';
		$stmt = self::$_connexion->prepare($sql); 
		$stmt->bindParam(':idSaison', $saison->getId());
		$stmt->execute();
	}
	
	function modifierSaison($saison){
		$sql = 'UPDATE saison SET idSerie=:idSerie, numero=:numero, titre=:titre,
			titre_fr=:titre_fr, image=:image, fini=:fini WHERE idSaison=:idSaison';
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSaison', $saison->getId());
		$stmt->bindParam(':idSerie', $saison->getIdSerie());
		$stmt->bindParam(':numero', $saison->getNumero());
		$stmt->bindParam(':titre', $saison->getTitre());
		$stmt->bindParam(':titre_fr', $saison->getTitre_fr());
		$stmt->bindParam(':image', $saison->getImage());
		$stmt->bindParam(':fini', $saison->isFini());
		
		$stmt->execute();
	}
	
	function getSaisonsParSerie($idSerie){
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "Select idSaison, numero FROM saison WHERE idSerie = :idSerie ORDER BY numero";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $idSerie);
		$listeSaison = array();
		if ($stmt->execute()) {
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$saison = new Saison($result['idSaison'], $idSerie, $result['numero'], NULL, NULL, NULL, NULL);
				array_push($listeSaison, $saison);
			}
		}
		return $listeSaison;
	}
	
}

?>