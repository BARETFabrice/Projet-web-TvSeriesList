<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class MembreDAO
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
	
	public function getMembre($idMembre) {
		$sql = 'SELECT * FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $idMembre);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membre = new Membre($result);
		
		return $membre;
	}
	
	public function connecterMembre($membre){
	    
	    $pseudonyme=$membre->getPseudonyme();
	    $motDePasse=$membre->getMotDePasse();
	    
	    $sql = 'SELECT * FROM membre WHERE pseudonyme=:pseudonyme';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':pseudonyme', $pseudonyme);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$membreTest = new Membre($result);
		
		if($membreTest->getMotDePasse() == $membre->getMotDePasse())
		    return $membreTest;
		
		return null;
	}
	
	public function ajouterMembre(&$membre){
	    
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
	
	public function supprimerMembre($id){
		
		$sql = 'DELETE FROM membre WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $id);
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
	}
	
	public function verifierDoublonCourriel($membre)
	{
	    $sql = 'SELECT idMembre FROM membre WHERE courriel=:courriel';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':courriel', $membre->getCourriel());
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(!$result)
		    return true;
		else
		    return false;
	}
	
	public function verifierDoublonPseudonyme($membre)
	{
	    $sql = 'SELECT idMembre FROM membre WHERE pseudonyme=:pseudonyme';
		$stmt = $this->connexion->prepare($sql); 

		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		//$stmt->bindParam(':nomTable', $this->nomTable);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		if(!$result)
		    return true;
		else
		    return false;
	}
	
	public function modifierMembre($membre){
		
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
	
	public function modifierMembreSansMotDePasse($membre){
	    
		$sql = 'UPDATE membre SET courriel=:courriel, pseudonyme=:pseudonyme,
			notification=:notification, auteur=:auteur, moderateur=:moderateur
			WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $membre->getId());
		$stmt->bindParam(':courriel', $membre->getCourriel());
		$stmt->bindParam(':pseudonyme', $membre->getPseudonyme());
		$stmt->bindParam(':notification', $membre->isNotification());
		$stmt->bindParam(':auteur', $membre->isAuteur());
		$stmt->bindParam(':moderateur', $membre->isModerateur());
		
		$stmt->execute();
		
	}
	
	public function modifierNotification($id, $valeur)
	{
		$sql = 'UPDATE membre SET notification=:notification WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $id);
		$stmt->bindParam(':notification', $valeur);
		
		$stmt->execute();
	}
	
	public function modifierNom($id, $valeur)
	{
		$sql = 'UPDATE membre SET pseudonyme=:pseudonyme WHERE idMembre=:idMembre';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idMembre', $id);
		$stmt->bindParam(':pseudonyme', $valeur);
		
		$stmt->execute();
	}
	
	public function rechercherMembre($recherche){
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT idMembre, pseudonyme FROM membre WHERE pseudonyme LIKE '%$recherche%' LIMIT 50";
		$stmt = $this->connexion->prepare($sql); 
		
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