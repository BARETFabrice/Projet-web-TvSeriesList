<?php
include "../../public/fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurParametres.php';

$membre=getMembre();
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" method="post">
      <h4 class="text-center">Modifier parametres du membre</h4>
      
      <hr>
      
      <label>Notifications
        <input name="notification" type="checkbox" <?php if($membre->isNotification())echo 'checked'; ?>>
      </label>
      
      <label>Courriel
        <input type="email" name="courriel" value="<?=$membre->getCourriel()?>" disabled>
      </label>
	  
	  <label>Changer de nom
        <input type="text" name="pseudonyme" value="<?=$membre->getPseudonyme()?>">
      </label>
      
      <label>Changer de Mot de passe
        <input name="vieuxMotDePasse" type="password" placeholder="Old Password">
        <input name="motDePasse" type="password" placeholder="New Password">
      </label>
      
      <p><input name="submitParametres" type="submit" class="button expanded" value="Confirm"></input></p>
    </form>
</div>

<?php
include "../../public/fragmentBasPage.php";
?>