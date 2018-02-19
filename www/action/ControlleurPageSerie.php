<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/SerieDAO.php';

class ControlleurPageSerie
{
    private static $instance=null;
	private $serieDAO;
    
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
		return $this->serieDAO->getSerie($id);
	}
	
	
    private function __construct()
    {
		$this->serieDAO = (new SerieDAO)::getInstance();
    }
    
}
?>