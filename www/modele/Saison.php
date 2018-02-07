<?php

class Saison {
	
	private $id;
	private $idSerie;
	private $numero;
	private $titre;
	private $image;
	private $nombreEpisode;
	private $dateCreation;
    private $ended; //Bool
	
	//DateCreation et ended sont probablement optionnel puisque nous pouvons regarder la date du première épisode dans la base de données et regarder si le dernier épisode a été diffusé. À VOIR PLUS TARD
	
	public function __construct($id, $idSerie, $numero, $titre, $image, $nombreEpisode, $dateCreation ,$ended) {
		$this->id = $id;
		$this->idSerie = $idSerie;
		$this->numero = $numero;
		$this->titre = $titre;
		$this->image = $image;
		$this->nombreEpisode = $nombreEpisode;
		$this->dateCreation = $dateCreation;
		$this->ended = $ended;
    }
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
	}
	
	function set_idSerie($new_idSerie){
		$this->idSerie = $new_idSerie;
	}
	
	function get_idSerie(){
		return $this->idSerie;
	}
	
	function set_numero($new_numero){
		$this->numero = $new_numero;
	}
	
	function get_numero(){
		return $this->numero;
	}
	
	function set_titre($new_titre){
		$this->titre = $new_titre;
	}
	
	function get_titre(){
		return $this->titre;
	}
	
	function set_image($new_image){
		$this->image = $new_image;
	}
	
	function get_image(){
		return $this->image;
	}
	
	
	function set_nombreEpisode($new_nombreEpisode){
		$this->nombreEpisode = $new_nombreEpisode;
	}
	
	function get_nombreEpisode(){
		return $this->nombreEpisode;
	}
	
	function set_dateCreation($new_dateCreation){
		$this->dateCreation = $new_dateCreation;
	}
	
	function get_dateCreation(){
		return $this->dateCreation;
	}
	
	function set_ended($new_ended){
		$this->ended = $new_ended;
	}
	
	function get_ended(){
		return $this->ended;
	}
}

?>