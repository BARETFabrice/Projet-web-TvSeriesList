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
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setIdSerie($idSerie){
		$this->idSerie = $idSerie;
	}
	
	function getIdSerie(){
		return $this->idSerie;
	}
	
	function setNumero($numero){
		$this->numero = $numero;
	}
	
	function getNumero(){
		return $this->numero;
	}
	
	function setTitre($titre){
		$this->titre = $titre;
	}
	
	function getTitre(){
		return $this->titre;
	}
	
	function setTitre_fr($titre_fr){
		$this->titre_fr = $titre_fr;
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
		$this->fini = $fini;
	}
	
	function isFini(){
		return $this->fini;
	}
}

?>