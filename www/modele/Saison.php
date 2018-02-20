<?php

class Saison {
	
	private $id;
	private $idSerie;
	private $numero;
	private $titre;
	private $titre_fr;
	private $image;
    private $fini; 
	
	public function __construct($id, $idSerie, $numero, $titre, $titre_fr, $image, $fini) {
		$this->setId($id);
		$this->setIdSerie($idSerie);
		$this->setNumero($numero);
		$this->setTitre($titre);
		$this->setTitre_fr($titre_fr);
		$this->setImage($image);
		$this->setFini($fini);
    }
	
	function setId($id){
		$this->id = filter_var($id, FILTER_VALIDATE_INT);
	}
	
	function getId(){
		return $this->id;
	}
	
	function setIdSerie($idSerie){
		$this->idSerie = filter_var($idSerie, FILTER_VALIDATE_INT);
	}
	
	function getIdSerie(){
		return $this->idSerie;
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
	
	function setImage($image){
		$this->image = $image;
	}
	
	function getImage(){
		return $this->image;
	}
	
	function setFini($fini){
		$this->fini = filter_var($fini, FILTER_VALIDATE_BOOLEAN);
	}
	
	function isFini(){
		return $this->fini;
	}
}

?>