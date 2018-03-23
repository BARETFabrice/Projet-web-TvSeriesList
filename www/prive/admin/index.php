<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/DonationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ArticleDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/ListeSerieDAO.php';
?>

<div class="row column">
	<h4 style="margin: 0;" class="text-center">Panneau d'administration</h4>
	<br>
	<div class="medium-6 columns">
		<h5>10 derniere donation</h5>
		<table>
			<tr>
				<td>No</td>
				<td>Membre</td>
				<td>Momtant</td>
				<td>Date</td>
			</tr>
			<?php
			//var_dump(DonationDAO::getInstance()->getListeDonation());
			foreach(DonationDAO::getInstance()->getListeDonation() as $donation)
			{
			?>
			<tr href="donation/<?=$donation->getId()?>" class="transaction-ligne">
				<td><?=$donation->getId()?></td>
				<td><?=$donation->getIdMembre()?></td>
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
		<h5>Detail site</h5>
		<table>
			<tr>

				<td>Nombre de vissite</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Moyenne de vissite par jour</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Nombre de vissite aujourd'hui</td>
				<td>0</td>
			</tr>
		</table>
	</div>
	<div class="medium-3 columns">
		<h5>Detail des donn�es</h5>
		<table>
			<tr>

				<td>Nombre de s�rie</td>
				<td><?=ListeSerieDAO::getInstance()->getNombreSerie()?></td>
			</tr>
			<tr>
				<td>Nombre de Article</td>
				<td><?=ArticleDAO::getInstance()->getNombreArticle()?></td>
			</tr>
		</table>
	</div>

</div>

<?php
include "fragmentBasPage.php";
?>