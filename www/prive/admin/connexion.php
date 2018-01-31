<?php
include "page/page-header.php";
?>
<form class="log-in-form">
  <h4 class="text-center">Se connecter en tant qu'admin</h4>
  <label>Courriel
    <input type="email" placeholder="somebody@example.com">
  </label>
  <label>Mot de passe
    <input type="password" placeholder="Password">
  </label>
  <p><input type="submit" class="button expanded" value="Log in"></input></p>
  <p class="text-center"><a href="#">Vous avez oublié votre mot de passe ?</a></p>
</form>
<?php
include "page/page-footer.php";
?>