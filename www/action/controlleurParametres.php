<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

if(!controlleurConnexion::isConnecte())
    header("Location: ./inscription");
    
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
        $membre->setPseudonyme($_POST['pseudonyme']);
        $membre->setNotification(isset($_POST['notification']));
        
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
    catch(Exception $e){echo 'error: '.$e->getMessage();}
    
    $membre->setGestionErreur(false);
    
}

?>