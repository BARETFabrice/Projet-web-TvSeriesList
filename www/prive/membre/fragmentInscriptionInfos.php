<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurInscription.php';
$membre=controlleurInscription::getInstance()->getMembre();

?>

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