<?php

class Membre {
	
	private $id;
	private $courriel;
	private $pseudonyme;
	private $motDePasse;
	private $notification;
	private $auteur;
	private $moderateur;
	private $dateCreation;
	
	
	function setPseudonyme($pseudonyme){
		filter_var($pseudonyme, FILTER_SANITIZE_STRING);
		$this->pseudonyme = $pseudonyme;
	}
	
	function getPseudonyme(){
		return $this->pseudonyme;
	}
	
	function setMotDePasse($motDePasse){
		filter_var($pseudonyme, FILTER_SANITIZE_STRING);
		$this->motDePasse = $motDePasse;
	}
	
	function getMotDePasse(){
		return $this->motDePasse;
	}
	
	function getNotification(){
		return $this->notification;
	}
	
	function setNotification($notification){
		$notification=filter_var($notification, FILTER_VALIDATE_BOOLEAN);
		$this->notification = $notification;
	}
	
	function getAuteur(){
		return $this->auteur;
	}
	
	function setAuteur($auteur){
		$auteur=filter_var($auteur, FILTER_VALIDATE_BOOLEAN);
		$this->auteur = $auteur;
	}
	
	function setModerateur($moderateur){
		$moderateur=filter_var($moderateur, FILTER_VALIDATE_BOOLEAN);
		$this->moderateur = $moderateur;
	}
	
	function getModerateur(){
		return $this->moderateur;
	}
	
	function setDateCreation($dateCreation){
		filter_var($pseudonyme, FILTER_SANITIZE_STRING);
		$this->id = $dateCreation;
	}
	
	function getDateCreation(){
		return $this->dateCreation;
	}
	
	function set_courriel($courriel){
		if(!filter_var($pseudonyme, FILTER_VALIDATE_EMAIL))
			$courriel=NULL;
		$this->courriel = $courriel;
	}
	
	function get_courriel(){
		return $this->courriel;
	}
	
	function set_id($id){
		filter_var($id, FILTER_VALIDATE_INT)
		$this->id = $id;
	}
	
	function get_id(){
		return $this->id;
	}

	public function __construct($id, $courriel, $pseudonyme, $motDePasse, $notification, $auteur, $moderateur, $dateCreation) {
		$this->setId($id);
		$this->setCourriel($courriel);
		$this->setPseudonyme($pseudonyme);
		$this->setMotDePasse($motDePasse);
		$this->setNotification($notification);
		$this->setAuteur=($auteur);
		$this->setModerateur($moderateur);
		$this->setDateCreation($dateCreation);
    }
}

?>