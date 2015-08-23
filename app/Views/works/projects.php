<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 05/03/15
 * Time: 22:00
Default size for thumbnails is 240px x 150px and for fullscreen 960px x 600px.


 */


?>
<!--=== Content Part ===-->


<div class="row">
<div class="title page-header">
    <h3 class="text-wrap "><?= $work->titre ?> - <small><i><?= $work->categorie;?></i></small>

    </h3>
    <p></p>

</div>

<section id="least">

    <!-- Least Gallery: Fullscreen Preview -->
    <div class="least-preview"></div>

    <!-- Least Gallery: Thumbnails -->
    <ul class="least-gallery">
        <!-- 1th thumbnail -->
        <?foreach($images as $image) : ?>
        <li>
            <a href="<?= $bootstrap->getLinkImage($image) ; ?>" data-subtitle="Voir l'image"
               data-caption="<?=$image->titre?> <i><?=$image->contenu?></i>" >
                <?= $bootstrap->getThumb($image) ;?>
            </a>


        </li>
        <? endforeach;?>
    </ul>

</section>

</div>


<div class="row">

<article class="margin-bottom-20">
    <p><?= $work->contenu?></p>
</article>


</div>
<? include('includes/bxslider.php'); ?>

