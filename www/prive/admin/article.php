<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageArticle.php';

$id = (int) $_GET['id'];
$controlleurArticle = controlleurPageArticle::getInstance();
$article = $controlleurArticle->getArticle($id);


$controlleurArticle->verifierFormulaireAdmin($id);
	
if ($controlleurArticle->estPasEnSuppression())
{
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" method="post">
		<h4 class="text-center"><?=$article->getTitre()?></h4>
		<p>Par <a href="#"><?=$article->getAuteur()?></a></p>
		<hr>

		<label>Titre
			<input type="text" name="titre" value="<?=$article->getTitre()?>">
		</label>
		<label>Contenu
			<textarea rows="10" cols="50" name="contenu"><?=$article->getContenu()?>
			</textarea>
		</label>
		<p><input type="submit" class="button expanded" name="modifier" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" name="supprimer" value="Supprimer"></input></p>
    </form>
</div>

<?php
}
include "fragmentBasPage.php";
?>