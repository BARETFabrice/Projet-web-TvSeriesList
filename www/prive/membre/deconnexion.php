<?php

include $_SERVER['DOCUMENT_ROOT'].'/public/fragmentHautPage.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

controlleurConnexion::deconnecter();

header("Location: ./");

include $_SERVER['DOCUMENT_ROOT'].'/public/fragmentBasPage.php';
?>