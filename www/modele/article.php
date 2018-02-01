<?php

class Article {
	
	private $id;
	private $idAuteur;
	private $titre;
	private $contenue;
	private $image;
	private $dateCreation;
	/* $tags. pour les séries liées à l'article on créer une table article-série ? car plusieurs série peuvent être sur un article */
	
	public function __construct($id, $idAuteur, $titre, $contenue, $image, $dateCreation) {
        $this->id = $id;
		$this->idAuteur = $idAuteur;
		$this->titre = $titre;
		$this->contenue = $contenue;
		$this->image = $image;
		$this->dateCreation = $dateCreation;
    }
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
	}
	
	function set_idAuteur($new_idAuteur){
		$this->idAuteur = $new_idAuteur;
	}
	
	function get_idAuteur(){
		return $this->idAuteur;
	}
	
	function set_titre($new_titre){
		$this->titre = $new_titre;
	}
	
	function get_titre(){
		return $this->titre;
	}
	
	function set_contenue($new_contenue){
		$this->contenue = $new_contenue;
	}
	
	function get_contenue(){
		return $this->contenue;
	}
	
	function set_image($new_image){
		$this->image = $new_image;
	}
	
	function get_image(){
		return $this->image;
	}
	
	function set_dateCreation($new_dateCreation){
		$this->dateCreation = $new_dateCreation;
	}
	
	function get_dateCreation(){
		return $this->dateCreation;
	}
	
}

?>