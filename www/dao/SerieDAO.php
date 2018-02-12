<?php

require_once '../modele/Serie.php';

class SerieDAO
{
	private $connexion;
	
	function __construct(){
		require_once 'ConnexionBaseDeDonnees.php';
		$this->connexion=$connexion;
	}
	
	function __destruct() {
	$this->connexion=null;
	}
	
	function getSerie($idSerie)
	{
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM Serie WHERE idSerie=:idSerie';
		$stmt = $this->connexion->prepare($sql); 
		
		$stmt->bindParam(':idSerie', $idSerie);
		
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$serie = new Serie($result['idSerie'], $result['titre'], $result['titre_fr'], $result['description'], $result['description_fr'], $result['image'], $result['fini']);
		
		return $serie;
		
		//$serieDAO->getSerie(1)->getDescription(); pour utiliser
	}
	
	function ajouterSerie($serie){}
	
	function supprimerSerieParId($idSerie){}
	
	function modifierSerie($serie){}
	
	function getSerieLesPlusVue(){}
}

$serieDAO = new SerieDAO();

?>