<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 18:58
 * included by \pages\about\view\Home
 * has
 * $post -> AboutEntity object-> category Etudes
 * $tab -> EtudesAbout object
 *
 * * BDD About
 * id
 * titre

 * contenu
 *
 * experience
 * type
 * slug
 *
 * id_category as categorie
 *
 */

 /* Ordonner par type : */

$categories = $tab->classByType($posts);

?>
    <div class="row margin-top-20"></div>

  <?foreach($categories as $name => $posts):
      ?>

   <div class="row">
     <h3><?= $name?></h3>
   </div>
   <div class="row">


   <?php
   foreach( $posts as $i => $post ):
    $color =  'progress-bar-'.rand(0 , 5);
    ?>
       <div class="col-xs-3">
        <div class="col-md-3 ">
            <span class="visible-md-block visible-lg">
                <?= $tab->getImage($post,false); ?>
            </span>
        </div>

        <div class="col-md-9">
          <h4 class="spec"><?= $post->titre?></h4>
          <div class="visible-lg">
           <div class="progress">
            <div class="progress-bar <?=$color;?>" style="width: <?=$post->experience?>%;"></div>
              <p><i><small><?= $post->contenu?></small></i></p>
          </div>
        </div>

       </div>
    </div>


      <?endforeach; ?>
   </div>

<?php endforeach; ?>