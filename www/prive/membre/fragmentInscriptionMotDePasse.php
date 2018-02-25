<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurInscription.php';
$membre=controlleurInscription::getInstance()->getMembre();

?>

<form class="log-in-form" method="post" action="./inscription?etape=3" novalidate>
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