<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageMembre.php';

$controlleur = controlleurPageMembre::getInstance();

if (isset($_POST['ajouter'])) {
        $controlleur->ajouterMembre($_POST['pseudonyme'], $_POST['courriel'], $_POST['motDePasse'],  isset($_POST['notification']), isset($_POST['auteur']), isset($_POST['moderateur']));
		header("Location: ./liste-membres.php");
    }
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" method="post">
		<h4 class="text-center">Membre</h4>
		<hr>

		<label>Pseudonyme
			<input type="text" name="pseudonyme" value="">
		</label>
		<label>Courriel
			<input type="text" name="courriel" value="">
		</label>
		<label>Mot de passe
			<input type="text" name="motDePasse" value="">
		</label>
		<p><input type="checkbox" name="auteur">Auteur</p>
		<p><input type="checkbox" name="moderateur">Modérateur</p>
		<p><input type="checkbox" checked name="notification">Notifications</p>
		<p><input type="submit" name="ajouter" class="button expanded" value="Ajouter"></input></p>
    </form>
</div>


<?php
include "fragmentBasPage.php";
?>