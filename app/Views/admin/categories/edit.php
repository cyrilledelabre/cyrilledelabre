<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 23:24
 */
?>


<div class="col-lg-12">
    <div class="well bs-component">
        <form method="post">
            <fieldset>
                <?= $form->input('titre', 'Titre de la catégorie'); ?>
                <?= $form->input('slug', 'slug'); ?>

                <?= $form->submit('Sauvegarder'); ?>
                <a href="<?= ABSROOT . 'public/admin/categories/index'?>" class="btn btn-info ">Retour</a>

            </fieldset>
        </form>
    </div>
</div>
