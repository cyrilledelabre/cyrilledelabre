<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 07/02/15
 * Time: 18:12
 */

namespace App\Modeles\Entity;


use Core\Entity\Entity;
use \Core\fonctions;

class WorkEntity extends LinkEntity{

    protected $entity;

    public function __construct()
    {

        if(isset($this->titre))
        {
            $this->entity = "works/".fonctions::remove_accents($this->titre);
        }
        else
            $this->entity = "works/work";
    }

    public function goBack()
    {
        return $this->path_page . 'works/' . $this->id_type;
    }



}