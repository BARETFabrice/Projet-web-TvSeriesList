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
	
    private function __construct()
    {
		$this->saisonDAO = (new SaisonDAO)::getInstance();
    }
    
}
?>