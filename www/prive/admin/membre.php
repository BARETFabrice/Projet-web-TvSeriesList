<?php
include "page/page-header.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center">bob</h4>
		<hr>

		<label>Pseudonyme
			<input type="text" value="bob">
		</label>
		<label>Courriel
			<input type="text" value="bob@bob.bob">
		</label>
		<p><input type="checkbox" name="fini">Auteur</p>
		<p><input type="checkbox" name="fini">Modérateur</p>
		<p><input type="checkbox" name="fini">Notifications</p>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
		<p><input type="submit" class="button expanded secondary" value="Nouveau mot de passe"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>
