<?php
include "page/page-header.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSerie.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSaison.php';

$id = (int) $_GET['id'];
$controlleurSaison = ControlleurPageSaison::getInstance();
$controlleurSerie = ControlleurPageSerie::getInstance();
$saison = $controlleurSaison->getSaison($id);
$serie = $controlleurSerie->getSerie($saison->getIdSerie());
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<a href="serie.php?id=<?=$serie->getId()?>"><h4 class="text-center"><?=$serie->getTitre()?></h4></a>
		<h2 class="text-center">Saison <?=$saison->getNumero()?></h2>
		<?php
			$saisons = $controlleurSaison->getSaisonsParSerie($serie->getId());
			if(sizeof($saisons) > 0)
			{
				echo "<p>Saisons : ";
				$iteration = 0;
				foreach($saisons as $uneSaison){
					$idSaison = $uneSaison->getId();
					$numeroSaison = $uneSaison->getNumero();
					if($iteration == 0)
					{
						if($idSaison == $saison->getId())
							echo "$numeroSaison ";
						else
							echo "<a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
					}
					else
					{
						if($idSaison == $saison->getId())
							echo "- $numeroSaison ";
						else
							echo "- <a href='saison.php?id=$idSaison'>$numeroSaison</a> ";
					}
					$iteration++;
				}
				echo "</p>";
			}
		?>
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
include "page/page-footer.php";
?>