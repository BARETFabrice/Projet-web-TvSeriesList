<?php
include "page/page-header.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSerie.php';

$id = (int) $_GET['id'];
$controlleur = ControlleurPageSerie::getInstance();
$serie = $controlleur->getSerie($id);

if (isset($_POST['modifier'])) {
		if(!isset($_POST['fini']))
		{
			$_POST['fini'] = false;
		}
        $controlleur->modifierSerie($id, $_POST['titre'], $_POST['titre_fr'], $_POST['description'], $_POST['description_fr'], NULL, $_POST['fini']);
		header("Refresh:0");
    }
    elseif (isset($_POST['supprimer'])) {
       echo 'Supprimerrrrr';
    }
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="./serie.php?id=<?=$id?>" method="post">
		<h4 class="text-center"><?php echo $serie->getTitre()?></h4>
		<p>Saisons : <a href="#">1</a> - <a href="#">2</a> - <a href="#">3</a></p>
		<hr>

		<label>Titre Anglais
			<input type="text" name="titre" value="<?php echo $serie->getTitre()?>">
		</label>
		<label>Titre Français
			<input type="text" name="titre_fr" value="<?php echo $serie->getTitre_fr()?>">
		</label>
		<label>Description Anglais
			<textarea name="description" rows="4" cols="50"><?php echo $serie->getDescription()?>
			</textarea>
		</label>
		<label>Description Français
			<textarea name="description_fr" rows="4" cols="50"><?php echo $serie->getDescription_fr()?>
			</textarea>
		</label>
		<p><input type="checkbox" name="fini"<?php if($serie->isFini()){echo 'checked';}?>>Série terminée</p>
		<p><input type="submit" class="button expanded" name="modifier" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" name="supprimer" value="Supprimer"></input></p>
    </form>
</div>

<?php
include "page/page-footer.php";
?>