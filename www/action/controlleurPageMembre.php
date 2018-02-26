<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

class controlleurPageMembre
{
    private static $instance=null;
	private $membreDAO;
    
    public static function getInstance()
    {
        if (self::$instance == null) 
        {
            self::$instance = new controlleurPageMembre();
        }
        return self::$instance;
    }
	
	public function getMembre($id)
	{
		return $this->membreDAO->getMembre($id);
	}
	
	public function ajouterMembre($pseudonyme, $courriel, $motDePasse, $notification, $auteur, $moderateur)
	{
	    $param = [
	        'courriel'=>$courriel,
	        'pseudonyme'=>$pseudonyme,
	        'motDePasse'=>$motDePasse,
	        'notification'=>$notification,
	        'auteur'=>$auteur,
	        'moderateur'=>$moderateur
	    ];
	    
		$membre = new Membre($param);
		$this->membreDAO->ajouterMembre($membre);
	}
	
	public function modifierMembre($id, $pseudonyme, $courriel, $motDePasse, $notification, $auteur, $moderateur)
	{
		$param = [
		    'idMembre'=>$id,
	        'courriel'=>$courriel,
	        'pseudonyme'=>$pseudonyme,
	        'motDePasse'=>$motDePasse,
	        'notification'=>$notification,
	        'auteur'=>$auteur,
	        'moderateur'=>$moderateur
	    ];
	    
		$membre = new Membre($param);
		$this->membreDAO->modifierMembre($membre);
	}
	
	public function supprimerMembre($id)
	{
		$this->membreDAO->supprimerMembre($id);
	}
	
	public function rechercherMembre($recherche)
	{
		return $this->membreDAO->rechercherMembre($recherche);
	}
	
	public function verifierFormulaireAdmin($id)
	{
			if (isset($_POST['modifier'])) {
				if(!isset($_POST['fini']))
				{
					$_POST['fini'] = false;
				}
				$this->modifierMembre($id, $_POST['courriel'], $_POST['pseudonyme'], $_POST['motDePasse'], $_POST['notification'], $_POST['auteur'], $_POST['moderateur']);
				header("Location: ./membre.php?id=$id");
			}
			elseif(isset($_POST['confirmersupp'])){
				$this->supprimerMembre($id);
				header("Location: ./liste-membre.php");
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
	
	public function estPasEnSuppression()
	{
		return !isset($_POST['supprimer']);
	}
	
	
    private function __construct()
    {
		$this->membreDAO = MembreDAO::getInstance();
    }
    
}
?>