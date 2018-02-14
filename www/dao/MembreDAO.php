<?php

require_once '../modele/Membre.php';

class MembreDAO
{
	//private $nomTable='Membre';
	private $connexion;
	
	function __construct(){
		require_once 'ConnexionBaseDeDonnees.php';
		$this->connexion=$connexion;
	}
	
	 function __destruct() {
        $this->connexion=null;
	 }
	
	function getMembre($idMembre) {
		$sql = 'SELECT * FROM Membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membre = new Membre($result);
		
		return $membre;
	}         
	
	function ajouterMembre(&$membre){
		$sql = "INSERT INTO Membre (courriel, pseudonyme, motDePasse, notification, auteur, moderateur)
			VALUES (':courriel',':pseudonyme',':motDePasse',':notification',':auteur',':moderateur')";
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':motDePasse', $membre->getMotDePasse());
		$stmt->bindParam(':notification', $membre->getNotification());
		$stmt->bindParam(':auteur', $membre->getAuteur());
		$stmt->bindParam(':moderateur', $membre->getModerateur());
		
		$stmt->execute();
		
		$membre->setId($this->connexion->lastInsertId());
		$membre->setDateCreation(time());
	}
	
	function supprimerMembre($membre){
		
		$sql = 'DELETE FROM Membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
	}
	
	function modifierMembre($membre){
		
		$sql = 'UPDATE Membre SET courriel=:courriel, pseudonyme=:pseudonyme, motDePasse=:motDePasse,
			notification=:notification, auteur=:auteur, moderateur=:moderateur
			WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':motDePasse', $membre->getMotDePasse());
		$stmt->bindParam(':notification', $membre->getNotification());
		$stmt->bindParam(':auteur', $membre->getAuteur());
		$stmt->bindParam(':moderateur', $membre->getModerateur());
		
		$stmt->execute();
		
	}
}

$membreDAO = new MembreDAO();

?>