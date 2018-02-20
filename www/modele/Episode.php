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
		$this->id = id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setIdSaison($idSaison){
		$this->idSaison = idSaison;
	}
	
	function getIdSaison(){
		return $this->idSaison;
	}
	
	function setNumero($numero){
		$this->numero = numero;
	}
	
	function getNumero(){
		return $this->numero;
	}
	
	function setTitre($titre){
		$this->titre = titre;
	}
	
	function getTitre(){
		return $this->titre;
	}
	
	function setTitre_fr($titre_fr){
		$this->titre_fr = titre_fr;
	}
	
	function getTitre_fr(){
		return $this->titre_fr;
	}
	
	function setDescription($description){
		$this->description = description;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function setDescription_fr($description_fr){
		$this->description_fr = description_f;
	}
	
	function getDescription_fr(){
		return $this->description_fr;
	}
	
	function setDatePremiere($datePremiere){
		$this->datePremiere = datePremiere;
	}
	
	function getDatePremiere(){
		return $this->datePremiere;
	}
}

?>