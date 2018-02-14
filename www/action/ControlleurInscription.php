<?php

require_once '../dao/MembreDAO.php';
require_once '../dao/ListeDAO.php';

class ControlleursInscription 
{
    private static $instance=null;
	private static $etape=1;
	private static $membre=null;
	private static $liste=null;
    
    public static function getInstance()
    {
        if (($this->instance) == null) 
        {
            $this->instance = new ControlleurPageAccueil();
        }
        return $this->instance;
    }
	
	public static function newInstance()
    {
        $this->instance = new ControlleurPageAccueil();
        return $this->instance;
    }
    
	public static function deleteInstance()
    {
        $this->instance = null;
    }
	
	public static function getMembre()
	{
		return $this->membre;
	}
	
	public static function getListe()
	{
		return $this->liste;
	}
	
	public static function getEtape()
	{
		return $this->etape;
	}
	
	public static function onSubmitEtape1()
	{
		if($this->etape==1)
			$this->etape=2;
		
		$this->membre = new Membre();
	}
	
	public static function onSubmitEtape2()
	{
		if($this->etape==2)
			$this->etape=3;
		
		$this->membre.setNom();
		
		//$this->liste = new Liste();
	}
	
	public static function onSubmitEtape3()
	{
		//$this->deleteInstance();
	}
	
    private function __construct()
    {
        $this->etape=1;
		$this->membre=null;
		$this->liste=null;
    }
    
}
?>