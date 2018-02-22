<?php
include "fragmentHautPage.php";
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<a href="#"><h4 class="text-center">Rick and Morty</h4></a>
		<h2 class="text-center">Episode 2</h2>
		<p>Saisons : 1 - <a href="#">2</a> - <a href="#">3</a></p>
		<p>Épisodes : <a href="#">1</a> - 2 - <a href="#">3</a> - <a href="#">4</a> - <a href="#">5</a> - <a href="#">6</a> - <a href="#">7</a> - <a href="#">8</a> - <a href="#">9</a> - <a href="#">10</a> - <a href="#">11</a> - <a href="#">12</a></p>
		<hr>

		<label>Titre Anglais
			<input type="text" value="Lawnmower Dog">
		</label>
		<label>Titre Français
			<input type="text" value="Chien Tondeuse">
		</label>
		<label>Description Anglais
			<textarea rows="4" cols="50">An animated series that follows the exploits of a super scientist and his not-so-bright grandson.
			</textarea>
		</label>
		<label>Description Français
			<textarea rows="4" cols="50">Ceci est une description en français de la série Rick and Morty
			</textarea>
		</label>
		<label>Date de première
			<input type="date" value="2015-08-23">
		</label>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "fragmentBasPage.php";
?>