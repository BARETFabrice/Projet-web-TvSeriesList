<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurLangue.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurConnexion.php';

if(isset($_POST['changeLanguage']))
    $locale = controlleurLangue::setLangue($_POST['changeLanguage']);
else
    $locale = controlleurLangue::getLangue();

$racine = $_SERVER['DOCUMENT_ROOT']."/locales";
$domaine = "messages"; // nom du fichier .mo - identique pour toutes les langues

putenv('LANG='.$locale);
//putenv('LC_ALL='.$locale); // windows standard
//setlocale(LC_MESSAGES, $locale);		
setlocale(LC_ALL, $locale); // windows standard
bindtextdomain($domaine, $racine);
textdomain($domaine);

?>
<!DOCTYPE HTML>
<html class="no-js" lang="fr" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TvSeriesList.net</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel='stylesheet' href='../css/style.css'>
</head>
<body>
    <header>
        <div class="row">
            <div class="medium-4 columns">
                <a href="../"><h1>TvSeriesList.net</h1></a>
                <!--p>taille image 450x183</p-->
            </div>
            <div class="medium-8 columns"></div>
        </div>
        <br>
        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>
        <div class="top-bar" id="main-menu">
            <ul class="menu vertical medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown">
                <li class="has-menu"><a href="../"><?php echo _('Accueil')?></a></li>
                <li class="has-menu"><a href="../series"><?php echo _('Series')?></a></li>
				<li class="has-menu"><a href="../series/top"><?php echo _('Meilleures')?></a></li>
                <li class="has-menu"><a href="../series/new"><?php echo _('Nouveautées')?></a></li>
                <?php if(controlleurConnexion::isConnecte()){ ?>
                <li class="has-menu"><a href="../liste"><?php echo _('Liste')?></a></li>
                <li class="has-menu"><a href="../parametres"><?php echo _('Parametres')?></a></li>
                <?php }else{ ?>
                <li class="has-menu"><a href="../inscription"><?php echo _('Inscription')?></a></li>
                <li class="has-menu"><a href="../connexion"><?php echo _('Connexion')?></a></li>
                <?php } ?>
            </ul>
        </div>
    </header>