<?php
require "../modele/Serie.php";

class ListeSerieDAO 
{
    private static $_instance;
    private $listeSerieDuMoment;
    
    public static function getInstance()
    {
        if ((self::$_instance) == null) 
        {
            self::$_instance = new ListeSerieDAO();
        }
        return self::$_instance;
    }
    
    private function __construct()
    {
        $listeSerieDuMoment = [];
    }
    
    public function getListeSerieDuMoment()
    {
        for($i = 0; $i < 5; $i++)
        {
            $serie = new Serie($i, "titre $i", "image $i", "nationalite", "type", "dateCreation", true);
            
            //array_push($listeSerieDuMoment, $serie);
            $listeSerieDuMoment[$i] = $serie;
            
            //print_r($serie);
        }
        
        //print_r($listeSerieDuMoment);
        return $listeSerieDuMoment;
    }
    
}
?>