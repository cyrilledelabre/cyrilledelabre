<div class="col-lg-12">
    <div class="well bs-component">
        <form method="post" enctype="multipart/form-data">
            <?= $form->input('name', 'Titre lien'); ?>
            <?= $form->input('link', 'Lien Externe'); ?>
            <?= $form->select('id_type', 'Type', $type); ?>
            <?= $form->input('image', 'image', ['type' =>'file']); ?>

            <?= $form->submit('Sauvegarder'); ?>


            <a href="<?= ABSROOT . 'public/admin/links/index'?>" class="btn btn-info ">Retour</a>
            <a href="<?= ABSROOT . 'public/works/add'?>" class="btn btn-info ">Works</a>
            <a href="<?= ABSROOT . 'public/links/add'?>" class="btn btn-info ">Links</a>
        </form>
    </div>
</div>
