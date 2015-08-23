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
                <?= $form->input('titre', 'Titre de la Page'); ?>
                <?= $form->input('contenu', 'Contenu' ,['type' => 'textarea', 'size' => '20', 'id' => 'wysiwyg']); ?>
                <?= $form->input('slug', 'Slug'); ?>

                <?= $form->submit('Sauvegarder'); ?>

                <a href="<?= ABSROOT . 'public/admin/pages/index'?>" class="btn btn-info ">Retour</a>
                <a href="<?= ABSROOT . 'public/works/add'?>" class="btn btn-info ">Works</a>
                <a href="<?= ABSROOT . 'public/links/add'?>" class="btn btn-info ">Links</a>
            </fieldset>
        </form>
    </div>
</div>
