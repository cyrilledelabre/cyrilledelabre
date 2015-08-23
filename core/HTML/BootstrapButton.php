<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 03/02/15
 * Time: 00:23
 */

namespace Core\HTML;


class BootstrapButton extends Button{



    protected function surround($html)
    {
        return '<div class="form-group">'.$html.'</div>';
    }


    public function button($href, $class, $info){
        $html =  '<a href="'.$href.'" class="btn '.$class.' ">'.$info.'</a>';
        return $this->surround($html);

    }
}