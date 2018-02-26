<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/modele/Article.php";

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
    
    public function __construct()
    {   
        require 'ConnexionBaseDeDonnees.php';
		self::$_connexion=$connexion;
    }

    public function getArticleParId($idArticle)
    {
		//Enlever pseudonyme
        $sql = 'SELECT a.*, m.pseudonyme  as auteur FROM article AS a INNER JOIN membre AS m ON m.idMembre = a.idMembre WHERE idArticle=:idArticle';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $article = new Article($result['idArticle'], $result['auteur'], $result['titre'], $result['contenu'], $result['image'], $result['dateCreation']);
        return $article;
    }
	
	public function getAuteurParArticle($idArticle)
	{
		$sql = 'SELECT m.pseudonyme  as auteur FROM article AS a INNER JOIN membre AS m ON m.idMembre = a.idMembre WHERE idArticle=:idArticle';
        $stmt = self::$_connexion->prepare($sql);
        $stmt->bindParam(':idArticle', $idArticle);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['auteur'];
	}
	
	function ajouterArticle($article){
		$sql = "INSERT INTO article (auteur, titre, contenu, image, dateCreation)
			VALUES (:auteur,:titre,:contenu, NULL,:dateCreation)";
		$stmt = self::$_connexion->prepare($sql); 
		
		$auteur = $article->getAuteur();
		$titre = $article->getTitre();
		$contenu = $article->getContenu();
		//$image = $article->getImage();
		$dateCreation = $article->getDateCreation();
		
		$stmt->bindParam(':auteur', $auteur);
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':contenu', $contenu);
		//$stmt->bindParam(':image', $serie->getImage());
		$stmt->bindParam(':dateCreation', $dateCreation);
		
		$stmt->execute();
		
		$article->setId(self::$_connexion->lastInsertId());
	}
	
	function supprimerArticle($id){
		$sql = 'DELETE FROM article WHERE idArticle=:idArticle';
		$stmt = self::$_connexion->prepare($sql); 
		$stmt->bindParam(':idArticle', $id);
		$stmt->execute();
	}
	
	function modifierArticle($article){
		$sql = 'UPDATE article SET titre=:titre, contenu=:contenu WHERE idArticle=:idArticle';
		$stmt = self::$_connexion->prepare($sql); 
		
		$idArticle = $article->getId();
		//$auteur = $article->getAuteur();
		$titre = $article->getTitre();
		$contenu = $article->getContenu();
		//$image = $article->getImage();
		//$datePremiere = $article->getDatePremiere();
		
		
		$stmt->bindParam(':idArticle', $idArticle);
		//$stmt->bindParam(':auteur', $auteur);
		$stmt->bindParam(':titre', $titre);
		$stmt->bindParam(':contenu', $contenu);
		//$stmt->bindParam(':image', $serie->getImage());
		//$stmt->bindParam(':datePremiere', $datePremiere);
		
		$stmt->execute();
	}
	
	function rechercherArticle($recherche){
		self::$_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT idArticle, titre FROM article WHERE titre LIKE '%$recherche%' LIMIT 50";
		$stmt = self::$_connexion->prepare($sql); 
		
		$stmt->bindParam(':recherche', $recherche);
		$listeArticle = array();
		if ($stmt->execute()) {
			while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$article = new Article($result['idArticle'], NULL, $result['titre'], NULL, NULL, NULL);
				array_push($listeArticle, $article);
			}
		}
		return $listeArticle;
	}
    
    public function getListeArticleParPage($min, $max)
    {	//Enlever pseudonyme
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
    {	//Enlever pseudonyme
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