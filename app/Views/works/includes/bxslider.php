<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 18/03/15
 * Time: 21:31
 */

?>



<div class="row">
    <!-- Recent Works -->
    <div class="headline margin-bottom-30"><h3>Autres travaux de type "<?=ucfirst($work->type) ?>" </h3></div>
    <div class="row-fluid margin-bottom-40" style="display: none;">
        <ul id="list" class="bxslider recent-work" >
            <? foreach($works as $item) : ?>
                <li>
                    <div class="view view-tenth isotopeItem" id="list">

                        <em class="overflow-hidden"><?= $bootstrap->getThumb($item)?></em>

                        <div class="mask">
                            <h2><?=$item->titre?></h2>
                            <a href="<?=$item->getURl()?>" class="info">Plus d'info</a>
                        </div>
                    </div>
                </li>
            <? endforeach;?>
        </ul>
        <div class="tp-bannershadow tp-shadow3" style="width: 1098px;"></div>

    </div>
</div>