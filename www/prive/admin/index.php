<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/DonationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ArticleDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ListeSerieDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';
?>

<div class="row column">
	<h4 style="margin: 0;" class="text-center"><?php echo _('Panneau d\'administration')?></h4>
	<br>
	<div class="medium-6 columns">
		<h5><?php echo _('Les 10 dernière donation')?></h5>
		<table>
			<tr>
				<td><?php echo _('No')?></td>
				<td><?php echo _('Membre')?></td>
				<td><?php echo _('Montant')?></td>
				<td><?php echo _('Date')?></td>
			</tr>
			<?php
			//var_dump(DonationDAO::getInstance()->getListeDonation());
			foreach(DonationDAO::getInstance()->getListeDonation() as $donation)
			{
			?>
			<tr href="donation/<?=$donation->getId()?>" class="transaction-ligne">
				<td>#<?=$donation->getId()?></td>
				<td><?=MembreDAO::getInstance()->getMembre($donation->getIdMembre())->getPseudonyme()?></td>
				<td><?=$donation->getMontant()?></td>
				<td><?=$donation->getDate()?></td>
			</tr>
			<?php
			}
			?>
		</table>
		<script>
			(document.querySelectorAll(".transaction-ligne")).forEach(function(element)
			{
				element.addEventListener("mouseover", function()
				{
					this.style.border = "2px solid #ff4800";
				});
				element.addEventListener("mouseout", function()
				{
					this.style.border = "";
				});

				element.style.cursor = "pointer";
				element.addEventListener("click", function()
				{
					//console.log(this.attributes.href.value);
					window.location = this.attributes.href.value;
					return false;
				});
			});
		</script>
	</div>
	<div class="medium-3 columns">
		<h5><?php echo _('Détail site')?></h5>
		<table>
			<tr>
				<td><?php echo _('Nombre de vissite')?></td>
				<td>0</td>
			</tr>
			<tr>
				<td><?php echo _('Moyenne de vissite par jour')?></td>
				<td>0</td>
			</tr>
			<tr>
				<td><?php echo _('Nombre de vissite aujourd\'hui')?></td>
				<td>0</td>
			</tr>
		</table>
	</div>
	<div class="medium-3 columns">
		<h5><?php echo _('Detail des données')?></h5>
		<table>
			<tr>

				<td><?php echo _('Nombre de série')?></td>
				<td><?=ListeSerieDAO::getInstance()->getNombreSerie()?></td>
			</tr>
			<tr>
				<td><?php echo _('Nombre de Article')?></td>
				<td><?=ArticleDAO::getInstance()->getNombreArticle()?></td>
			</tr>
		</table>
	</div>

</div>

<?php
include "fragmentBasPage.php";
?>