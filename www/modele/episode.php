<?php

class Episode {
	
	private $id;
	private $idSaison;
	private $numero;
	private $titre;
	private $datePremiereDiffusion;
	
	
	public function __construct($id, $idSaison, $numero, $titre, $datePremiereDiffusion) {
		$this->id = $id;
		$this->idSaison = $idSaison;
		$this->numero = $numero;
		$this->titre = $titre;
		$this->datePremiereDiffusion = $datePremiereDiffusion;
    }
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
	}
	
	function set_idSaison($new_idSaison){
		$this->idSaison = $new_idSaison;
	}
	
	function get_idSaison(){
		return $this->idSaison;
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
	
	function set_datePremiereDiffusion($new_datePremiereDiffusion){
		$this->datePremiereDiffusion = $new_datePremiereDiffusion;
	}
	
	function get_datePremiereDiffusion(){
		return $this->datePremiereDiffusion;
	}
}

?>