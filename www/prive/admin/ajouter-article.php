<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageArticle.php';

$controlleur = controlleurPageArticle::getInstance();

if (isset($_POST['ajouter'])) {
        $controlleur->ajouterArticle($_POST['auteur'], $_POST['titre'], $_POST['contenu'], NULL, NULL);
		header("Location: ./liste-articles.php");
    }
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="./ajouter-article.php" method="post">
		<h4 class="text-center">Créer un article</h4>
		<hr>

		<label>Titre</label>
			<input type="text" name="titre" value="">
		<label>auteur</label>
			<input type="text" name="auteur" value="">
		<label>contenu</label>
			<textarea name="contenu" rows="4" cols="50">
			</textarea>
		<p><input type="submit" class="button expanded success" name="ajouter" value="Ajouter"></input></p>
    </form>
</div>

<?php
include "fragmentBasPage.php";
?>