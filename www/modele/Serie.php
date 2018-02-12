<?php

class Serie {
	
	private $id;
	private $titre;
	private $titre_fr;
	private $description;
	private $description_fr;
	private $image;
    private $fini;
	
	public function __construct($id, $titre, $titre_fr, $description, $description_fr, $image, $fini) {
		$this->id = $id;
		$this->titre = $titre;
		$this->titre_fr = $titre_fr;
		$this->description = $description;
		$this->description_fr = $description_fr;
		$this->image = $image;
		$this->fini = $fini;
    }
	
	function setId($id){
		$this->id = $id;
	}
	
	function getId(){
		return $this->id;
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
	
	function setDescription($description){
		$this->description = $description;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function setDescription_fr($description_fr){
		$this->description_fr = $description_fr;
	}
	
	function getDescription_fr(){
		return $this->description_fr;
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