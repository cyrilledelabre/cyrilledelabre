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
                <?= $form->input('soustitre', 'SousTitre'); ?>
                <?= $form->input('keywords', 'Mots Clefs'); ?>

                <?= $form->input('resume', 'Resumé' ,['type' => 'textarea', 'size' => '10', 'id' => 'wysiwyg']); ?>

                <?= $form->input('contenu', 'Contenu' ,['type' => 'textarea', 'size' => '20', 'id' => 'wysiwyg']); ?>

                <?= $form->select('id_type', 'Type', $type); ?>

                <?= $form->select('id_media', 'Image', $media); ?>

                <?= $form->select('id_category', 'Catégorie', $categories); ?>

                <?= $form->submit('Sauvegarder'); ?>


                <div class="col-lg-12 margin-top-10">
                    <button href="<?= ABSROOT . 'public/admin/works/index'?>" class="btn btn-info ">Retour</button>
                    <button href="<?= ABSROOT . 'public/images/add'?>" class="btn btn-info ">Images</button>
                    <button href="<?= ABSROOT . 'public/links/add'?>" class="btn btn-info ">Links</button>
                </div>
            </fieldset>


        </form>
    </div>
</div>
