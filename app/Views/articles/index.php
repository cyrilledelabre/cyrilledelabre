

<div class="page-header" id="banner">
    <div class="row">
        <h3 class="page-header text-wrap "> Articles</h3>

        <div class="col-sm-8">

        <?php foreach($articles as $article): ?>


            <h2><a href="<?= $article->url ?>"> <?= $article->titre; ?> </a></h2>
            <p><em><?= $article->categorie; ?></em></p>
            <p><?= $article->extrait ; ?></p>

            <?php endforeach; ?>
        </div>

         <div class="col-sm-4">
            <ul>
                <?php foreach($categories  as  $categorie):?>

                    <li><a href="<?=$categorie->getUrl() ?>"> <?= $categorie->titre; ?> </a></li>
                <?php endforeach; ?>
            </ul>
         </div>


    </div>
    </div>
