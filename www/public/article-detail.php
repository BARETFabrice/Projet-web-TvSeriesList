<?php
require_once "../dao/ArticleDAO.php";
require_once "../modele/Article.php";

$idArticle = $_GET['idArticle'];

echo '<script>console.log("idArticle: ' . $idArticle . '");</script>';

$article = ArticleDAO::getInstance()->getArticleParId($idArticle);

echo '<script>console.log("nom: ' . $article->getTitre() . '");</script>';

//var_dump($article);


include "fragmentHautPage.php";
?>
    <div class="row">
        <div class="medium-4 columns">
            <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $article->getImage() ).'" alt="'. $article->getTitre() .'"/>';
            ?>
        </div>
        <div class="medium-8 columns">
            <?php
            switch (controlleurLangue::getLangue())
            {
                case "en_CA":
            ?>
            <h3><?=$article->getTitre()?></h3>
            <p><?=$article->getContenu()?></p>
            <?php
                    break;
                case "fr_CA":
            ?>
            <h3><?=$article->getTitre_fr()?></h3>
            <p><?=$article->getContenu_fr()?></p>
            <?php
                    break;
            }
            ?>
        </div>
    </div>
<?php
include "fragmentBasPage.php";
?>