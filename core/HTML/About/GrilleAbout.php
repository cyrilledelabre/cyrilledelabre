<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 00:46
 */

namespace Core\HTML\About;


class GrilleAbout extends About{
/* Langages de Programation - Logiciels*/

    protected $image_height = 50;
    protected $image_width = 50;


    public function classByType($posts){

        $return = array();
        foreach ($posts as $object){
            if(isset($return[$object->type]))
                array_push($return[$object->type], $object);
            else
                $return[$object->type] =[$object];
        }
        return $return;

    }
}