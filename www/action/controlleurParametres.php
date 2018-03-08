<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

if(!controlleurConnexion::isConnecte())
    header("Location: ./inscription");
    
function getMembre()
{
    return controlleurConnexion::getMembre();
}

?>