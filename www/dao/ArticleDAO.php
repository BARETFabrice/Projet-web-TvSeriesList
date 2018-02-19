<?php
require_once "../modele/Article.php";

class ArticleDAO
{
	private static $_instance;
    private static $_connexion;
    private $listeArticle;
    
    public static function getInstance()
    {
        if ((self::$_instance) == null) 
        {
            self::$_instance = new ArticleDAO();
        }
        return self::$_instance;
    }
    
    private function __construct()
    {
        $listeArticle = [];
        
        require 'ConnexionBaseDeDonnees.php';
		self::$_connexion=$connexion;
    }
    
    public function getListeArticleParPage($min, $max)
    {
        $listeArticle = [];
        
        /*
        SELECT a.*, m.pseudonyme  as auteur
        FROM article AS a
        INNER JOIN membre AS m
        ON m.idMembre = a.idMembre
        LIMIT ' . $min . ',' . $max
        */
        
        //modif sql
        $sql = 'SELECT a.*, m.pseudonyme  as auteur FROM article AS a INNER JOIN membre AS m ON m.idMembre = a.idMembre LIMIT ' . $min . ',' . $max;
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeArticle, new Article($result['idArticle'], $result['auteur'], $result['titre'], $result['contenu'], $result['image'], $result['dateCreation']));
        }
        
        //var_dump($listeArticle);
        
        return $listeArticle;
    }
    
    public function getNombreArticle()
    {
        $sql = 'SELECT COUNT(*) AS NombreArticle FROM article';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        
        //var_dump($results);
        
        return intval($results['NombreArticle']);
    }
    
    
	
	
}
?>