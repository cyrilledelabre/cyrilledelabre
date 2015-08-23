<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 16/03/15
 * Time: 20:59
 */

namespace app\Modeles\Entity;


use Core\Entity\Entity;

class AppEntity extends Entity {

    protected  $image_height = 20;
    protected  $image_width = 20;
    protected  $image_path =  ABSROOT . 'public/images/';

    protected $image_height_prev = 50;
    protected $image_width_prev = 50;

    public function getImage($width= null, $link=true)
    {
        if(!is_null($this->image))
        {
            if(!isset($width))$width=$this->image_width;

            $return = '<img class="img-responsive" src="' .$this->image_path .$this->path.'thumb/' . $this->image . '" ;">';

            if($link)$return = $this->link($return);
            return $return;
        }
    }

    public function link($html)
    {
        return '<a href=' . $this->getUrl() . '>' .$html. '</a>';
    }


    public function getThumb()
    {
        if(!is_null($this->image))
        {
            $return = '<a href=' . $this->getUrl() . '>';
            $return .= '<img src="' .$this->image_path .$this->path.'thumb/'. $this->image . '"alt="'.$this->titre.'" style="max-width: ' . $this->image_height . 'px">';
            $return .= '</a>';
            return $return;
        }

    }

    public function getPrev()
    {
        if(!is_null($this->image))
        {
            $return = '<a href=' . $this->getUrl() . '  style="height: ' . $this->image_height_prev . 'px;width:' . $this->image_width_prev . 'px">';
            $return .= '<img src="' .$this->image_path .$this->path.'thumb/'. $this->image . '" style=" max-width:'.$this->image_width_prev.'px;">';
            $return .= '</a>';
            return $return;
        }
    }

    public function getPureImage()
    {
        if(!is_null($this->image))
        {
            $return = '<img src="' .$this->image_path .$this->path. $this->image .'" alt="'.$this->titre.'" style=" max-height:200px;">';
            return $return;
        }
    }

    public function getExtrait(){
        $html = '<p>'. substr($this->contenu ,0, 50) . '</p>';
        return $html ;
    }

} 