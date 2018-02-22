<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class controlleurConnexion
{
    
    public static function isConnecte()
    {
        session_start();
		return isset($_SESSION["membre"]);
    }
    
    public static function getMembre()
    {
        session_start();
		if(self::isConnecte())
		    return $_SESSION["membre"];
		else
		    return null;
    }
    
    public static function connecter()
    {
        session_start();
		unset($_SESSION["membre"]);
    }
    
    public static function deconnecter()
    {
        session_start();
		unset($_SESSION["membre"]);
    }
    
}
?>