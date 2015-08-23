<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 03/02/15
 * Time: 21:02
 */

$i =0;
?>





<div class="row margin-top-20"></div>
<? foreach( $posts as $post ):?>
    <div class="col-sm-3">
        <div class="col-lg-12">
              <span class="visible-md-block visible-lg-block">
            <?= $tab->getImage($post,false); ?>
              </span>
        </div>
        <div class="col-xs-12">
            <h4><?= $post->titre?></h4>
            <p><small><i><?= $post->contenu?> </i></small></p>
        </div>
    </div>

<? endforeach; ?>

