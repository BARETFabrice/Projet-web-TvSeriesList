<?php

class Serie {
	
	private $id;
	private $titre;
	private $image;
	private $nationalite;
	private $type; // Live action, animated, documentary ?
	private $dateCreation;
    private $ended; //Bool
	
	public function __construct($id, $titre, $image, $nationalite, $type, $dateCreation, $ended) {
		$this->id = $id;
		$this->titre = $titre;
		$this->image = $image;
		$this->nationalite = $nationalite;
		$this->type = $type;
		$this->dateCreation = $dateCreation;
		$this->ended = $ended;
    }
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
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
	
	function set_nationalite($new_nationalite){
		$this->nationalite = $new_nationalite;
	}
	
	function get_nationalite(){
		return $this->nationalite;
	}
	
	function set_type($new_type){
		$this->type = $new_type;
	}
	
	function get_type(){
		return $this->type;
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