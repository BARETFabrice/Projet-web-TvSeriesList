<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/SerieDAO.php';

class ControlleurPageSerie
{
    private static $instance=null;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurPageSerie();
        }
        return self::$instance;
    }
	
	public function getSerie($id)
	{
		return SerieDAO::getInstance()::getSerie($id);
	}
	
	
    private function __construct()
    {
		
    }
    
}
?>