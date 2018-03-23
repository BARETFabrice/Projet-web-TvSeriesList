<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSerie.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSaison.php';

$id = (int) $_GET['id'];
$controlleurSaison = controlleurPageSaison::getInstance();
$controlleurSerie = controlleurPageSerie::getInstance();
$saison = $controlleurSaison->getSaison($id);
$idSerie = $saison->getIdSerie();

$controlleurSaison->verifierFormulaireAdmin($id, $idSerie);

if ($controlleurSerie->estPasEnSuppression())
{
	$serie = $controlleurSerie->getSerie($saison->getIdSerie());
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="" method="post">
		<a href="../serie/?id=<?=$serie->getId()?>"><h4 class="text-center"><?=$serie->getTitre()?></h4></a>
		<h2 class="text-center">Saison <?=$saison->getNumero()?></h2>
		<?php $controlleurSaison->getListeSaisonsParSerieAdmin($id, $idSerie); ?>
		<p>Épisodes : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a> - <a href="#">4</a> - <a href="#">5</a> - <a href="#">6</a> - <a href="#">7</a> - <a href="#">8</a> - <a href="#">9</a> - <a href="#">10</a> - <a href="#">11</a> - <a href="#">12</a></p>
		<hr>

		<label>Numéro de la saison
			<input type="number" name="numero" value="<?=$saison->getNumero()?>">
		</label>
		<label>Titre Anglais
			<input type="text" name="titre" value="<?=$saison->getTitre()?>">
		</label>
		<label>Titre Français
			<input type="text" name="titre_fr" value<?=$saison->getTitre_fr()?>">
		</label>
		<p><input type="checkbox" name="fini" <?php if($saison->isFini()){echo 'checked';}?>>Saison terminée</p>
		<p><input type="submit" class="button expanded" name="modifier" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" name="supprimer" value="Supprimer"></input></p>
    </form>
</div>

<?php
}
include "fragmentBasPage.php";
?>