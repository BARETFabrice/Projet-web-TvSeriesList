<?php

class Commentaire {
	
	private $id;
	private $idAuteur;
	private $idArticle;
	private $contenu;
	private $dateCreation;
	
	public function __construct($id, $idAuteur, $idArticle, $contenu, $dateCreation) {
		$this->id = $id;
		$this->idAuteur = $idAuteur;
		$this->idArticle = $idArticle;
		$this->contenu = $contenu;
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
	
	function set_idArticle($new_idArticle){
		$this->idArticle = $new_idArticle;
	}
	
	function get_idArticle(){
		return $this->idArticle;
	}
	
	function set_contenu($new_contenu){
		$this->contenu = $new_contenu;
	}
	
	function get_contenu(){
		return $this->contenu;
	}
	
	function set_dateCreation($new_dateCreation){
		$this->dateCreation = $new_dateCreation;
	}
	
	function get_dateCreation(){
		return $this->dateCreation;
	}
}

?>