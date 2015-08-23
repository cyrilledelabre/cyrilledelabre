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
                <?= $form->input('titre', 'Titre'); ?>
                <?= $form->input('etablissement', 'Etablissement'); ?>
                <?= $form->input('lieu', 'Lieu'); ?>
                <?= $form->input('contenu', 'Contenu' ,['type' => 'textarea']); ?>
                <?= $form->input('debut', 'Debut', ['type' => 'date']); ?>
                <?= $form->input('fin', 'Fin', ['type' => 'date']); ?>
                <?= $form->input('type', 'Type'); ?>
                <?= $form->input('experience', 'Experience'); ?>

                <?= $form->select('id_media', 'Image', $links); ?>
                <?= $form->select('id_category', 'Catégorie', $categories); ?>
                <?= $form->submit('Sauvegarder'); ?>

                <a href="<?= ABSROOT . 'public/admin/abouts/index'?>" class="btn btn-info ">Retour</a>
            </fieldset>
        </form>
    </div>
</div>
