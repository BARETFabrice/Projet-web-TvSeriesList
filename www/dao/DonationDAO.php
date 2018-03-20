<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class DonationDAO
{
	private static $instance;
	private $connexion;
	
	function __construct(){
		require 'ConnexionBaseDeDonnees.php';
		$this->connexion=$connexion;
	}
	
	function __destruct() {
	$this->connexion=null;
	}
	
	public static function getInstance()
    {
        if ((self::$instance) == null) 
        {
            self::$instance = new MembreDAO();
        }
        return self::$instance;
    }
	
	public function getDonation($idDonation) {
		$sql = 'SELECT * FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membre = new Membre($result);
		
		return $membre;
	}
	
	public function getListeDonation($idDonation) {
		$sql = 'SELECT * FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membre = new Membre($result);
		
		return $membre;
	}
	
	public function ajouterDonation($membre){
	    
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
}

?>