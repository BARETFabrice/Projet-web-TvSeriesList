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
		$membre = new Membre($result['idMembre'], $result['courriel'], $result['pseudonyme'],
			$result['motDePasse'], $result['notification'], $result['auteur'],
			$result['moderateur'], $result['dateCreation']);
		
		return $membre;
	}         
	
	function ajouterMembre($membre){}
	
	function supprimerMembre($membre){
		
		$sql = 'DELETE FROM Membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
	}
	
	function modifierMembre($membre){
		
		$sql = 'UPDATE Membre SET courriel=:courriel, pseudonyme=:pseudonyme, motDePasse=:motDePasse,
			notification=:notification, auteur=:auteur, moderateur=:moderateur, dateCreation=:dateCreation
			WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':motDePasse', $membre->getMotDePasse());
		$stmt->bindParam(':notification', $membre->getNotification());
		$stmt->bindParam(':auteur', $membre->getAuteur());
		$stmt->bindParam(':moderateur', $membre->getModerateur());
		$stmt->bindParam(':dateCreation', $membre->getDateCreation());
		
		$stmt->execute();
		
	}
}

$membreDAO = new MembreDAO();

?>