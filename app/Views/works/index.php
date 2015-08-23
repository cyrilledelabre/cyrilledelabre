<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 07/02/15
 * Time: 18:09
 */

?>

<div class="row">
    <h3 class="page-header text-wrap " id="nav-tabs"><?= $titre ?></h3>


<!-- content -->
<section id="content" class="portfolio">
    <div class="col-sm-12 margin-bottom-40">
        <nav id="filter">
            <ul class="nav filter">
            <li><a href="#" class="current" data-filter="*">Tous</a></li>
                 <? foreach($categories as $categorie) :?>
                     <li><a href="#" class=""  data-filter=".<?=$categorie->slug?>"><?=$categorie->titre?></a></li>
                <? endforeach;?>
            </ul>
        </nav>
    </div>


    <div class="col-lg-12 slice clearfix">
            <div class="portfolio-items isotopeWrapper clearfix " style="display: none;">
            <? foreach($works as $work):?>
                <article class="isotopeItem <?= $work->slug?> presBloc">
                    <div class="imgWrapper">
                            <div class="view view-tenth">
                                <?= $bootstrap->getThumb($work, false);?>

                                <div class="mask">
                                    <h2><?=$work->titre?></h2>
                                    <a href="<?=$work->getURl()?>" class="info">Plus d'info</a>
                                </div>
                            </div>
                    </div>
                </article>
            <? endforeach;?>
            </div>
    </div>
</section>


</div>