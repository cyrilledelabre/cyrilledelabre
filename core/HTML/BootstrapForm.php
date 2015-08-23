<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 18:27
 */

namespace Core\HTML;


use Core\fonctions;

class BootstrapForm extends  Form{


    protected function surround($html)
    {
        return '<div class="form-group">'.$html.'</div>';
    }

    public function input($name, $label, $options=[]){
        $type = isset($options['type']) ? $options['type'] :  'text';
        $size = isset($options['size']) ? "rows=".$options['size'].' ' :  '';
        $id = isset($options['id']) ? "id=".$options['id'].' ' :  '';
        $label = '<label class="control-label">' . $label . '</label>';
        if($type === 'textarea') {
            $input = '<textarea '.$size.' name="' . $name . '" '.$id.'class="form-control" >' . $this->getData($name) . '</textarea>';
        }

        else
            $input = '<input type="'.$type.'" '.$id.' class="form-control" name="'.$name.'" value="'.$this->getData($name).'"/>';

        return $this->surround($label. $input);
    }

    public function submit($name){

        $var ='
            <div class="col-lg-10 col-lg-offset-2">
                <button class ="btn btn-primary" type="submit">'.$name.'</button>
            </div>';
        return $this->surround($var);
    }


    public function select($name, $labels, $options)
    {
        $label = '<label class="control-label">' . $labels . '</label>';
        $input = '<select name="'.$name.'" class="form-control" id="'.fonctions::remove_accents($labels).'">';
        foreach($options as $k => $v){
            $attributes ='';
            if($k == $this->getData($name)) $attributes=' selected';
            $input .= "<option value='$k' $attributes>$v</option>";
        }

        $input .= '</select>';
        return $this->surround($label. $input);
    }

    public function data()
    {
        if( isset($this->data))
        return $this->data;
    }
}



