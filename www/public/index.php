<?php
require_once "../dao/ListeSerieDAO.php";
require_once "../dao/ArticleDAO.php";

$listeSeriesTop3 = ListeSerieDAO::getInstance()->getListeTopSerie();

/*Gestion de la liste d'article 7 par page*/
$nombreArticle = ArticleDAO::getInstance()->getNombreArticle();
$nombreArticleParPage = 5;

if($nombreArticle > $nombreArticleParPage)
{
    $nombrePageArticleAccueil = ceil($nombreArticle/$nombreArticleParPage);
}
else
{
    $nombrePageArticleAccueil = 1;
}

if($_GET != null && $_GET['page'] != null)
    $noPage = $_GET['page'];
else
    $noPage = 1;

$noMinArticlePage = 1 + (($noPage - 1) * $nombrePageArticleAccueil);
$noMaxArticlePage = $nombrePageArticleAccueil * $noPage;

$noMinArticleDeLaPageOuverte = ($noPage * $nombreArticleParPage) - $nombreArticleParPage;
$noMaxArticleDeLaPageOuverte = $nombreArticleParPage - (($noPage * $nombreArticleParPage) - $nombreArticle);

//echo "nb article " . $nombreArticle . "<br>";
//echo "nombrePageArticleAccueil " . $nombrePageArticleAccueil . "<br>";
//echo "articlemin " . $noMinArticleDeLaPageOuverte . " articlemax " . $noMaxArticleDeLaPageOuverte . "<br>";

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
/*Gestion de la liste d'article*/


include "fragmentHautPage.php";
?>
    
    <div class="row" id="liste-top3-series">
        <div class="medium-8 columns">
            <div>
                <div id="image-serie-top1">
                    <?php
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $listeSeriesTop3[0]->getImage() ).'" alt="'. $listeSeriesTop3[0]->getTitre_fr() .'"/>';
                    ?>
                </div>
                <div id="description-serie-top1">
                    <?php
                    switch (controlleurLangue::getLangue())
                    {
                        case "en_CA":
                    ?>
                    <a href="serie/?idSerie=<?=$listeSeriesTop3[0]->getId()?>"><h3><?=$listeSeriesTop3[0]->getTitre()?></h3></a>
                    <p><?=$listeSeriesTop3[0]->getDescription()?></p>
                    <?php
                            break;
                        case "fr_CA":
                    ?>
                    <a href="serie/?idSerie=<?=$listeSeriesTop3[0]->getId()?>"><h3><?=$listeSeriesTop3[0]->getTitre_fr()?></h3></a>
                    <p><?=$listeSeriesTop3[0]->getDescription_fr()?></p>
                    <?php
                            break;
                    }
                    ?>


                    <p>notation</p>
                    <div id="liste-article-serie-top1">
                        <?php
                        /*echo '<script>console.log("Nom: ' . $listeSeriesTop3[0]->getTitre_fr() . ',id:'. $listeSeriesTop3[0]->getId() .'");</script>';*/
                        
                        foreach(ArticleDAO::getInstance()->getListeArticleParSerie($listeSeriesTop3[0]->getId()) as $article)
                        {
                        ?>
                        <p><a href="article/?idArticle=<?=$article->getId()?>"><?=$article->getTitre()?></a></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="medium-4 columns" id="top2-top3-series">
        <?php
        $iterateur = 1;
        foreach($listeSeriesTop3 as $serie)
        {
            if($iterateur != 1)
            {
        ?>
            <div>
                <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre() .'"/>';

                switch (controlleurLangue::getLangue())
                {
                    case "en_CA":
                        ?>
                <div>
                    <a href="serie/?idSerie=<?=$serie->getId()?>"><h3><?=$serie->getTitre()?></h3></a>
                    <p><?php echo substr($serie->getDescription(), 0, 50) . ' ... '; ?></p>
                </div>
                        <?php
                        break;
                    case "fr_CA":
                        ?>
                <div>
                    <a href="serie/?idSerie=<?=$serie->getId()?>"><h3><?=$serie->getTitre_fr()?></h3></a>
                    <p><?php echo substr($serie->getDescription_fr(), 0, 50) . ' ... '; ?></p>
                </div>
                        <?php
                        break;
                }
                ?>
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
        foreach(ListeSerieDAO::getInstance()->getListeSerieDuMoment() as $serie)
        {
            //echo '<script>console.log("iterateur:'. $iterateur .'");</script>';
            //print_r($serie);
            //var_dump($serie->getTitre_fr());
            
            if($iterateur <= 3)
            {
        ?>
        <div class="column serie-du-moment">
        <?php  
            }
            else if($iterateur == 4)
            {
        ?>
        <div class="column show-for-medium serie-du-moment">
        <?php
            }
            else if($iterateur== 5)
            {
        ?>
        <div class="column show-for-large serie-du-moment">
        <?php  
            }
        ?>
            <a href="serie/?idSerie=<?=$serie->getId()?>">
                <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
                ?>
                <p><?=$serie->getTitre_fr()?></p>
            </a>
        </div>
        <?php
            $iterateur++;
        }
        ?>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div id="liste-articles" class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <article>
                <?php
                
                foreach(ArticleDAO::getInstance()->getListeArticleParPage($noMinArticleDeLaPageOuverte, $noMaxArticleDeLaPageOuverte) as $article)
                {
                ?>
                <div class="row article">
                    <div class="large-6 columns">
                        <p>
                            <a href="article/?idArticle=<?=$article->getId()?>">
                                <?php
                                echo '<img src="data:image/jpeg;base64,'.base64_encode( $article->getImage() ).'" alt="'. $article->getTitre() .'"/>';
                                ?>
                            </a>
                        </p>
                    </div>
                    <div class="large-6 columns">
                        <h5><a href="article/?idArticle=<?=$article->getId()?>"><?=$article->getTitre()?></a></h5>
                        <p>
                            <span><i class="fi-torso"> By <?=$article->getAuteur()?> &nbsp;&nbsp;</i></span>
                            <span><i class="fi-calendar"> <?=$article->getDateCreation()?> &nbsp;&nbsp;</i></span>
                            <!--span><i class="fi-comments"> 6 comments</i></span-->
                        </p>
                        <p><?php echo substr($article->getContenu(), 0, 100) . '... '; ?><a href="article/?idArticle=<?=$article->getId()?>">detail</a></p>
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
                    foreach(ListeSerieDAO::getInstance()->getListeTopLesPlusAttendue() as $serie)
                    {
                    ?>
                    <div class="media-object serie-la-plus-attendue">
                        <div class="media-object-section">
                            <a href="serie/?idSerie=<?=$serie->getId()?>">
                                <?php
                                echo '<img src="data:image/jpeg;base64,'.base64_encode( $serie->getImage() ).'" alt="'. $serie->getTitre_fr() .'"/>';
                                ?>
                            </a>
                        </div>
                        <div class="media-object-section">
                            <a href="serie/?idSerie=<?=$serie->getId()?>"><h5><?=$serie->getTitre()?></h5></a>
                            <p><?php echo substr($serie->getDescription(), 0, 70) . ' ... '; ?><a href="serie/?idSerie=<?=$serie->getId()?>">detail</a></p>
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
include "fragmentBasPage.php";
?>