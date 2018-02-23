<?php
require_once "../dao/ListeSerieDAO.php";
require_once "../dao/ArticleDAO.php";

$idSerie = $_GET['idSerie'];

echo '<script>console.log("idSerie: ' . $idSerie . '");</script>';

$serie = ListeSerieDAO::getInstance()->getSerie($idSerie);

//var_dump($serie);



include "fragmentHautPage.php";
?>
    <div>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
        ?>
        <h3><?=$serie->getTitre_fr()?></h3>
        <p><?=$serie->getDescription()?></p>
        <div id="liste-article">
            <?php
            /*echo '<script>console.log("Nom: ' . $listeSeriesTop3[0]->getTitre_fr() . ',id:'. $listeSeriesTop3[0]->getId() .'");</script>';*/

            foreach(ArticleDAO::getInstance()->getListeArticleParSerie($serie->getId()) as $article)
            {
            ?>
            <p><a href="#"><?=$article->getTitre()?></a></p>
            <?php
            }
            ?>
        </div>
    </div>
<?php
include "fragmentBasPage.php";
?>