<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 22/03/15
 * Time: 16:19
 */ ?>
<nav  id="filter" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li><a href="#"   data-filter="*>">Toutes</a></li>
                    <li><a href="#"  data-filter=".xx">Aucunes</a></li>
                    <? foreach($types as $filter) :?>
                        <li><a href="#" data-filter=".<?=$filter->id_type?>"><?=ucfirst($filter->titre)?></a></li>
                    <? endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="col-lg-12 slice clearfix">
    <div class="row">

        <div class="portfolio-items isotopeWrapper clearfix">
                <? foreach($items as $item):?>
                    <div class="isotopeItem <?= $item->id_type?>">
                       <a href='#' class="img">
                           <?= $bootstrap->getThumb($item, ['width' => '150'], false) ?>
                       </a>
                    </div>
                <? endforeach;?>
        </div>
    </div>
</div>


<div class="col-xs-12">
    <h3>Ajouter une image : </h3>
    <div class="well bs-component">
        <form method="post" enctype="multipart/form-data">
            <?= $form->input('name', 'Titre image'); ?>
            <?= $form->input('link', 'Lien Externe'); ?>
            <?= $form->select('id_type', 'Type', $type); ?>
            <?= $form->input('image', 'image', ['type' =>'file'] ); ?>
            <?= $form->submit('Sauvegarder'); ?>

        </form>
    </div>
</div>



<script type="text/javascript">


    $('.thumb').click(function(){
        var selectedImage   = $(this).attr('src');
        var params = top.tinymce.activeEditor.windowManager.getParams(),
            input = params.input,
            win = params.window;
        win.document.getElementById(input).value = selectedImage;
        top.tinymce.activeEditor.windowManager.close();

    });



</script>

