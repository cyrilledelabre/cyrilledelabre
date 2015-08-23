<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 21:44
 */




?>

<div class="row">
        <div class="col-sm-8">
            <h1><?= $categorie->titre ; ?></h1>
            <?php foreach($articles as  $post): ?>
                <h2><a href="<?= $post->url ?>"> <?= $post->titre; ?> </a></h2>
                <p><em><?= $post->categorie; ?></em></p>
                <p><?= $post->extrait ; ?></p>

            <?php endforeach; ?>
        </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach( $categories as  $categorie):?>
                <li><a href="<?=$categorie_url. $categorie->id_category ?>"> <?= $categorie->titre; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>


</div>

