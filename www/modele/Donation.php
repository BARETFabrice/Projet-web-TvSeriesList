<?php

class Donation {
	
	private $id;
	private $idMembre;
	private $montant;
	private $date;
	
	private $gestionErreur;
	
	private function lancerErreur($e)
	{
	    if($this->gestionErreur)
	        throw new Exception($e);
	}
	
	public function setGestionErreur($gestion)
	{
	    $this->gestionErreur=$gestion;
	}
	
	function setDate($dateCreation){
		filter_var($dateCreation, FILTER_SANITIZE_STRING);
		$this->date = $dateCreation;
	}
	
	function getDate(){
		return $this->date;
	}
	
	function getMontant(){
		return $this->montant;
	}
	
	function setMontant($m){
	    filter_var($m, FILTER_VALIDATE_INT);
		$this->montant=$m;
	}
	
	function setIdMembre($id){
		$this->idMembre = $id;
	}
	
	function getIdMembre(){
		return $this->idMembre;
	}
	
	function setId($id){
		filter_var($id, FILTER_VALIDATE_INT);
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
public function __construct($result=null, $gestionErreur=false) {
	    
	    $this->setGestionErreur($gestionErreur);
	    
	    if($result!==null)
	    {
	        $this->setId($result['idDonation']);
	        $this->setIdMembre($result['idMembre']);
	        $this->setMontant($result['montant']);
	        $this->setDate($result['date']);
	    }
    }
}

?>