<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

$idMembre=null;

if(controlleurConnexion::isConnecte())
    $idMembre=controlleurConnexion::getMembre()->getId();

try{
    if(empty($_GET['tx']) || empty($_GET['amt']) || empty($_GET['cc']))
        throw new Exception("");
        
}
catch(Exception $e)
{
    header("Location: ./");
}
    

?>