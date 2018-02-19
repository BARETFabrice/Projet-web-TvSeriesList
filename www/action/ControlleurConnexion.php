<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class ControlleurConnexion
{
    
    public static function isConnected()
    {
        session_start();
		return isset($_SESSION["membre"]);
    }
    
    public static function getMembre()
    {
        session_start();
		if(self::isConnected())
		    return $_SESSION["membre"];
		else
		    return null;
    }
    
    public static function connect()
    {
        session_start();
		unset($_SESSION["membre"]);
    }
    
    public static function disconnect()
    {
        session_start();
		unset($_SESSION["membre"]);
    }
    
}
?>