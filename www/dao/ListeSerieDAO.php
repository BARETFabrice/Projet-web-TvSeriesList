<?php
require_once "../modele/Serie.php";

class ListeSerieDAO 
{
    private static $_instance;
    private static $_connexion;
    private $listeSerie;
    
    
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
        $listeSerie = [];
        
        require 'ConnexionBaseDeDonnees.php';
		self::$_connexion=$connexion;
    }
    
    public function getListeSerieDuMoment()
    {
        $listeSerie = [];
        
        $sql = 'SELECT * FROM serie';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result));
        }
        
        var_dump($listeSerie);
        
        return $listeSerie;
    }
    
    public function getListeTopSerie()
    {
        $listeSerie = [];
        
        $sql = 'SELECT * FROM serie';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result));
        }
        
        //var_dump($listeSerie);
        
        return $listeSerie;
    }
    
    public function getListeTopLesPlusAttendue()
    {
        $listeSerie = [];
        
        $sql = 'SELECT * FROM serie';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result));
        }
        
        //var_dump($listeSerie);
        
        return $listeSerie;
    }
    
    
}
?>