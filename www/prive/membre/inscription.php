<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<?php
include "../../public/page/page-header.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurInscription.php';
$controlleur = ControlleurInscription::getInstance();
$etape = $controlleur->getEtape();

if(isset($_POST)){
    print_r($_POST);
}
?>

<ul class="breadcrumb-counter-nav" style="counter-reset: section;">
  <li class="breadcrumb-counter-nav-item active current"><a href="#">Inscription</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=2){echo active;} ?>"><a href="<?php if($etape>=2){ echo './parametres';} else {echo '#';} ?>">Parametres</a></li>
  <li class="breadcrumb-counter-nav-item <?php if($etape>=3) {echo active;} ?>"><a href="<?php if($etape>=3) {echo './liste';} else {echo '#';} ?>">Liste</a></li>
</ul>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" method="post" action="./inscription">
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
	  
	  <label>Nom d'utilisateur
        <input type="text" name="pseudonyme" placeholder="somebody" required>
      </label>
      <label>Courriel
        <input type="email" name="courriel" placeholder="somebody@example.com" required>
      </label>
      <label>Mot de passe
        <input type="password" name="motDePasse" placeholder="Password" required>
      </label>
      <p><input type="submit" class="button expanded" value="Sign up"></input></p>
    </form>
</div>
<?php
include "../../public/page/page-footer.php";
?>