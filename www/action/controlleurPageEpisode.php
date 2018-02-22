<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/EpisodeDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Episode.php';

class ControlleurPageEpisode
{
    private static $instance=null;
	private $episodeDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new ControlleurPageEpisode();
        }
        return self::$instance;
    }
	
	public function getEpisode($id)
	{
		return $this->episodeDAO->getEpisode($id);
	}
	
	public function ajouterEpisode($idSaison, $numero, $titre, $titre_fr, $description, $description_fr, $datePremiere)
	{
		$episode = new Episode(NULL, $idSaison, $numero, $titre, $titre_fr, $description, $description_fr, $datePremiere);
		$this->episodeDAO->ajouterEpisode($episode);
	}
	
	public function modifierEpisode($id, $idSaison, $numero, $titre, $titre_fr, $description, $description_fr, $datePremiere)
	{
		$episode = new Episode($id, $idSaison, $numero, $titre, $titre_fr, $description, $description_fr, $datePremiere);
		$this->episodeDAO->modifierEpisode($episode);
	}
	
	public function supprimerEpisode($id)
	{
		$this->episodeDAO->supprimerEpisode($id);
	}
	
	public function getEpisodesParSaison($idSaison)
	{
		return $this->saisonDAO->getSaisonsParSerie($idSerie);
	}
	
    private function __construct()
    {
		$this->episodeDAO = (new EpisodeDAO)::getInstance();
    }
    
}
?>