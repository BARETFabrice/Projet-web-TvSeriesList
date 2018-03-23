<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

if(!controlleurConnexion::isConnecte())
    header("Location: ./inscription");
    
$erreur="";

if(!empty($_GET['notification']))
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
    
    $membreDAO=MembreDAO::getInstance();
	
	$membre = getMembre();
	if($_GET['notification'] == 'false')
	{
		$membre->setNotification(0);
	}
	else
	{
		$membre->setNotification(1);
	}
	$membreDAO->modifierMembreSansMotDePasse($membre);
}

if(!empty($_GET['nom']))
{
	require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
    
    $membreDAO=MembreDAO::getInstance();
	
	$membre = getMembre();
	
	$membre->setPseudonyme($_GET['nom']);

	$membreDAO->modifierMembreSansMotDePasse($membre);
}


function getMessageErreur()
{
    return $erreur;
}
    
function getMembre()
{
    return controlleurConnexion::getMembre();
}

if(isset($_POST['submitParametres']))
{
    require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
    
    $membreDAO=MembreDAO::getInstance();
    
    $membre=getMembre();
    
    $membre->setGestionErreur(true);
    
    try{
        
        $membre->setNotification(isset($_POST['notification']));
        
        if($membre->getPseudonyme() !== $_POST['pseudonyme'])
        {
            $membreTest = new Membre();
            $membreTest->setPseudonyme($_POST['pseudonyme']);
	        
    	    if(!$membreDAO->verifierDoublonPseudonyme($membreTest))
    	        throw new Exception('pseudonyme deja prit');
    	    else
    	        $membre->setPseudonyme($_POST['pseudonyme']);
    	       
        }
        
        $changerMotDePasse=false;
        
        if(!empty($_POST['motDePasse']) && !empty($_POST['vieuxMotDePasse']))
        {
            $membreTest = new Membre();
            $membreTest->setMotDePasse($_POST['vieuxMotDePasse']);
            $membreTest->hashMotDePasse();
            
            if($membreTest->getMotDePasse() === $membre->getMotDePasse())
            {
                $membre->setMotDePasse($_POST['motDePasse']);
                $membre->hashMotDePasse();
                $changerMotDePasse=true;
            }
            else
                throw new Exception('Vieux mot de passe incorrect');
        }
        
        if($changerMotDePasse)
            $membreDAO->modifierMembre($membre);
        else
            $membreDAO->modifierMembreSansMotDePasse($membre);
    }
    catch(Exception $e){$erreur=$e->getMessage();}
    
    $membre->setGestionErreur(false);
    
}

?>