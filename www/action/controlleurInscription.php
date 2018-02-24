<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class controlleurInscription
{
    private static $instance=null;
	private $etape;
	private $etapePage;
	private $membre;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new controlleurInscription();
        }
        return self::$instance;
    }
    
    public function verifierHTTP()
    {
        if(isset($_POST['etape1']))
        {
            $this->completerEtape1($_POST['courriel']);
        }
        else if(isset($_POST['etape2']))
        {
            $this->completerEtape2($_POST['motDePasse']);
        }
        else if(isset($_POST['etape3']))
        {
            $notification=isset($_POST['notification']);
            
            $this->completerEtape3($_POST['pseudonyme'],$notification);
            header("Location: ./");
        }
        
        if(isset($_GET['etape']) && ($_GET['etape'] == 1 || $_GET['etape'] == 2 || $_GET['etape'] == 3 || $_GET['etape'] == 4))
            $this->etapePage=$_GET['etape'];

        if(!isset($this->etapePage) || $this->etapePage>$this->etape)
            $this->etapePage=$this->etape;
    }
    
    public function afficherFragment()
    {
        switch($this->etapePage)
        {
            case 1:
                require_once $_SERVER['DOCUMENT_ROOT'].'/prive/membre/fragmentInscriptionCourriel.php';
                break;
            case 2:
                require_once $_SERVER['DOCUMENT_ROOT'].'/prive/membre/fragmentInscriptionMotDePasse.php';
                break;
            case 3:
                require_once $_SERVER['DOCUMENT_ROOT'].'/prive/membre/fragmentInscriptionInfos.php';
                break;
        }
    }
	
	public function getMembre()
	{
		return $this->membre;
	}
	
	public function getEtape()
	{
		return  $this->etape;
	}
	
	public function getEtapePage()
	{
		return  $this->etape;
	}
	
	public function completerEtape1($courriel)
	{
		if($this->etape<2)
			 $this->etape=2;
			 
		 $this->membre->setCourriel($courriel);
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;

	}
	
	public function completerEtape2($motDePasse)
	{
		if($this->etape<3)
			 $this->etape=3;
		
		 $this->membre->setMotDePasse($motDePasse);
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;
	}
	
	public function completerEtape3($pseudonyme, $notification)
	{
		if($this->etape<4)
			 $this->etape=4;
		
		 $this->membre->setPseudonyme($pseudonyme);
		 $this->membre->setNotification($notification);
		 
		 require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
		 $membre=$this->membre;
		 MembreDAO::getInstance()->ajouterMembre($membre);
		 
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