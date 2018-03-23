<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/DonationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/MembreDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Membre.php';

$idDonation = $_GET['idDonation'];

$donation = DonationDAO::getInstance()->getDonation($idDonation);

//var_dump($donation);

?>

    <div class="row">
        <br>
        <h4 style="margin: 0;" class="text-center"><?php echo _('Donnation')?> #<?=$donation->getId()?></h4>

        <div class="medium-12 columns">
            <table id="tableau-detail-donation">
                <tr>
                    <td><?php echo _('No')?></td>
                    <td>#<?=$donation->getId()?></td>
                </tr>
                <tr>
                    <td><?php echo _('Membre')?></td>
                    <td><?=MembreDAO::getInstance()->getMembre($donation->getIdMembre())->getPseudonyme()?></td>
                </tr>
                <tr>
                    <td><?php echo _('Montant')?></td>
                    <td><?=$donation->getMontant()?></td>
                </tr>
                <tr>
                    <td><?php echo _('Date')?></td>
                    <td><?=$donation->getDate()?></td>
                </tr>
            </table>
        </div>
    </div>

<?php
include "fragmentBasPage.php";
?>