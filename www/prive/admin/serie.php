<?php
include "page/page-header.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center">Rick and Morty</h4>
		<p>Saisons : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a></p>
		<hr>

		<label>Titre Anglais
			<input type="text" value="Rick and Morty">
		</label>
		<label>Titre Français
			<input type="text" value="Rick et Morty">
		</label>
		<label>Description Anglais
			<textarea rows="4" cols="50">An animated series that follows the exploits of a super scientist and his not-so-bright grandson.
			</textarea>
		</label>
		<label>Description Français
			<textarea rows="4" cols="50">Ceci est une description en français de la série Rick and Morty
			</textarea>
		</label>
		<p><input type="checkbox" name="fini">Série terminée</p>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>