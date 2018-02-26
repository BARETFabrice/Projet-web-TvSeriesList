<?php
include "fragmentHautPage.php";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageMembre.php';
$controlleur = controlleurPageMembre::getInstance();

if(isset($_POST['ajouter']))
{
	header("Location: ./ajouter-membre.php");
}

?>
    
<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form"  action="#" method="POST">
      <h4 class="text-center">Rechercher un membre</h4>
      
      <hr>
	  
        <input type="text" name="recherche" placeholder="Exemple : Hunter2">
      <p><input type="submit" name="rechercher" class="button expanded" value="Rechercher"></input></p>
	  <p><input type="submit" class="button expanded success" name="ajouter" value="Ajouter une série"></input></p>
    </form>
</div>

<?php
if(isset($_POST['rechercher']))
{
	$recherche = filter_var($_POST['recherche'], FILTER_SANITIZE_STRING);
	$resultat = $controlleur->rechercherMembre($_POST['recherche']);
?>
<div class="row column align-center medium-6 large-4 container-padded div_login">
	<?php 
	foreach($resultat as $membre){
	?>
      <h3 class="text-center"><a href="membre.php?id=<?=$membre->getId()?>"><?=$membre->getPseudonyme()?></a></h3>
	<?php
	}
	?>
</div>

<?php
}
include "fragmentBasPage.php";
?>