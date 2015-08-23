<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 15:59
 */

namespace Core\Entity;


class Entity {
    protected $entity;
    public $path_page = ABSROOT.'public/';

    public function getUrl(){
        return $this->path_page.$this->entity.'-'. $this->id;
    }

    public function __construct(){
        if(is_null($this->entity)){
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->entity = strtolower(str_replace('Entity','', $class_name)) . 's';
        }
    }
    public function __get($key){
        $method = 'get' .ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}