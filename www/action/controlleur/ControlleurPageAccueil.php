<?php
require "../dao/ListeSerieDAO.php";

class ControlleurPageAccueil 
{
    private static $_instance;
    
    public static function getInstance()
    {
        if ((self::$_instance) == null) 
        {
            self::$_instance = new ControlleurPageAccueil();
        }
        return self::$_instance;
    }
    
    private function __construct()
    {
        
    }
    
    public function getListeSerieDuMoment()
    {
        return ListeSerieDAO::getInstance()::getListeSerieDuMoment();
    }
    
}
?>