<?php
require_once "../modele/Article.php";

class ArticleDAO
{
	private static $_instance;
    private static $_connexion;
    private $listeArticle;
    private $listeArticleParSerie;
    
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
        $listeArticleParSerie = [];
        
        require 'ConnexionBaseDeDonnees.php';
		self::$_connexion=$connexion;
    }

    public function getArticleParId($idArticle)
    {
        $sql = 'SELECT a.*, m.pseudonyme  as auteur FROM article AS a INNER JOIN membre AS m ON m.idMembre = a.idMembre WHERE idArticle=:idArticle';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $article = new Article($result['idArticle'], $result['auteur'], $result['titre'], $result['contenu'], $result['image'], $result['dateCreation']);
        return $article;
    }
    
    public function getListeArticleParPage($min, $max)
    {
        $listeArticle = [];
        
        /*
        SELECT a.*, m.pseudonyme  as auteur
        FROM article AS a
        INNER JOIN membre AS m
        ON m.idMembre = a.idMembre
        LIMIT $min,$max
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
    
    public function getListeArticleParSerie($idSerie)
    {
        $listeArticleParSerie = [];
        
        $sql = 'SELECT a.*, m.pseudonyme  as auteur FROM article AS a INNER JOIN membre AS m ON m.idMembre = a.idMembre WHERE idSerie = ' . $idSerie . ' LIMIT 2';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($results as $result)
        {
            array_push($listeArticleParSerie, new Article($result['idArticle'], $result['auteur'], $result['titre'], $result['contenu'], $result['image'], $result['dateCreation']));
        }
        
        return $listeArticleParSerie;
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