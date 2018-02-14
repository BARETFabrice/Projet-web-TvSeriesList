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
		$this->setId($id);
		$this->setTitre($titre);
		$this->setTitre_fr($titre_fr);
		$this->setDescription($description);
		$this->setDescription_fr($description_fr);
		$this->setImage($image);
		$this->setFini($fini);
    }
	
	function setId($id){
		$this->id = filter_var($id, FILTER_VALIDATE_INT);
	}
	
	function getId(){
		return $this->id;
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