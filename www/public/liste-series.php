<?php
$listeSeries = [];

//Generation de test
for ($i = 1; $i <= 30; $i++) 
{
    $listeSeries[$i] = new stdClass();
    $listeSeries[$i]->id = $i;
    $listeSeries[$i]->nombre = $i;
    $listeSeries[$i]->nom = "SerieTest0" . $i;
    $listeSeries[$i]->illustration = "https://placehold.it/400x370";
}

include "page/page-header.php";
?>
    <br>
    <div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><input type="search" placeholder="Search"></li>
                <li><button type="button" class="button">Recherche</button></li>
            </ul>
        </div>
    </div>
    <br>
    <div class="row" id="liste-series">
        <div class="large-8 columns">
            <div class="row small-up-3 medium-up-4 large-up-5" id="liste-series-du-moment">
            <?php
            //remplacer par une boucle for 30 serie par page
            foreach($listeSeries as $serie)
            {
            ?>
                <div class="column">
                    <img src="https://placehold.it/400x370" alt="test">
                </div>
            <?php
            }
            ?> 
            </div>
            <hr>
            <ul class="pagination" role="navigation" aria-label="Pagination">
                <li class="disabled">Previous <span class="show-for-sr">page</span></li>
                <li class="current"><span class="show-for-sr">You're on page</span> 1</li>
                <li><a href="#" aria-label="Page 2">2</a></li>
                <li><a href="#" aria-label="Page 3">3</a></li>
                <li><a href="#" aria-label="Page 4">4</a></li>
                <li><a href="#" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
                <?php
                //generation des page auto
                ?>
            </ul>
        </div>
        <div class="large-4 columns">
            <aside>
                <div class="row column">
                    <p class="lead">PUB</p>
                    <p><img src="https://placehold.it/400x300&text=Buy Me!" alt="advertisement of ShamWow"></p>
                </div>
            </aside>
        </div>
    </div>
<?php
include "page/page-footer.php";
?>