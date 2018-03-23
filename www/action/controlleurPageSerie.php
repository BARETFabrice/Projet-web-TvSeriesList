<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/SerieDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Serie.php';

class controlleurPageSerie
{
    private static $instance=null;
	private $serieDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new controlleurPageSerie();
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
				header("Location: ../serie/?id=$id");
			}
			elseif(isset($_POST['confirmersupp'])){
				$this->supprimerSerie($id);
				header("Location: ../series");
			}
			elseif (isset($_POST['supprimer'])) {
			   echo "
					<div class='row column align-center medium-6 large-4 container-padded div_login'>
					<form class='log-in-form' action='' method='post'>
					<h4 class='text-center'>Confirmer la suppression</h4>
					<p><input type='submit' class='button expanded alert' name='confirmersupp' value='Confirmer'></input></p>
					</form>
					</div>
			   ";
			} 
	}
	
	public function getListeSaisonsParSerieAdmin($id)
	{
		require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSaison.php';
		$controlleurSaison = ControlleurPageSaison::getInstance();
		$saisons = $controlleurSaison->getSaisonsParSerie($id);
		if(sizeof($saisons) > 0)
			{
				echo "<p>Saisons : ";
				$iteration = 0;
				foreach($saisons as $saison){
					$idSaison = $saison->getId();
					$numeroSaison = $saison->getNumero();
					if($iteration == 0)
					{
						echo "<a href='../saison/?id=$idSaison'>$numeroSaison</a> ";
					}
					else
					{
						echo "- <a href='../saison/?id=$idSaison'>$numeroSaison</a> ";
					}
					$iteration++;
				}
				echo "</p>";
			}
	}
	
	public function estPasEnSuppression()
	{
		return !isset($_POST['supprimer']);
	}
	
	
    private function __construct()
    {
		$this->serieDAO = (new SerieDAO)::getInstance();
    }
    
}
?>