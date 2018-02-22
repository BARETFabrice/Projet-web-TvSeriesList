<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSerie.php';

$id = (int) $_GET['id'];
$controlleurSerie = ControlleurPageSerie::getInstance();
$serie = $controlleurSerie->getSerie($id);

$controlleurSerie->verifierFormulaireAdmin($id);
	
if ($controlleurSerie->estPasEnSuppression())
{
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="" method="post">
		<h4 class="text-center"><?=$serie->getTitre()?></h4>
		<?php $controlleurSerie->getListeSaisonsParSerieAdmin($id); ?>
		<hr>

		<label>Titre Anglais
			<input type="text" name="titre" value="<?=$serie->getTitre()?>">
		</label>
		<label>Titre Français
			<input type="text" name="titre_fr" value="<?=$serie->getTitre_fr()?>">
		</label>
		<label>Description Anglais
			<textarea name="description" rows="4" cols="50"><?=$serie->getDescription()?>
			</textarea>
		</label>
		<label>Description Français
			<textarea name="description_fr" rows="4" cols="50"><?=$serie->getDescription_fr()?>
			</textarea>
		</label>
		<p><input type="checkbox" name="fini"<?php if($serie->isFini()){echo 'checked';}?>>Série terminée</p>
		<p><input type="submit" class="button expanded" name="modifier" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" name="supprimer" value="Supprimer"></input></p>
    </form>
</div>

<?php
}
include "fragmentBasPage.php";
?>