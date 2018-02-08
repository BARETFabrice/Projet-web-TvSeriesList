<?php
require_once "../action/controlleur/ControlleurVue.php";

ControlleurVue::getInstance()::test();




    
$langue = 'en';
if(!empty($_GET['langue']))$langue = filter_var($_GET['langue'], FILTER_SANITIZE_URL);

if($langue == 'fr')
    $locale = "fr_CA";
else if($langue == 'en')
    $locale = "en_CA";

$racine = "../locales";
$domaine = "messages"; // nom du fichier .mo - identique pour toutes les langues

putenv('LANG='.$locale);
//putenv('LC_ALL='.$locale); // windows standard
setlocale(LC_MESSAGES, $locale);		
//setlocale(LC_ALL, $locale); // windows standard
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
                <li class="has-menu"><a href="../connexion"><?php echo _('Connexion')?></a></li>
            </ul>
        </div>
    </header>