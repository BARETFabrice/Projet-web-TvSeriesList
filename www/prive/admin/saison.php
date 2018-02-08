<?php
include "page/page-header.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<a href="#"><h4 class="text-center">Rick and Morty</h4></a>
		<h2 class="text-center">Saison 1</h2>
		<p>Saisons : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a></p>
		<p>Épisodes : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a> - <a href="#">4</a> - <a href="#">5</a> - <a href="#">6</a> - <a href="#">7</a> - <a href="#">8</a> - <a href="#">9</a> - <a href="#">10</a> - <a href="#">11</a> - <a href="#">12</a></p>
		<hr>

		<label>Titre Anglais
			<input type="text" value="Rick and Morty">
		</label>
		<label>Titre Français
			<input type="text" value="Rick et Morty">
		</label>
		<p><input type="checkbox" name="fini">Saison terminée</p>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>