<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 31/01/15
 * Time: 15:52
 */
use  \Core\HTML\About\FactoryAbout;
?>

<div class="row">

    <h2 class="page-header text-wrap "><?= $name ?></h2>

<!--    <div id="cd-filter-nav">

        <div class="cs-select cs-skin-elastic" tabindex="0"><span class="cs-placeholder">Restauration</span><div class="cs-options"><ul><li class="cd-all" data-link=".all" data-option="" data-value="all"><span>Tous</span></li><li class="cd-restauration cs-selected" data-link=".restauration" data-option="" data-value="restauration"><span>Restauration</span></li><li class="cd-animation" data-link=".animation" data-option="" data-value="animation"><span>Animation</span></li><li class="cd-informatique" data-link=".informatique" data-option="" data-value="informatique"><span>Informatique</span></li></ul></div><select class="cs-select cs-skin-elastic">
                <option value="" disabled="" selected="">Filtres</option>
                <option class="filter" value="all" data-link=".all" data-type="all" data-class="cd-all">Tous</option>
                <option class="filter" value="restauration" data-link=".restauration" data-type="restauration" data-class="cd-restauration">Restauration</option>
                <option class="filter" value="animation" data-link=".animation" data-type="animation" data-class="cd-animation">Animation</option>
                <option class="filter" value="informatique" data-link=".informatique" data-type="informatique" data-class="cd-informatique">Informatique</option>
            </select></div></div>
-->


    <div class="tabs tabs-style-iconfall">
        <nav>
            <ul>
            <?php foreach($req   as $key => $posts): ?>
                <?= $tab->tab($key); ?>
            <?php endforeach; ?>
            </ul>
        </nav>
        <div id="myTabContent" class="tab-content content-wrap ">
            <?php foreach($req as $key => $posts): ?>


                <?= $tab->show($key);


            ?>
                <?php
                    $affichage = $posts[0]->affichage;

                    $tab = (new FactoryAbout())->fabriquer($affichage);

                    include(ROOT.'/app/Views/about/view/'.$tab->name.'.php');

                ?>
                </section>
            <?php endforeach; ?>
        </div>

    </div>
</div>
