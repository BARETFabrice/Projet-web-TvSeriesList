<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSerie.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSaison.php';

$id = (int) $_GET['id'];
$controlleurSerie = ControlleurPageSerie::getInstance();
$controlleurSaison = ControlleurPageSaison::getInstance();
$serie = $controlleurSerie->getSerie($id);

$controlleurSerie->verifierFormulaireAdmin($id);
	
if (!isset($_POST['supprimer']))
{
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="" method="post">
		<h4 class="text-center"><?=$serie->getTitre()?></h4>
		<?php
			$saisons = $controlleurSaison->getSaisonsParSerie($id);
			if(sizeof($saisons) > 0)
			{
				echo "<p>Saisons : ";
				$iteration = 0;
				foreach($saisons as $saison){
					$idSaison = $saison->getId();
					$numeroSaison = $saison->getNumero();
					if($iteration == 0)
					{
						echo "<a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
					}
					else
					{
						echo "- <a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
					}
					$iteration++;
				}
				echo "</p>";
			}
		?>
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