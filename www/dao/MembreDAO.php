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
	
	function supprimerMembre($idMembre){
		
		$sql = 'DELETE FROM Membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
	}
	
	function modifierMembre($membre){
		
		$sql = 'UPDATE Membre SET courriel=:courriel WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':courriel', $membre->getCourriel());
		
		$stmt->execute();
		
	}
}

$membreDAO = new MembreDAO();

?>