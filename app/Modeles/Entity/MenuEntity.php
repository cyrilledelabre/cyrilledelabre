<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 31/01/15
 * Time: 20:44
 */

namespace App\Modeles\Entity;
use \Core\Entity\Entity;

class MenuEntity extends Entity {

    public function getUrl(){
        return $this->path_page.$this->slug;
    }

}