<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<?php
include "../../public/page/pageHeader.php";
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
      <h4 class="text-center">Se connecter en tant que membre</h4>
      
      <hr>
	  
	  <h6>Se connecter avec</h6>
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
        <input type="text" placeholder="somebody">
      </label>
      <label>Mot de passe
        <input type="password" placeholder="Password">
      </label>
      <p><input type="submit" class="button expanded" value="Log in"></input></p>
      <p class="text-center"><a href="#">Vous avez oublié votre mot de passe ?</a></p>
    </form>
</div>
<?php
include "../../public/page/pageFooter.php";
?>