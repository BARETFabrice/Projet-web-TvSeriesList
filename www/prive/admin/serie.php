<?php
include "page/page-header.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSerie.php';
$id = (int) $_GET['id'];
$controlleur = ControlleurPageSerie::getInstance();
$serie = $controlleur->getSerie($id);

?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center"><?php echo $serie->getTitre()?></h4>
		<p>Saisons : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a></p>
		<hr>

		<label>Titre Anglais
			<input type="text" value="<?php echo $serie->getTitre()?>">
		</label>
		<label>Titre Français
			<input type="text" value="<?php echo $serie->getTitre_fr()?>">
		</label>
		<label>Description Anglais
			<textarea rows="4" cols="50"><?php echo $serie->getDescription()?>
			</textarea>
		</label>
		<label>Description Français
			<textarea rows="4" cols="50"><?php echo $serie->getDescription_fr()?>
			</textarea>
		</label>
		<p><input type="checkbox" name="fini"<?php if($serie->isFini()){echo 'checked';}?>>Série terminée</p>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>