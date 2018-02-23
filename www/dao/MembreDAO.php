<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class MembreDAO
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
            self::$_instance = new MembreDAO();
        }
        return self::$_instance;
    }
	
	function getMembre($idMembre) {
		$sql = 'SELECT * FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membre = new Membre($result);
		
		return $membre;
	}
	
	function connecterMembre(){
	    
	}
	
	function ajouterMembre($membre){
	    
		$sql = "INSERT INTO membre (courriel, pseudonyme, motDePasse, notification, auteur, moderateur)
			VALUES (:courriel,:pseudonyme,:motDePasse,:notification,:auteur,:moderateur)";
		$stmt = $this->connexion->prepare($sql); 
		
		
		//$stmt->bindParam(':nomTable', $this->nomTable);
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':motDePasse', $membre->getMotDePasse());
		$stmt->bindParam(':notification', $membre->isNotification());
		$stmt->bindParam(':auteur', $membre->isAuteur());
		$stmt->bindParam(':moderateur', $membre->isModerateur());
		
		$stmt->execute();
		
		$membre->setId($this->connexion->lastInsertId());
		$membre->setDateCreation(time());
	}
	
	function supprimerMembre($membre){
		
		$sql = 'DELETE FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
	}
	
	function modifierMembre($membre){
		
		$sql = 'UPDATE membre SET courriel=:courriel, pseudonyme=:pseudonyme, motDePasse=:motDePasse,
			notification=:notification, auteur=:auteur, moderateur=:moderateur
			WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':motDePasse', $membre->getMotDePasse());
		$stmt->bindParam(':notification', $membre->isNotification());
		$stmt->bindParam(':auteur', $membre->isAuteur());
		$stmt->bindParam(':moderateur', $membre->isModerateur());
		
		$stmt->execute();
		
	}
	
	function rechercherMembre($recherche){
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT idMembre, pseudonyme FROM membre WHERE titre LIKE '%$recherche%' LIMIT 50";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':recherche', $recherche);
		$listeMembre = array();
		if ($stmt->execute()) {
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$membre = new Membre($result);
				array_push($listeMembre, $membre);
			}
		}
		return $listeMembre;
	}
}

?>