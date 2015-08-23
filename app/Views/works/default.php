<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 05/03/15
 * Time: 22:00
 */


?>
<div class="row">
        <div class="title page-header">
            <h3 class="text-wrap "><?= $work->titre ?> - <small><i><?= $work->categorie;?></i></small>
            </h3>
        </div>

    <section class="cd-single-item">
        <div class="cd-slider-wrapper">
            <ul class="cd-slider">
                <?
                $i = 1;
                foreach($images as $image) : ?>
                    <li class="<? if($i++ == 1)echo 'selected' ;?> ">
                        <?= $bootstrap->getImage($image, null , false);?>
                    </li>
                <? endforeach;?>


            </ul> <!-- cd-slider -->

            <ul class="cd-slider-navigation">
                <li><a href="#0" class="cd-prev inactive">Next</a></li>
                <li><a href="#0" class="cd-next">Prev</a></li>
            </ul> <!-- cd-slider-navigation -->

            <a href="#0" class="cd-close">Close</a>
        </div> <!-- cd-slider-wrapper -->

        <div class="cd-item-info">
         <?= isset($work->soustitre)?' <h2>'. $work->soustitre. '</h2>':'';?>
        <?= isset($work->keywords)? '<p><b>Mots-clés : </b>  <i> '.$work->keywords. '</i></p>':'';?>
        <?= isset($work->resume)? $work->resume :'';?>
        </div>
    </section>

<section class="cd-content">
    <?= $work->contenu ?>

</section>
    <? include('includes/bxslider.php'); ?>


