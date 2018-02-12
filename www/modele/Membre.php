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
		$this->pseudonyme = $pseudonyme;
	}
	
	function getPseudonyme(){
		return $this->pseudonyme;
	}
	
	function setMotDePasse($motDePasse){
		$this->motDePasse = $motDePasse;
	}
	
	function getMotDePasse(){
		return $this->motDePasse;
	}
	
	function getNotification(){
		return $this->notification;
	}
	
	function setNotification($notification){
		$this->notification = $notification;
	}
	
	function getAuteur(){
		return $this->auteur;
	}
	
	function setAuteur($auteur){
		$this->auteur = $auteur;
	}
	
	function setModerateur($moderateur){
		$this->moderateur = $moderateur;
	}
	
	function getModerateur(){
		return $this->moderateur;
	}
	
	function setDateCreation($dateCreation){
		$this->id = $dateCreation;
	}
	
	function getDateCreation(){
		return $this->dateCreation;
	}
	
	function set_courriel($new_courriel){
		$this->courriel = $new_courriel;
	}
	
	function get_courriel(){
		return $this->courriel;
	}
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
	}

	public function __construct($id, $courriel, $pseudonyme, $motDePasse, $notification, $auteur, $moderateur, $dateCreation) {
		$this->id = $id;
		$this->courriel=$courriel;
		$this->pseudonyme = $pseudonyme;
		$this->motDePasse=$motDePasse;
		$this->notification = $notification;
		$this->auteur=$auteur;
		$this->moderateur = $moderateur;
		$this->dateCreation=$dateCreation;
    }
}

?>