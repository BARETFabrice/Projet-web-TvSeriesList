<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/DonationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';

$don = new Donation();
$don->setGestionErreur(true);

try{
    if(empty($_GET['tx']) || empty($_GET['amt']) || empty($_GET['cc']) || !$_GET['st']=='Completed')
        throw new Exception("");
    
    $don->setMontant($_GET['amt']);
    
    if(controlleurConnexion::isConnecte())
         $don->setIdMembre(controlleurConnexion::getMembre()->getId());
   
}
catch(Exception $e)
{
    header("Location: ./");
}
    DonationDAO::getInstance()->ajouterDonation($don);

?>