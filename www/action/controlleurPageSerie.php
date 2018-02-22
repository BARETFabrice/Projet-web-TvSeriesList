<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/SerieDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Serie.php';

class ControlleurPageSerie
{
    private static $instance=null;
	private $serieDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurPageSerie();
        }
        return self::$instance;
    }
	
	public function getSerie($id)
	{
		return $this->serieDAO->getSerie($id);
	}
	
	public function ajouterSerie($titre, $titre_fr, $description, $description_fr, $image, $fini)
	{
		$serie = new Serie(NULL, $titre, $titre_fr, $description, $description_fr, $image, $fini);
		$this->serieDAO->ajouterSerie($serie);
	}
	
	public function modifierSerie($id, $titre, $titre_fr, $description, $description_fr, $image, $fini)
	{
		$serie = new Serie($id, $titre, $titre_fr, $description, $description_fr, $image, $fini);
		$this->serieDAO->modifierSerie($serie);
	}
	
	public function supprimerSerie($id)
	{
		$this->serieDAO->supprimerSerie($id);
	}
	
	public function rechercherSerie($recherche)
	{
		return $this->serieDAO->rechercherSerie($recherche);
	}
	
	public function verifierFormulaireAdmin($id)
	{
			if (isset($_POST['modifier'])) {
				if(!isset($_POST['fini']))
				{
					$_POST['fini'] = false;
				}
				$this->modifierSerie($id, $_POST['titre'], $_POST['titre_fr'], $_POST['description'], $_POST['description_fr'], NULL, $_POST['fini']);
				header("Location: ./serie.php?id=$id");
			}
			elseif(isset($_POST['confirmersupp'])){
				$this->supprimerSerie($id);
				header("Location: ./liste-series.php");
			}
			elseif (isset($_POST['supprimer'])) {
			   echo "
					<div class='row column align-center medium-6 large-4 container-padded div_login'>
					<form class='log-in-form' action='./serie.php?id=$id' method='post'>
					<h4 class='text-center'>Confirmer la suppression</h4>
					<p><input type='submit' class='button expanded alert' name='confirmersupp' value='Confirmer'></input></p>
					</form>
					</div>
			   ";
			} 
	}
	
	
    private function __construct()
    {
		$this->serieDAO = (new SerieDAO)::getInstance();
    }
    
}
?>