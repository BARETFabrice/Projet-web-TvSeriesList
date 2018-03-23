<?php
include "fragmentHautPage.php";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageArticle.php';
$controlleur = controlleurPageArticle::getInstance();

if(isset($_POST['ajouter']))
{
	header("Location: ./article/ajouter");
}
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
     <form class="log-in-form" action="#" method="POST">
      <h4 class="text-center">Rechercher un article</h4>
      
      <hr>
	  
        <input type="text" name="recherche" placeholder="Exemple : Westworld">
      <p><input type="submit" class="button expanded" name="rechercher" value="Rechercher"></input></p>
	  <p><input type="submit" class="button expanded success" name="ajouter" value="Ajouter un article"></input></p>
    </form>
</div>
<?php
if(isset($_POST['rechercher']))
{
	$_POST['recherche'] = filter_var($_POST['recherche'], FILTER_SANITIZE_STRING);
	$resultat = $controlleur->rechercherArticle($_POST['recherche']);
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
	<?php 
	foreach($resultat as $article){
	?>
      <p class="text-center"><a href="./article/?id=<?=$article->getId()?>"><?=$article->getTitre()?></a></p><hr>
	<?php
	}
	?>
</div>

<?php
}
include "fragmentBasPage.php";
?>