<?php
require_once "../dao/ListeSerieDAO.php";
require_once "../modele/Serie.php";

$listeSeriesTop3 = ListeSerieDAO::getInstance()::getListeTopSerie();


/*Gestion de la liste d'article 7 par page*/
//get le nombre d'article sur la bd
$nombreArticle = 50;
$nombreArticleParPage = 7;
$nombrePageArticleAccueil = ceil($nombreArticle/$nombreArticleParPage);

if($_GET != null && $_GET[page] != null)
    $noPage = $_GET[page];
else
    $noPage = 1;

$noMinArticlePage = 1 + (($noPage - 1) * $nombrePageArticleAccueil);
$noMaxArticlePage = $nombrePageArticleAccueil * $noPage;

if($noMaxArticlePage > $nombreArticle)
{
    $noMaxArticlePage = $nombreArticle;
}

$pageSuivante = $noPage + 1;
$pagePrecedente = $noPage -1;

if($pagePrecedente < 1)
{
    $pagePrecedente = 0;
}

if($pageSuivante > ($nombrePageArticleAccueil - 1))
{
    $pageSuivante = 0;
}
//echo "<script>console.log('page suivante $pageSuivante');</script>";
/*Gestion de la liste d'article*/


include "page/page-header.php";
?>
    
    <div class="row" id="liste-top3-series">
        <div class="medium-8 columns">
            <div>
                <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $listeSeriesTop3[1]->getImage() ).'" alt="'. $listeSeriesTop3[1]->getTitre_fr() .'"/>';
                ?>
                <h3><?=$listeSeriesTop3[1]->getTitre_fr()?></h3>
                <p><?=$listeSeriesTop3[1]->getDescription()?></p>
            </div>
        </div>
        <div class="medium-4 columns">
        <?php
        $iterateur = 1;
        foreach($listeSeriesTop3 as $serie)
        {
            if($iterateur != 1)
            {
        ?>
            <div>
                <img src="<?=$serie->illustration?>" alt="<?=$serie->nom?>">
                <h3><?=$serie->getTitre_fr()?></h3>
                <p><?=$serie->getDescription()?></p>
            </div>
        <?php
            }
            $iterateur++;
        }
        ?>
        </div>
    </div>
    <hr>
    <div class="row column">
        <h4 style="margin: 0;" class="text-center"><?php echo _('LES SÉRIES DU MOMENT')?></h4>
    </div>
    <hr>
    <div class="row small-up-3 medium-up-4 large-up-5" id="liste-series-du-moment">
        
        <?php

        //var_dump($listeSerieDuMoment);
        
        $iterateur = 1;
        foreach(ListeSerieDAO::getInstance()::getListeSerieDuMoment() as $serie)
        {
            //echo '<script>console.log("iterateur:'. $iterateur .'");</script>';
            //print_r($serie);
            //var_dump($serie->getTitre_fr());
            
            if($iterateur <= 3)
            {
        ?>
        <div class="column">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
            ?>
            <p><?=$serie->getTitre_fr()?></p>
        </div>
        <?php  
            }
            else if($iterateur == 4)
            {
        ?>
        <div class="column show-for-medium">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
            ?>
        </div>
        <?php
            }
            else if($iterateur== 5)
            {
        ?>
        <div class="column show-for-large">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
            ?>
        </div>
        <?php  
            }
            
            $iterateur++;
        }
        ?>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <article>
                <?php
                //TODO:
                for($i = $noMinArticlePage; $i < $noMaxArticlePage; $i++)
                {
                    //echo "<script>console.log('article $i');</script>";
                ?>
                <div class="row">
                    <div class="large-6 columns">
                        <p><img src="https://placehold.it/600x370&text=Look at me!" alt="image for article" alt="article preview image"></p>
                    </div>
                    <div class="large-6 columns">
                        <h5><a href="#">'Death Star' Vaporizes Its Own Planet</a></h5>
                        <p>
                            <span><i class="fi-torso"> By Thadeus &nbsp;&nbsp;</i></span>
                            <span><i class="fi-calendar"> 11/23/16 &nbsp;&nbsp;</i></span>
                            <span><i class="fi-comments"> 6 comments</i></span>
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae impedit beatae, ipsum delectus aperiam nesciunt magni facilis ullam.</p>
                    </div>
                </div>
                <hr>
                <?php
                }
                ?>
                
                <ul class="pagination" role="navigation" aria-label="Pagination">
                    <?php
                if($pagePrecedente == 0)
                {
                ?>
                <li class="disabled"><?php echo _('Précédent')?> <span class="show-for-sr">page</span></li>
                <?php
                }
                else
                {
                ?>
                <li><a href="?page=<?=$pagePrecedente?>" ><?php echo _('Précédent')?> <span class="show-for-sr">page</span></a></li>
                <?php 
                }
                
                for($i = 1; $i < $nombrePageArticleAccueil; $i++)
                {
                    if($noPage == $i)
                    {
                        //echo "<script>console.log('page $i');</script>";
                ?>
                <li class="current"><span class="show-for-sr">You're on page</span> <?=$i?></li>
                <?php
                    }
                    else
                    {
                ?>
                <li><a href="?page=<?=$i?>" aria-label="Page <?=$i?>"><?=$i?></a></li>
                <?php
                    }
                }
                
                if($pageSuivante == 0)
                {
                ?>
                <li class="disabled"><?php echo _('Suivant')?> <span class="show-for-sr">page</span></li>
                <?php
                }
                else
                {
                ?>
                <li><a href="?page=<?=$pageSuivante?>" aria-label="Next page"><?php echo _('Suivant')?> <span class="show-for-sr">page</span></a></li>
                <?php
                }
                ?>
                </ul>
            </article>
        </div>
        <div class="large-4 columns">
            <aside>
                <div class="row column">
                    <p class="lead">PUB</p>
                    <p><img src="https://placehold.it/400x300&text=Buy Me!" alt="advertisement of ShamWow"></p>
                </div>
                <br>
                <div class="row column" id="liste-series-les-plus-attendue">
                    <p class="lead"><?php echo _('SERIES LES PLUS ATTENDUE')?></p>
                    <?php
                    /*foreach($listeTopAttenteSeries as $serie)
                    {
                    ?>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="<?=$serie->illustration?>">
                        </div>
                        <div class="media-object-section">
                            <h5><?=$serie->nom?></h5>
                            <p><?=$serie->petiteDescription?></p>
                        </div>
                    </div>
                    <?php
                    }*/
                        
                    foreach(ListeSerieDAO::getInstance()::getListeTopLesPlusAttendue() as $serie)
                    {
                    ?>
                    <div class="media-object">
                        <div class="media-object-section">
                            <?php
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
                            ?>
                        </div>
                        <div class="media-object-section">
                            <h5><?=$serie->getTitre()?></h5>
                            <p><?=$serie->getDescription()?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </aside>
        </div>
    </div>

<?php
include "page/page-footer.php";
?>