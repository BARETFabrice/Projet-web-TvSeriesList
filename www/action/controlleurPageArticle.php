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
		return $this->articleDAO->getArticleParId($id);
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
			if (isset($_POST['modifier'])) {
				$this->modifierArticle($id, NULL, $_POST['titre'], $_POST['contenu'], NULL, NULL);
				header("Location: ./article.php?id=$id");
			}
			elseif(isset($_POST['confirmersupp'])){
				//$this->supprimerSerie($id);
				header("Location: ./liste-articles.php");
			}
			elseif (isset($_POST['supprimer'])) {
			   echo "
					<div class='row column align-center medium-6 large-4 container-padded div_login'>
					<form class='log-in-form' action='./article.php?id=$id' method='post'>
					<h4 class='text-center'>Confirmer la suppression</h4>
					<p><input type='submit' class='button expanded alert' name='confirmersupp' value='Confirmer'></input></p>
					</form>
					</div>
			   ";
			} 
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