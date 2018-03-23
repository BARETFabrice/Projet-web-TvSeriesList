<?php
include "fragmentHautPage.php";
require_once $_SERVER['DOCUMENT_ROOT'].'/dao/DonationDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/modele/Donation.php';

$idDonation = $_GET['idDonation'];

$donation = DonationDAO::getInstance()->getDonation($idDonation);

//var_dump($donation);

?>

    <div class="row">
        <br>
        <h4 style="margin: 0;" class="text-center">Donnation #<?=$donation->getId()?></h4>

        <div class="medium-12 columns">
            <table id="tableau-detail-donation">
                <tr>
                    <td>No</td>
                    <td><?=$donation->getId()?></td>
                </tr>
                <tr>
                    <td>Membre</td>
                    <td><?=$donation->getIdMembre()?></td>
                </tr>
                <tr>
                    <td>Montant</td>
                    <td><?=$donation->getMontant()?></td>
                </tr>
                <tr>
                    <td>getDate</td>
                    <td><?=$donation->getMontant()?></td>
                </tr>
            </table>
        </div>
    </div>

<?php
include "fragmentBasPage.php";
?>