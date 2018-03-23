<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modele/Serie.php";

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
        
        //modif sql
        $sql = 'SELECT * FROM serie LIMIT 5';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']));
        }
        
        //var_dump($listeSerie);
        
        return $listeSerie;
    }
    
    public function getListeTopSerie()
    {
        $listeSerie = [];
        
        //modif sql
        $sql = 'SELECT * FROM serie ORDER BY idSerie LIMIT 3';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']));
        }
        
        //var_dump($listeSerie);
        
        return $listeSerie;
    }
    
    public function getListeTopLesPlusAttendue()
    {
        $listeSerie = [];
        
        //modif sql
        $sql = 'SELECT * FROM serie LIMIT 5';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']));
        }
        
        //var_dump($listeSerie);
        
        return $listeSerie;
    }

    public function getNombreSerie()
    {
        $sql = 'SELECT COUNT(*) AS NombreSerie FROM serie';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        //var_dump($results);

        return intval($results['NombreSerie']);
    }

    public function getListeSerie($min, $max)
    {
        $listeSerie = [];

        $sql = 'SELECT * FROM serie LIMIT ' . $min . ',' . $max;
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result)
        {
            array_push($listeSerie, new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']));
        }

        return $listeSerie;
    }
    
    //test fab
    public function getSerie($idSerie)
    {
        $sql = 'SELECT * FROM serie WHERE idSerie=:idSerie';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->bindParam(':idSerie', $idSerie);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
		$serie = new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']);
        
        return $serie;
    }
    
    
}
?>