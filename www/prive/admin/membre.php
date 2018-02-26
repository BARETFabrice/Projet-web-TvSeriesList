<?php
include "fragmentHautPage.php";

require_once $_SERVER['DOCUMENT_ROOT'].'/action/controlleurPageMembre.php';
$controlleur = controlleurPageMembre::getInstance();
$membre = $controlleur->getMembre($_GET['id']);
?>

<div class="row column align-center medium-6 large-4 container-padded div_login">
    <form class="log-in-form">
		<h4 class="text-center">Membre</h4>
		<hr>

		<label>Pseudonyme
			<input type="text" value="<?=$membre->getPseudonyme()?>">
		</label>
		<label>Courriel
			<input type="text" value="<?=$membre->getCourriel()?>">
		</label>
		<p><input type="checkbox" <?php if($membre->isAuteur())echo'checked'; ?> name="auteur">Auteur</p>
		<p><input type="checkbox" <?php if($membre->isModerateur())echo'checked'; ?> name="moderateur">Modérateur</p>
		<p><input type="checkbox" <?php if($membre->isNotification())echo'checked'; ?> name="notification">Notifications</p>
		<p><input type="submit" class="button expanded" value="Modifier"></input></p>
		<p><input type="submit" class="button expanded alert" value="Supprimer"></input></p>
		<p><input type="submit" class="button expanded secondary" value="Nouveau mot de passe"></input></p>
    </form>
</div>

<?php
include "fragmentBasPage.php";
?>
