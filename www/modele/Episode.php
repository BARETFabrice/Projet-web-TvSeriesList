<?php

class Episode {
	
	private $id;
	private $idSaison;
	private $numero;
	private $titre;
	private $titre_fr;
	private $description;
	private $description_fr;
	private $datePremiere;
	
	public function __construct($id, $idSaison, $numero, $titre, $titre_fr, $description, $description_fr, $datePremiere) {
		$this->setId($id);
		$this->setIdSaison($idSaison);
		$this->setNumero($numero);
		$this->setTitre($titre);
		$this->setTitre_fr($titre_fr);
		$this->setDescription($description);
		$this->setDescription_fr($description_fr);
		$this->setFini($fini);
    }
	
	function setId($id){
		$this->id = filter_var($id, FILTER_VALIDATE_INT);
	}
	
	function getId(){
		return $this->id;
	}
	
	function setIdSaison($idSaison){
		$this->idSaison = filter_var($idSaison, FILTER_VALIDATE_INT);
	}
	
	function getIdSaison(){
		return $this->idSaison;
	}
	
	function setNumero($numero){
		$this->numero = filter_var($numero, FILTER_VALIDATE_INT);
	}
	
	function getNumero(){
		return $this->numero;
	}
	
	function setTitre($titre){
		$this->titre = filter_var($titre, FILTER_SANITIZE_STRING);
	}
	
	function getTitre(){
		return $this->titre;
	}
	
	function setTitre_fr($titre_fr){
		$this->titre_fr = filter_var($titre_fr, FILTER_SANITIZE_STRING);
	}
	
	function getTitre_fr(){
		return $this->titre_fr;
	}
	
	function setDescription($description){
		$this->description = filter_var($description, FILTER_SANITIZE_STRING);
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function setDescription_fr($description_fr){
		$this->description_fr = filter_var($description_fr, FILTER_SANITIZE_STRING);
	}
	
	function getDescription_fr(){
		return $this->description_fr;
	}
	
	function setDatePremiere($datePremiere){
		$this->datePremiere = filter_var($datePremiere, FILTER_VALIDATE_INT);
	}
	
	function getDatePremiere(){
		return $this->datePremiere;
	}
}

?>