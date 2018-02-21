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
	
	public function modifierSerie($id, $titre, $titre_fr, $description, $description_fr, $image, $fini)
	{
		$serie = new Serie($id, $titre, $titre_fr, $description, $description_fr, $image, $fini);
		$this->serieDAO->modifierSerie($serie);
	}
	
	public function supprimerSerie($id)
	{
		$this->serieDAO->supprimerSerie($id);
	}
	
	
    private function __construct()
    {
		$this->serieDAO = (new SerieDAO)::getInstance();
    }
    
}
?>