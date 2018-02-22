<?php
require_once "../dao/ArticleDAO.php";
require_once "../modele/Article.php";

$idArticle = $_GET['idArticle'];

echo '<script>console.log("idArticle: ' . $idArticle . '");</script>';

$article = ArticleDAO::getInstance()->getArticleParId($idArticle);

echo '<script>console.log("nom: ' . $article->getTitre() . '");</script>';

//var_dump($article);


include "page/page-header.php";
?>
    <div>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $article->getImage() ).'" alt="'. $article->getTitre() .'"/>';
        ?>
        <h3><?=$article->getTitre()?></h3>
        <p><?=$article->getContenu()?></p>
    </div>
<?php
include "page/page-footer.php";
?>