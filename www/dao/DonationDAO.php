<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';

class DonationDAO
{
	private static $instance;
	private $connexion;
	private $listeDonation;
	
	function __construct()
	{
		$listeDonation = [];

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
		$sql = 'SELECT * FROM Donation WHERE idDonation=:idDonation';
		$stmt = $this->connexion->prepare($sql);

		$stmt->bindParam(':idDonation', $idDonation);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$donation = new Donation($result);
		
		return $donation;
	}
	
	public function getListeDonation()
	{
		$listeDonation = [];

		$sql = 'SELECT * FROM Donation ORDER BY idDonation DESC LIMIT 10';
		$stmt = $this->connexion->prepare($sql);
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($results as $result)
		{
			array_push($listeDonation, new Donation($result));
		}
		//var_dump($listeDonation);

		return $listeDonation;
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