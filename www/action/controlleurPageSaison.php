<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/SaisonDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Saison.php';

class ControlleurPageSaison
{
    private static $instance=null;
	private $saisonDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurPageSaison();
        }
        return self::$instance;
    }
	
	public function getSaison($id)
	{
		return $this->saisonDAO->getSaison($id);
	}
	
	public function ajouterSaison($idSerie, $numero, $titre, $titre_fr, $image, $fini)
	{
		$saison = new Saison(NULL, $idSerie, $numero, $titre, $titre_fr, $image, $fini);
		$this->saisonDAO->ajouterSaison($saison);
	}
	
	public function modifierSaison($id, $idSerie, $numero, $titre, $titre_fr, $image, $fini)
	{
		$saison = new Saison($id, $idSerie, $numero, $titre, $titre_fr, $image, $fini);
		$this->saisonDAO->modifierSaison($saison);
	}
	
	public function supprimerSaison($id)
	{
		$this->saisonDAO->supprimerSaison($id);
	}
	
	public function getSaisonsParSerie($idSerie)
	{
		return $this->saisonDAO->getSaisonsParSerie($idSerie);
	}
	
	public function verifierFormulaireAdmin($id, $idSerie)
	{
		if (isset($_POST['modifier'])) {
			if(!isset($_POST['fini']))
			{
				$_POST['fini'] = false;
			}
			$this->modifierSaison($id, $idSerie, $_POST['numero'], $_POST['titre'], $_POST['titre_fr'], NULL, $_POST['fini']);
			header("Location: ./saison.php?id=$id");
		}
		elseif(isset($_POST['confirmersupp'])){
			//$this->supprimerSaison($id);
			header("Location: ./serie.php?id=$idSerie");
		}
		elseif (isset($_POST['supprimer'])) {
			echo "
				<div class='row column align-center medium-6 large-4 container-padded div_login'>
				<form class='log-in-form' action='./saison.php?id=$id' method='post'>
				<h4 class='text-center'>Confirmer la suppression</h4>
				<p><input type='submit' class='button expanded alert' name='confirmersupp' value='Confirmer'></input></p>
				</form>
				</div>
			";
		}
	}
	
	public function getListeSaisonsParSerieAdmin($id, $idSerie)
	{
		$saisons = $this->getSaisonsParSerie($idSerie);
		if(sizeof($saisons) > 0)
		{
			echo "<p>Saisons : ";
			$iteration = 0;
			foreach($saisons as $uneSaison){
				$idSaison = $uneSaison->getId();
				$numeroSaison = $uneSaison->getNumero();
				if($iteration == 0)
				{
					if($idSaison == $id)
						echo "$numeroSaison ";
					else
						echo "<a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
				}
				else
				{
					if($idSaison == $id)
						echo "- $numeroSaison ";
					else
						echo "- <a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
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
		$this->saisonDAO = (new SaisonDAO)::getInstance();
    }
    
}
?>