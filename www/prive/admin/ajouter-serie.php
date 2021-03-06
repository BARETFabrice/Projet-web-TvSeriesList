﻿<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSerie.php';

$controlleur = controlleurPageSerie::getInstance();

if (isset($_POST['ajouter'])) {
		if(!isset($_POST['fini']))
		{
			$_POST['fini'] = false;
		}
        $controlleur->ajouterSerie($_POST['titre'], $_POST['titre_fr'], $_POST['description'], $_POST['description_fr'], NULL, $_POST['fini']);
		header("Location: ./series/");
    }
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="./ajouter-serie.php" method="post">
		<h4 class="text-center">Nouvelle Série</h4>
		<hr>

		<label>Titre Anglais
			<input type="text" name="titre" value="">
		</label>
		<label>Titre Français
			<input type="text" name="titre_fr" value="">
		</label>
		<label>Description Anglais
			<textarea name="description" rows="4" cols="50">
			</textarea>
		</label>
		<label>Description Français
			<textarea name="description_fr" rows="4" cols="50">
			</textarea>
		</label>
		<p><input type="checkbox" name="fini">Série terminée</p>
		<p><input type="submit" class="button expanded success" name="ajouter" value="Ajouter"></input></p>
    </form>
</div>

<?php
include "fragmentBasPage.php";
?>