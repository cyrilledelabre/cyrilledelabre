<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 18:07
 */

?>

<div class="row">
    <h2 class="page-header text-wrap " id="nav-tabs"><?= $params['titre']?></h2>
    <p>
        <a href="<?= $params['add'] ?>" class="btn btn-success">Ajouter</a>
        <a href="<?= ABSROOT . 'public/admin/index'?>" class="btn btn-info ">Retour</a>
        <a href="<?= ABSROOT . 'public/admin/works/index'?>" class="btn btn-primary ">Works</a>
        <a href="<?= ABSROOT . 'public/admin/links/index'?>" class="btn btn-primary ">Links</a>
    </p>
</div>

<div class="row">


<h3>Filtrer par types : </h3>
<div class="col-sm-4">
    <nav id="filter">
        <ul class="nav nav-pills">

            <li><a href="#" class="current btn btn-primary" data-filter="*">Tous</a></li>
            <? foreach($types as $type) :?>
                <li><a href="#" class="btn  btn-inverse"  data-filter=".<?=$type->id_type?>"><?=ucfirst($type->titre)?></a></li>
            <? endforeach;?>
        </ul>
    </nav>
</div>
    <div class="col-sm-8">
        <nav id="filter">
            <ul class="nav nav-pills">
                <? foreach($works as $work) :?>
                    <li><a href="#" class="btn  btn-inverse"  data-filter=".<?=$work->id_work?>"><?=ucfirst($work->titre)?></a></li>
                <? endforeach;?>
            </ul>
        </nav>
    </div>





<div class="col-lg-12 slice clearfix">
    <div class="row">

        <div class="portfolio-items isotopeWrapper clearfix">
            <table class="table">
                <? foreach($items as $item):?>

                    <tr class="isotopeItem <?= $item->id_type?> <?= $item->id_work ?>">
                        <td class="col-sm-2"><?= $item->type ?></td>


                        <td class="col-sm-3"><?= $item->titre ?></td>
                        <td class="col-sm-2"><?= $item->work ?></td>

                        <td class="col-sm-3"><?= $item->getExtrait() ?></td>
                        <td class="col-sm-3"><?= $bootstrap->getImage($item, ['height'=>'50']) ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= $params['edit'] ?><?= $item->id; ?>">Editer</a>
                            <form action="<?= $params['delete'] ?>" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $item->id ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                <? endforeach;?>
            </table>
        </div>
    </div>
</div>

</div>






<?/*
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Lien externe</td>
        <td>Nom image</td>
        <td>Image</td>


        <td>Action</td>
    </tr>
    </thead>
    <?php foreach($items as $link ): ?>
    <tr>
        <td><?= $link->id ?></td>
        <td><?= $link->name ?></td>
        <td><?= $link->link ?></td>
        <td><?= $link->image ?></td>
        <td><?= $link->getPrev() ?></td>

        <td>
            <a class="btn btn-primary" href="?p=admin.links.edit&id=<?= $link->id; ?>">Editer</a>
            <form action="?p=admin.links.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $link->id ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ; ?>
</table>

*/?>