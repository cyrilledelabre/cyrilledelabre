<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 14/03/15
 * Time: 16:26
 */

?>
    <div class="row margin-top-20"></div>

<? foreach( $posts as $post ):?>


    <div class="row">
        <div class="col-md-8">
            <h4><?= $post->titre?></span><small> <?= $post->etablissement?><?= $post->lieu?></small></h4>
            <p><i><?= $post->contenu?> </i></p>
        </div>
        <div class="col-md-2 ">
              <span class="visible-md-block visible-lg-block">
           <?= $tab->getImage($post,false); ?>
            </span>
        </div>
    </div>
    <div class="row"><hr></div>

<? endforeach; ?>