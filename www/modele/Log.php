<?php

class Log {
	
	private $id;

	public function __construct($id) {
		$this->id = $id;
    }
	
	function set_id($new_id){
		$this->id = $new_id;
	}
	
	function get_id(){
		return $this->id;
	}
}

?>