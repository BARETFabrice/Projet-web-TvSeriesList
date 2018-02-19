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
		filter_var($motDePasse, FILTER_SANITIZE_STRING);
		$motDePasse=md5($motDePasse);
		$this->motDePasse = $motDePasse;
	}
	
	function getMotDePasse(){
		return $this->motDePasse;
	}
	
	function isNotification(){
	    if(!isset($this->notification))
	        return 1;
		return $this->notification;
	}
	
	function setNotification($notification){
		$notification=filter_var($notification, FILTER_VALIDATE_BOOLEAN);
		$this->notification = $notification;
	}
	
	function isAuteur(){
	    
	    if(!isset($this->auteur))
	        return 0;
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
	
	function isModerateur(){
	    if(!isset($this->moderateur))
	        return 0;
	   
		return $this->moderateur;
	}
	
	function setDateCreation($dateCreation){
		filter_var($dateCreation, FILTER_SANITIZE_STRING);
		$this->dateCreation = $dateCreation;
	}
	
	function getDateCreation(){
		return $this->dateCreation;
	}
	
	function setCourriel($courriel){
		if(!filter_var($courriel, FILTER_VALIDATE_EMAIL))
			$courriel=NULL;
		$this->courriel = $courriel;
	}
	
	function getCourriel(){
		return $this->courriel;
	}
	
	function setId($id){
		filter_var($id, FILTER_VALIDATE_INT);
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
    
    /*public function __construct($id, $courriel, $pseudonyme, $motDePasse, $notification, $auteur, $moderateur, $dateCreation) {
		$this->setId($id);
		$this->setCourriel($courriel);
		$this->setPseudonyme($pseudonyme);
		$this->setMotDePasse($motDePasse);
		$this->setNotification($notification);
		$this->setAuteur($auteur);
		$this->setModerateur($moderateur);
		$this->setDateCreation($dateCreation);
    }*/
	
	public function __construct($result=array()) {
	    if(isset($result['idMembre']))
		    $this->setId($result['idMembre']);
		if(isset($result['courriel']))
		    $this->setCourriel($result['courriel']);
		if(isset($result['pseudonyme']))
		    $this->setPseudonyme($result['pseudonyme']);
		if(isset($result['motDePasse']))
		    $this->setMotDePasse($result['motDePasse']);
	    if(isset($result['notification']))
	    	$this->setNotification($result['notification']);
	    if(isset($result['auteur']))
	    	$this->setAuteur($result['auteur']);
		if(isset($result['moderateur']))
		    $this->setModerateur($result['moderateur']);
		if(isset($result['dateCreation']))
		    $this->setDateCreation($result['dateCreation']);
    }
	
	/*public function __construct() {
		$this->id=null;
		$this->courriel=null;
		$this->pseudonyme=null;
		$this->motDePasse=null;
		$this->notification=null;
		$this->auteur=null;
		$this->moderateur=null;
		$this->dateCreation=null;
    }*/
}

?>