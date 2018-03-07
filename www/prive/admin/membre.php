<?php
include "fragmentHautPage.php";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageMembre.php';

$controlleur = controlleurPageMembre::getInstance();
$membre = $controlleur->getMembre($_GET['id']);

$controlleur->verifierFormulaireAdmin($_GET['id']);

if ($controlleur->estPasEnSuppression())
{
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form" action="" method="post">
		<h4 class="text-center">Membre</h4>
		<hr>

		<label>Pseudonyme</label>
			<input type="text" name="pseudonyme" value="<?=$membre->getPseudonyme()?>">
		
		<label>Courriel</label>
			<input type="text" name="courriel" value="<?=$membre->getCourriel()?>">
			
		<label>
		    Mot de Passe</label>
		    <input id="motDePasseAjoutMembreAdmin" type="hidden" name="motDePasse" value="">
		    <button onclick="this.style.visibility='hidden'; document.getElementById('motDePasseAjoutMembreAdmin').setAttribute('type', 'text');" type="button" class="button expanded secondary">Nouveau mot de passe</button>
		</label>
		<p><input type="checkbox" <?php if($membre->isNotification())echo'checked'; ?> name="notification">Notifications</p>
		<p><input type="checkbox" <?php if($membre->isAuteur())echo'checked'; ?> name="auteur">Auteur</p>
		<p><input type="checkbox" <?php if($membre->isModerateur())echo'checked'; ?> name="moderateur">Modérateur</p>
		<p><input type="submit" class="button expanded" name="modifier" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" name="supprimer" value="Supprimer"></input></p>
    </form>
</div>

<?php
}
include "fragmentBasPage.php";
?>
