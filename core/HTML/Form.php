<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 18:36
 */

namespace Core\HTML;


class Form {

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData($name){
        if(is_object($this->data))
        {
            return $this->data->$name;
        }else {
            return isset($this->data[$name]) ? $this->data[$name] : '';
        }
    }

    public function error(){
        $html = '<div class="alert alert-danger"> Identifiant incorrect </div>';
        return $html ;
    }

    public function input($name, $label, $options=[]){
        $type = isset($options['type']) ? $options['type'] :  'text';
        $var =  '<label>' . $label . '</label><input type="'.$type.'" name="'.$name.'" value="'.$this->data.'"/>';
        return $this->surround($var);
    }
}