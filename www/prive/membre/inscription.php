<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/public/fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurInscription.php';

$controlleur=controlleurInscription::getInstance();

$controlleur->verifierHTTP();

$etape=$controlleur->getEtape();
$etapePage=$controlleur->getEtapePage();
?>

<ul class="breadcrumb-counter-nav" style="counter-reset: section;">
  <li class="breadcrumb-counter-nav-item active <?php if($etapePage==1){echo 'current';} ?>"><a href="<?php if($etape>=2){ echo './inscription?etape=1';} else {echo '#';}?>">Courriel</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=2){echo ' active';} if($etapePage==2){echo ' current';}?>"><a href="<?php if($etape>=2){ echo './inscription?etape=2';} else {echo '#';} ?>">Mot De Passe</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=3){echo ' active';} if($etapePage==3){echo ' current';} ?>"><a href="<?php if($etape>=3) {echo './inscription?etape=3';} else {echo '#';} ?>">Infos</a></li>
</ul>
    
<p class="messageErreure"><?php  $controlleur->afficherMessageErreur();  ?></p>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    
<?php  $controlleur->afficherFragment();  ?>
    
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/public/fragmentBasPage.php";
?>