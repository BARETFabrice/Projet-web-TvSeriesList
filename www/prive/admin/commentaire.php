<?php
include "fragmentHautPage.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center">Commentaire</h4>
		<p>Par <a href="#">Fred</a></p>
		<p>Article : <a href="#">Les meilleurs moments de LOST</a></p>
		<hr>

		<label>Contenu
			<textarea rows="4" cols="50">Quel article incroyable! Félicitation!
			</textarea>
		</label>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "fragmentBasPage.php";
?>