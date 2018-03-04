<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class controlleurInscription
{
    private static $instance=null;
	private $etape;
	private $etapePage;
	private $membre;
	private $erreur;
	
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
		return  $this->etapePage;
	}
	
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
        require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';
        if(controlleurConnexion::isConnecte())
            header("Location: ./liste");
            
        if(isset($_POST['etape1']))
        {
            $this->completerEtape1($_POST['courriel']);
        }
        else if(isset($_POST['etape2']))
        {
            if(empty($_POST['motDePasse']))
                 $this->erreur="Veuillez entrez un mot de passe";
            else if(empty($_POST['confirmerMotDePasse']))
                $this->erreur="Veuillez confirmer le mot de passe";
            else if($_POST['confirmerMotDePasse'] != $_POST['motDePasse'])
                $this->erreur="mot de passe et la confirmation doivent correspondrent";
            else
                $this->completerEtape2($_POST['motDePasse']);
        }
        else if(isset($_POST['etape3']))
        {
            $notification=isset($_POST['notification']);
            
            $this->completerEtape3($_POST['pseudonyme'],$notification);
        }
        
        if(isset($_GET['etape']))
            $this->etapePage=$_GET['etape'];

        if(!isset($this->etapePage) || $this->etapePage > $this->etape)
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
    
    public function afficherMessageErreur()
    {
        echo $this->erreur;
    }
	
	public function completerEtape1($courriel)
	{
		$this->membre->setGestionErreur(true);
		try{
		 $this->membre->setCourriel($courriel);
		}
		catch(Exception $e)
		{
		    $this->erreur=$e->getMessage();
		    return false;
		}
		
		if($this->etape<2)
			 $this->etape=2;
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;

		 return true;
	}
	
	public function completerEtape2($motDePasse)
	{
		$this->membre->setGestionErreur(true);
		try{
		 $this->membre->setMotDePasse($motDePasse);
		}
		catch(Exception $e)
		{
		    $this->erreur=$e->getMessage();
		    return false;
		}
		
		if($this->etape<3)
			 $this->etape=3;
		 
		 $_SESSION["membreInscription"]=$this->membre;
		 $_SESSION["etapeInscription"]=$this->etape;
		 
		 return true;
	}
	
	public function completerEtape3($pseudonyme, $notification)
	{
		 $this->membre->setGestionErreur(true);
		try{
		 $this->membre->setPseudonyme($pseudonyme);
		 $this->membre->setNotification($notification);
		}
		catch(Exception $e)
		{
		    $this->erreur=$e->getMessage();
		    return false;
		}
		 
		 require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
		 $membre=$this->membre;
		 $membre->hashMotDePasse();
		 MembreDAO::getInstance()->ajouterMembre($membre);
		 
		 unset ($_SESSION["membreInscription"]);
		 unset ($_SESSION["etapeInscription"]);
		 self::$instance=null;
		 
		 
        session_start();
        $_SESSION["membreConnexion"]=$membre;
		 
		 return true;
	}
	
    private function __construct()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';
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
		    
	    $this->erreur="";
    }
    
}
?>