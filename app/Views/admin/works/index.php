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
        <a href="<?= ABSROOT . 'public/admin/links/index'?>" class="btn btn-primary ">Links</a>

    </p>
</div>

<div class="row">
<h2>Filtrer par types : </h2>


<div class="col-sm-12">
    <nav id="filter">
        <ul class="nav nav-pills">

            <li><a href="#" class="current btn btn-primary" data-filter="*">Tous</a></li>
            <? foreach($types as $type) :?>
                <li><a href="#" class="btn  btn-inverse"  data-filter=".<?=$type->id_type?>"><?=ucfirst($type->titre)?></a></li>
            <? endforeach;?>
        </ul>
    </nav>
</div>




<div class="col-lg-12 slice clearfix">
    <div class="row">

        <div class="portfolio-items isotopeWrapper clearfix">
            <table class="table">
            <? foreach($works as $work):?>

                <tr class="isotopeItem <?= $work->id_type?> ">

                        <td class="col-sm-1"><?= $work->id ?></td>
                        <td class="col-sm-3"><?= $work->titre ?></td>
                        <td class="col-sm-2"><?= $work->categorie ?></td>
                        <td class="col-sm-3"><?= $work->getPrev() ?></td>
                        <td class="col-sm-3">
                        <a class="btn btn-primary" href="<?= $params['edit'] ?><?= $work->id; ?>">Editer</a>
                        <form action="<?= $params['delete'] ?>" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $work->id ?>">
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
