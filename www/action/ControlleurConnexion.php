<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class ControlleurConnexion
{
    private static $instance=null;
	private $membre;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurInscription();
        }
        return self::$instance;
    }
    
    public static function isConnected()
    {
		session_start();
	    return isset($_SESSION['membre']);
    }
    
	
    private function __construct()
    {
        
    }
    
}
?>