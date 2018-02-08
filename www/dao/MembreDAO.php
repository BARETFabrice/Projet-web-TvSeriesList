<?php

class MembreDAO
{
	private $nomTable='Membre';
	private $connexion;
	private $Membre;
	
	function __construct(){
		require_once '../modele/Membre.php';
		$this->Membre=$Membre;
		
		require_once 'ConnexionBaseDeDonnees.php';
		$this->connexion=$connexion;
	}
	
	 function __destruct() {
        $this->connexion=null;
	 }
	
	function getMembre($idMembre) {
		
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Membre WHERE idMembre=:idMembre";
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		
		$stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		print_r($result);
	}
}

$membreDAO = new MembreDAO();
$membreDAO->getMembre(2);

?>