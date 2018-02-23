<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ArticleDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Article.php';

class controlleurPageArticle
{
    private static $instance=null;
	private $articleDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new controlleurPageArticle();
        }
        return self::$instance;
    }
	
	public function getArticle($id)
	{
		return $this->articleDAO->getArticle($id);
	}
	
	public function ajouterArticle($auteur, $titre, $contenu, $image, $dateCreation)
	{
		$article = new Article(NULL, $auteur, $titre, $contenu, $image, $dateCreation);
		$this->articleDAO->ajouterArticle($article);
	}
	
	public function modifierArticle($id, $auteur, $titre, $contenu, $image, $dateCreation)
	{
		$article = new Article($id, $auteur, $titre, $contenu, $image, $dateCreation);
		$this->articleDAO->modifierArticle($article);
	}
	
	public function supprimerArticle($id)
	{
		$this->articleDAO->supprimerArticle($id);
	}
	
	public function rechercherArticle($recherche)
	{
		return $this->articleDAO->rechercherArticle($recherche);
	}
	
	public function verifierFormulaireAdmin($id)
	{
		
	}
	
	public function estPasEnSuppression()
	{
		return !isset($_POST['supprimer']);
	}
	
	
    private function __construct()
    {
		$this->articleDAO = (new ArticleDAO)::getInstance();
    }
    
}
?>