<?php
$listeSeries = [];
$nombreSeries = 526; //récup
$nombreSeriesParPage = 30;
$nombrePage = ceil($nombreSeries/$nombreSeriesParPage);

if($_GET[page] != null)
    $noPage = $_GET[page];
else
    $noPage = 1;

$noMinSeriePage = 1 + (($noPage - 1) * $nombreSeriesParPage);
$noMaxSeriePage = $nombreSeriesParPage * $noPage;

if($noMaxSeriePage > $nombreSeries)
{
    $noMaxSeriePage = $nombreSeries;
}

$pageSuivante = $noPage + 1;
$pagePrecedente = $noPage -1;

if($pagePrecedente < 1)
{
    $pagePrecedente = 0;
}

if($pageSuivante > $nombrePage)
{
    $pageSuivante = 0;
}
    

//Récup les serie avec $noMinSeriePage et $noMaxSeriePage
//Generation de test
for ($i = 1; $i <= 30; $i++) 
{
    $listeSeries[$i] = new stdClass();
    $listeSeries[$i]->id = $i;
    $listeSeries[$i]->nombre = $i;
    $listeSeries[$i]->nom = "SerieTest0" . $i;
    $listeSeries[$i]->illustration = "https://placehold.it/400x370";
}

include "page/pageHeader.php";
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
            for($i = $noMinSeriePage; $i <= $noMaxSeriePage; $i++)
            {
                //echo "<script>console.log('article $i');</script>";
            ?>
                <div class="column">
                    <img src="https://placehold.it/400x370" alt="image <?=$i?>">
                </div>
            <?php
            }
            ?> 
            </div>
            <hr>
            <ul class="pagination" role="navigation" aria-label="Pagination">
                <?php
                if($pagePrecedente == 0)
                {
                ?>
                <li class="disabled">Previous <span class="show-for-sr">page</span></li>
                <?php
                }
                else
                {
                ?>
                <li><a href="?page=<?=$pagePrecedente?>" >Previous <span class="show-for-sr">page</span></a></li>
                <?php 
                }
                
                for($i = 1; $i <= $nombrePage; $i++)
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
                <li class="disabled">Next <span class="show-for-sr">page</span></li>
                <?php
                }
                else
                {
                ?>
                <li><a href="?page=<?=$pageSuivante?>" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
                <?php
                }
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
include "page/pageFooter.php";
?>