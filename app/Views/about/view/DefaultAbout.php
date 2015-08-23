<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 18:58
 *
*/
?>
<div class="row margin-top-20"></div>

<? foreach( $posts as $post ):?>


    <div class="row">
        <div class="col-md-2">
            <h4 class="spec visible-md-block visible-lg-block"><?= $tab->date($post->debut, $post->fin)?></h4>
        </div>
        <div class="col-md-8">
            <h4><?= $post->titre?></span><small> <?= $post->etablissement?> - <?= $post->lieu?></small></h4>
            <p><i><?= $post->contenu?> </i></p>
        </div>
        <div class="col-md-2 .visible-lg-*	">
               <span class="visible-md-block visible-lg-block">
           <?= $tab->getImage($post); ?>
            </span>
        </div>
</div>
<div class="row"><hr></div>

<? endforeach; ?>

