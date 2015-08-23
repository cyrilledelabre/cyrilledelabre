<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 00:19
 */

namespace Core\HTML\About;
use \Core\fonctions;

class FactoryAbout {
    public function fabriquer($category){
        $classeCible = '\\Core\\HTML\\About\\'. fonctions::remove_accents($category.'About');
        if(class_exists($classeCible))
            return new  $classeCible();
        else
            return new About($classeCible);
    }
}





