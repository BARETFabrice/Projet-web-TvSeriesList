<?php
include "page/page-header.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSerie.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/action/ControlleurPageSaison.php';

$id = (int) $_GET['id'];
$controlleurSerie = ControlleurPageSerie::getInstance();
$controlleurSaison = ControlleurPageSaison::getInstance();
$serie = $controlleurSerie->getSerie($id);

if (isset($_POST['modifier'])) {
		if(!isset($_POST['fini']))
		{
			$_POST['fini'] = false;
		}
        $controlleurSerie->modifierSerie($id, $_POST['titre'], $_POST['titre_fr'], $_POST['description'], $_POST['description_fr'], NULL, $_POST['fini']);
		header("Refresh:0");
    }
	elseif(isset($_POST['confirmersupp'])){
		$controlleurSerie->supprimerSerie($id);
		header("Location: ./liste-series.php");
	}
    elseif (isset($_POST['supprimer'])) {
       echo "
			<div class='row column align-center medium-6 large-4 container-padded div_login'>
			<form class='log-in-form' action='./serie.php?id=$id' method='post'>
			<h4 class='text-center'>Confirmer la suppression</h4>
			<p><input type='submit' class='button expanded alert' name='confirmersupp' value='Confirmer'></input></p>
			</form>
			</div>
	   ";
    }
	
	if (!isset($_POST['supprimer']))
	{
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="./serie.php?id=<?=$id?>" method="post">
		<h4 class="text-center"><?php echo $serie->getTitre()?></h4>
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
	}
include "page/page-footer.php";
?>