<div class="row">
    <div class="well bs-component">
        <?
        $boot = new \Core\HTML\BootstrapImage();
        $image  = $form->data();
        if(!is_null( $image))
        echo $boot->getImage($image, ['height' =>'100' , 'width'=>'100'])?>

        <form method="post" enctype="multipart/form-data">
            <?= $form->input('titre', 'Titre image'); ?>
            <?= $form->input('contenu', 'Contenu' ,['type' => 'textarea', 'size' => '10']); ?>
            <?= $form->select('id_type', 'Type', $type); ?>
            <?= $form->select('id_work', 'Work', $work); ?>
            <?= $form->input('image', 'image', ['type' =>'file']); ?>

            <?= $form->submit('Sauvegarder'); ?>
            <a href="<?= ABSROOT . 'public/admin/images/index'?>" class="btn btn-info ">Retour</a>
            <a href="<?= ABSROOT . 'public/works/add'?>" class="btn btn-info ">Works</a>
            <a href="<?= ABSROOT . 'public/links/add'?>" class="btn btn-info ">Links</a>
        </form>
    </div>
</div>
