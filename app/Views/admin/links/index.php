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
        <a href="<?= ABSROOT . 'public/admin/images/index'?>" class="btn btn-primary ">Images</a>
        <a href="<?= ABSROOT . 'public/admin/works/index'?>" class="btn btn-primary ">Works</a>
    </p>
</div>



<section>
    <div class="row">
        <nav id="filter">
            <ul class="nav navbar-nav">
                <li><a href="#" class="current btn btn-block" data-filter="*">Tous</a></li>
                <? foreach($types as $type) :?>
                    <li><a href="#" class="btn  btn-inverse"  data-filter=".<?=$type->titre?>"><?=ucfirst($type->titre)?></a></li>
                <? endforeach;?>
            </ul>
        </nav>
    </div>
    <div class="row">

        <div class="isotopeTable">
                <? foreach($items as $link):?>
                    <div class="isotope table-like <?= $link->type?> ">
                        <div class="col-xs-2" style="width: 100px"> <?=  $link->id ?></div>
                        <div class="col-xs-2" style="width: 200px"> <?=  $link->name ?></div>
                        <div class="col-xs-2" style="width: 300px"> <?=  $link->link ?></div>
                        <div class="col-xs-2" style="width: 300px"> <?= $bootstrap->getThumb($link, ['height'=>'50']) ?></div>
                        <div class="col-xs-2">
                            <a class="btn btn-primary" href="<?= $params['edit'] ?><?= $link->id; ?>">Editer</a>
                            <form action="<?= $params['delete'] ?>" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $link->id ?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>


                    </div>

                <? endforeach;?>

        </div>
    </div>

</section>







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