<?php
include "fragmentHautPage.php";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageSerie.php';
$controlleur = ControlleurPageSerie::getInstance();

if(isset($_POST['ajouter']))
{
	header("Location: ./ajouter-serie.php");
}

?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="#" method="POST">
      <h4 class="text-center">Rechercher une série</h4>
      
      <hr>
	  
        <input type="text" name="recherche" placeholder="Exemple : Rick and Morty">
      <p><input type="submit" class="button expanded" name="rechercher" value="Rechercher"></input></p>
	  <p><input type="submit" class="button expanded success" name="ajouter" value="Ajouter une série"></input></p>
    </form>
</div>

<?php
if(isset($_POST['rechercher']))
{
	$_POST['recherche'] = filter_var($_POST['recherche'], FILTER_SANITIZE_STRING);
	$resultat = $controlleur->rechercherSerie($_POST['recherche']);
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
	<?php 
	foreach($resultat as $serie){
	?>
      <h3 class="text-center"><a href="serie.php?id=<?=$serie->getId()?>"><?=$serie->getTitre()?></a></h4>
	<?php
	}
	?>
</div>

<?php
}
include "fragmentBasPage.php";
?>