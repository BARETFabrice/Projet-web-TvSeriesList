<?php
include "../../public/page/page-header.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
      <h4 class="text-center">Modifier parametres du membre</h4>
      
      <hr>
      
      <label>Notifications
        <input type="checkbox">
      </label>
      
      <label>Visibilité de votre liste
        <select name="visibility">
          <option value="private">Privée</option>
          <option value="friends">Amis seulement</option>
          <option value="public">Publique</option>
        </select>
      </label>
	  
	  <label>Changer de nom
        <input type="text" placeholder="somebody">
      </label>
      
      <label>Changer de Mot de passe
        <input type="password" placeholder="Old Password">
        <input type="password" placeholder="New Password">
      </label>
      
      <p><input type="submit" class="button expanded" value="Confirm"></input></p>
    </form>
</div>

<?php
include "../../public/page/page-footer.php";
?>