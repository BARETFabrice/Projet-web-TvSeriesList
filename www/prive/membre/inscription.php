<?php
include "../../public/page/page-header.php";
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
      <h4 class="text-center">Inscription membre</h4>
	  <hr>
	  <label>Nom d'utilisateur
        <input type="text" placeholder="somebody">
      </label>
      <label>Courriel
        <input type="email" placeholder="somebody@example.com">
      </label>
      <label>Mot de passe
        <input type="password" placeholder="Password">
      </label>
      <p><input type="submit" class="button expanded" value="Sign up"></input></p>
    </form>
</div>
<?php
include "../../public/page/page-footer.php";
?>