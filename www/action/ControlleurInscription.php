<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class ControlleurInscription
{
    private static $instance=null;
	private $etape;
	private $membre;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurInscription();
        }
        return self::$instance;
    }
	
	public function getMembre()
	{
		return $this->membre;
	}
	
	public function getEtape()
	{
		return  $this->etape;
	}
	
	public function onSubmitEtape1($courriel)
	{
		if($this->etape<2)
			 $this->etape=2;
			 
		 $this->membre->setCourriel($courriel);
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;

	}
	
	public function onSubmitEtape2($motDePasse)
	{
		if($this->etape<3)
			 $this->etape=3;
		
		 $this->membre->setMotDePasse($motDePasse);
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;
	}
	
	public function onSubmitEtape3($pseudonyme, $notification)
	{
		if($this->etape<4)
			 $this->etape=4;
		
		 $this->membre->setPseudonyme($pseudonyme);
		 $this->membre->setNotification($notification);
		 
		 require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
		 $membre=$this->membre;
		 $membreDAO->ajouterMembre($membre);
		 
		 unset ($_SESSION["membreInscription"]);
		 unset ($_SESSION["etapeInscription"]);
		 self::$instance=null;
	}
	
    private function __construct()
    {
		session_start();
		
		if(!isset($_SESSION["membreInscription"]))
		{
		    $this->membre=new Membre();
		    $_SESSION["membreInscription"]=$this->membre;
		}
		else
		    $this->membre=$_SESSION["membreInscription"];
		    
		if(!isset($_SESSION["etapeInscription"]))
		{
		    $this->etape=1;
		    $_SESSION["etapeInscription"]=$this->etape;
		}
		else
		    $this->etape=$_SESSION["etapeInscription"];
    }
    
}
?>