<?php

class Article {
	
	private $id;
	private $idAuteur;
	private $titre;
	private $contenu;
	private $image;
	private $dateCreation;
	
	public function __construct($id, $idAuteur, $titre, $contenu, $image, $dateCreation) {
		$this->id = $id;
		$this->idAuteur = $idAuteur;
		$this->titre = $titre;
		$this->contenu = $contenu;
		$this->image = $image;
		$this->dateCreation = $dateCreation;
    }
	
	function setId($new_id){
		$this->id = $new_id;
	}
	
	function getId(){
		return $this->id;
	}
	
	function setIdAuteur($new_idAuteur){
		$this->idAuteur = $new_idAuteur;
	}
	
	function getIdAuteur(){
		return $this->idAuteur;
	}
	
	function setTitre($new_titre){
		$this->titre = $new_titre;
	}
	
	function getTitre(){
		return $this->titre;
	}
	
	function setContenu($new_contenu){
		$this->contenu = $new_contenu;
	}
	
	function getContenu(){
		return $this->contenu;
	}
	
	function setImage($new_image){
		$this->image = $new_image;
	}
	
	function getImage(){
		return $this->image;
	}
	
	function setDateCreation($new_dateCreation){
		$this->dateCreation = $new_dateCreation;
	}
	
	function getDateCreation(){
		return $this->dateCreation;
	}
}

?>