<?php
/*Gestion des series du moment*/

//les 5 premiere series avec le plus de vue par semaine
$listeSeries = [];

//Generation de test
for ($i = 1; $i <= 5; $i++) 
{
    $listeSeries[$i] = new stdClass();
    $listeSeries[$i]->id = $i;
    $listeSeries[$i]->nombre = $i;
    $listeSeries[$i]->nom = "SerieTest0" . $i;
    $listeSeries[$i]->illustration = "https://placehold.it/400x370";
}

//print_r($listeSeries);
/*Gestion des series du moment*/

/*Gestion du top 3 des serie les plus vue*/
$listeSeriesTop3 = [];

//Generation de test
for ($i = 1; $i <= 3; $i++) 
{
    $listeSeriesTop3[$i] = new stdClass();
    $listeSeriesTop3[$i]->id = $i;
    $listeSeriesTop3[$i]->nombre = $i;
    $listeSeriesTop3[$i]->nom = "SerieTest0" . $i;
    
    if($i == 1)
    {
        $listeSeriesTop3[$i]->illustration = "https://placehold.it/900x450";
    }
    else
    {
        $listeSeriesTop3[$i]->illustration = "https://placehold.it/400x200";
    }
}

//print_r($listeSeriesTop3);
/*Gestion du top 3 des serie les plus vue*/

/*Gestion de la liste d'article 7 par page*/

//get le nombre d'article sur la bd
$nombreArticle = 50;



/*Gestion de la liste d'article*/

include "page/page-header.php";
?>
    
    <br>
    <div class="row" id="top3-series">
        <div class="medium-8 columns">
            <p><img src="<?=$listeSeriesTop3[1]->illustration?>" alt="<?=$listeSeriesTop3[1]->nom?>"></p>
        </div>
        <div class="medium-4 columns">
        <?php
        foreach($listeSeriesTop3 as $serie)
        {
            if($serie->nombre != 1)
            {
        ?>
            <p><img src="<?=$serie->illustration?>" alt="<?=$serie->nom?>"></p>
        <?php
            }
        }
        ?>
        </div>
    </div>
    <hr>
    <div class="row column">
        <h4 style="margin: 0;" class="text-center">LES SÉRIES DU MOMENT</h4>
    </div>
    <hr>
    <div class="row small-up-3 medium-up-4 large-up-5" id="liste-series-du-moment">
        <?php
        foreach($listeSeries as $serie)
        {
            if($serie->nombre <= 3)
            {
        ?>
        <div class="column">
            <img src="<?=$serie->illustration?>" alt="<?=$serie->nom?>">
        </div>
        <?php  
            }
            else if($serie->nombre == 4)
            {
        ?>
        <div class="column show-for-medium">
            <img src="<?=$serie->illustration?>" alt="<?=$serie->nom?>">
        </div>
        <?php
            }
            else if($serie->nombre == 5)
            {
        ?>
        <div class="column show-for-large">
            <img src="<?=$serie->illustration?>" alt="<?=$serie->nom?>">
        </div>
        <?php  
            }
        }
        ?>
    </div>
    <hr>
    <hr>
    <div class="row">
        <div class="large-8 columns" style="border-right: 1px solid #E3E5E8;">
            <article>
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
                <ul class="pagination" role="navigation" aria-label="Pagination">
                    <li class="disabled">Previous <span class="show-for-sr">page</span></li>
                    <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                    <li><a href="#" aria-label="Page 2">2</a></li>
                    <li><a href="#" aria-label="Page 3">3</a></li>
                    <li><a href="#" aria-label="Page 4">4</a></li>
                    <li><a href="#" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
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
                <div class="row column">
                    <p class="lead">TRENDING POSTS</p>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="https://placehold.it/100">
                        </div>
                        <div class="media-object-section">
                            <h5>All I need is a space suit and I'm ready to go.</h5>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="https://placehold.it/100">
                        </div>
                        <div class="media-object-section">
                            <h5>All I need is a space suit and I'm ready to go.</h5>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="https://placehold.it/100">
                        </div>
                        <div class="media-object-section">
                            <h5>All I need is a space suit and I'm ready to go.</h5>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="https://placehold.it/100">
                        </div>
                        <div class="media-object-section">
                            <h5>All I need is a space suit and I'm ready to go.</h5>
                        </div>
                    </div>
                    <div class="media-object">
                        <div class="media-object-section">
                            <img class="thumbnail" src="https://placehold.it/100">
                        </div>
                        <div class="media-object-section">
                            <h5>All I need is a space suit and I'm ready to go.</h5>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

<?php
include "page/page-footer.php";
?>