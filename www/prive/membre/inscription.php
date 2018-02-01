<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<?php
include "../../public/page/page-header.php";
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
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