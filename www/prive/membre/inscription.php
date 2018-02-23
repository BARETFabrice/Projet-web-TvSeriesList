<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/public/page/fragmentHeader.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurInscription.php';

$controlleur = ControlleurInscription::getInstance();

if(isset($_POST['etape1']))
{
    $controlleur->onSubmitEtape1($_POST['courriel']);
}
else if(isset($_POST['etape2']))
{
    $controlleur->onSubmitEtape2($_POST['motDePasse']);
}
else if(isset($_POST['etape3']))
{
    $notification=false;
    
    if(isset($_POST['notification']))
        $notification=true;
    
    $controlleur->onSubmitEtape3($_POST['pseudonyme'],$notification);
    header("Location: ./");
}

$etape = $controlleur->getEtape();
$membre=$controlleur->getMembre();

if(isset($_GET['etape']) && ($_GET['etape'] == 1 || $_GET['etape'] == 2 || $_GET['etape'] == 3 || $_GET['etape'] == 4))
    $etapePage=$_GET['etape'];

if(!isset($etapePage) || $etapePage>$etape)
    $etapePage=1;
?>

<ul class="breadcrumb-counter-nav" style="counter-reset: section;">
  <li class="breadcrumb-counter-nav-item active <?php if($etapePage==1){echo 'current';} ?>"><a href="<?php if($etape>=2){ echo './inscription?etape=1';} else {echo '#';}?>">Courriel</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=2){echo ' active';} if($etapePage==2){echo ' current';}?>"><a href="<?php if($etape>=2){ echo './inscription?etape=2';} else {echo '#';} ?>">Mot De Passe</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=3){echo ' active';} if($etapePage==3){echo ' current';} ?>"><a href="<?php if($etape>=3) {echo './inscription?etape=3';} else {echo '#';} ?>">Infos</a></li>
</ul>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    
    <?php if($etapePage==1){ ?>
    
    <form class="log-in-form" method="post" action="./inscription?etape=2">
      <h4 class="text-center">Inscription membre</h4>
	  
	  <hr>
	  
	  <h6>S'inscrire avec</h6>
    <button type="button" class="button social facebook">
      <i class="fab fa-facebook" aria-hidden="true"></i> Facebook 
    </button>
    <button type="button" class="button social twitter">
      <i class="fab fa-twitter" aria-hidden="true"></i> Twitter 
    </button>
    <button type="button" class="button social google-plus">
      <i class="fab fa-google-plus" aria-hidden="true"></i> Google+ 
    </button>
	  
	  <hr>
	  
      <label>Courriel
        <input type="email" name="courriel" value="<?=$membre->getCourriel()?>"placeholder="somebody@example.com" required>
      </label>
      <p><input type="submit" name="etape1" class="button expanded" value="Sign up"></input></p>
    </form>
    <?php } ?>
    
    <?php if($etapePage==2){ ?>
    
    <form class="log-in-form" method="post" action="./inscription?etape=3">
      <h4 class="text-center">Inscription membre</h4>
	  
	  <hr>
      <label>Mot de passe
        <input type="password" value="<?=$membre->getMotDePasse()?>" name="motDePasse" placeholder="Password" required>
      </label>
      <label>Confirmer Mot de passe
        <input type="password" value="<?=$membre->getMotDePasse()?>" name="confirmerMotDePasse" placeholder="Password" required>
      </label>
      <p><input type="submit" name="etape2" class="button expanded" value="Sign up"></input></p>
    </form>
    <?php } ?>
    
    <?php if($etapePage==3){ ?>
    
    <form class="log-in-form" method="post" action="./inscription?etape=4">
      <h4 class="text-center">Inscription membre</h4>
	  
	  <hr>
	  
	  <label>Nom d'utilisateur
        <input type="text" value="<?=$membre->getPseudonyme()?>" name="pseudonyme" placeholder="somebody" required>
      </label>
      
      
      <label>Notifications
        <input type="checkbox" <?php if($membre->isNotification()){echo 'checked';} ?> name="notification">
      </label>
      
      <p><input type="submit" name="etape3" class="button expanded" value="Sign up"></input></p>
    </form>
    <?php } ?>
    
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/public/page/fragmentFooter.php";
?>