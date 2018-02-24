<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurInscription.php';
$membre=controlleurInscription::getInstance()->getMembre();

?>

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