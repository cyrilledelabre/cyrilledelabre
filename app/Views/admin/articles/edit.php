<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 23:24
 */
?>


<div class="bs-component">
<div class="col-lg-12">
    <div class="well bs-component">
        <form method="post">
            <fieldset>
                <?= $form->input('titre', 'Titre de l\'article'); ?>
                <?= $form->input('contenu', 'Contenu' ,['type' => 'textarea', 'size' => '20', 'id' => 'wysiwyg']); ?>
                <?= $form->select('id_category', 'Catégorie', $categories); ?>

                <?= $form->submit('Sauvegarder'); ?>
                <a href="<?= ABSROOT . 'public/admin/articles/index'?>" class="btn btn-info ">Retour</a>

            </fieldset>
        </form>
    </div>
</div>
</div>