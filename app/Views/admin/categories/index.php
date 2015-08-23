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
    </p>
</div>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Action</td>
    </tr>
    </thead>
    <?php foreach($items as $categorie ): ?>
    <tr>
        <td><?= $categorie->id ?></td>
        <td><?= $categorie->titre ?></td>
        <td>
            <a class="btn btn-primary" href="<?= $params['edit'] ?><?= $categorie->id; ?>">Editer</a>
            <form action="<?= $params['delete'] ?>" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $categorie->id ?>">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ; ?>
</table>

