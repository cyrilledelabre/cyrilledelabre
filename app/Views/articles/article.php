<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 18:46
 */
?>
<?php

?>

<div class="page-header" id="banner">
    <div class="row">
        <h3 class="page-header text-wrap "> Articles</h3>
        <div class="col-xs-12">
            <h1><?= $article->titre;?></h1>

            <p class="subline">Catégorie <strong><?= $article->categorie;?>  </strong> </p>
        </div>
        <div>
            <?= $article->contenu;?>
        </div>
    </div>



</div>


