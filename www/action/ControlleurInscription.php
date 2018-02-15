<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ListeDAO.php';

class ControlleurInscription
{
    private static $instance=null;
	private $etape;
	private $membre;
	private $liste;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurInscription();
        }
        return self::$instance;
    }
    
    
	
	public static function newInstance()
    {
        self::$instance = new ControlleurInscription();
        return self::$instance;
    }
    
	public static function deleteInstance()
    {
        self::$instance = null;
    }
	
	public function getMembre()
	{
		return $this->membre;
	}
	
	public function getListe()
	{
		return  $this->liste;
	}
	
	public function getEtape()
	{
		return  $this->etape;
	}
	
	public function onSubmitEtape1()
	{
		if($this->etape==1)
			 $this->etape=2;
		
		 $this->membre = new Membre();
	}
	
	public static function onSubmitEtape2()
	{
		if($this->etape==2)
			 $this->etape=3;
		
		//$this->membre.setNom();
		
		//$this->liste = new Liste();
	}
	
	public static function onSubmitEtape3()
	{
		$this->deleteInstance();
	}
	
    private function __construct()
    {
        $this->etape=1;
		$this->membre=null;
		$this->liste=null;
    }
    
}
?>