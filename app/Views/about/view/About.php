<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 22:47
 */
?>
    <div class="row margin-top-20"></div>

<? foreach( $posts as $post ):?>
<div class="col-lg-12">

<div class="col-md-10">
    <h4 class="lead"><?= $post->titre?></span><small> <?= $post->etablissement?> - <?= $post->lieu?></small></h4>
    <p><i><?= $post->contenu?> </i></p>
</div>
<div class="col-md-2">
</div>
</div>
<div class="col-lg-12"><hr></div>

<? endforeach; ?>