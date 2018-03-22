<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';

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
            self::$instance = new DonationDAO();
        }
        return self::$instance;
    }
	
	public function getDonation($idDonation) {
		$sql = 'SELECT * FROM Donation WHERE idMembre=:idMembre';
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
	
	public function ajouterDonation($don){
	    
		$sql = "INSERT INTO Donation (idMembre, montant)
			VALUES (:idMembre, :montant)";
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $don->getIdMembre());
		$stmt->bindParam(':montant', $don->getMontant());
		
		$stmt->execute();
	}
}

?>