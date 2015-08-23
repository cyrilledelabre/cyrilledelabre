<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 31/01/15
 * Time: 21:55
 */

namespace Core\HTML\About;

use Core\fonctions;

class About {
    protected $active ='Études';
    protected $image_height = 70;
    protected $image_width = 70;
    public $name;
    public function __construct($classeCible =null){
        $classname = explode('\\', get_class($this));
        $this->name = fonctions::remove_accents(end($classname));

    }

    public function tab($name){
        $conds =[array(' class="tab-current"','true'), array('','false') ];
        ($this->active == $name) ? $cond=0  : $cond =1;
        return '
        <li '.$conds[$cond][0].'>
        <a href="#'.fonctions::remove_accents($name).'" class="icon icon-'.fonctions::remove_accents($name).'">
            <span>'.ucfirst($name).'</span>
            </a>
        </li>';
    }


    public function show($name){
        $conds =['content-current',''];
        $this->active == $name ? $cond=0  : $cond =1;
        return'<section class="'.$conds[$cond].'" id="'.fonctions::remove_accents($name).'">';
    }


    public function getImage($post, $link=true)
    {
        if ($post->image !=''){
            $link ? $link = 'href="http://' . rawurlencode($post->link) . '"' : $link = '';
            $return = '<a ' . $link . '  style="height: ' . $this->image_height . 'px;width:' . $this->image_width . 'px">';
            $return .= '<img src="' . ABSROOT . 'public/images/' .$post->path. $post->image . '" alt="logo"style="padding: 10px 0px 0px 0px; max-width:'.$this->image_width.'px;">';
            $return .= '</a>';
            return $return;
        }
    }


}