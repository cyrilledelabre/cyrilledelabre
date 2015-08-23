<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 03/02/15
 * Time: 00:23
 */

namespace Core\HTML;


class BootstrapImage extends Image
{


    protected $image_height = 500;
    protected $image_width = 500;
    protected $image_path = ABSROOT . 'public/images/';


    protected function link($html, $image)
    {
        return '<a href=' . $image->getUrl() . '>' . $html . '</a>';
    }


    public function getImage($image, $options=[], $link=false)
    {
        if (!is_null($image->image)) {
            $height = (isset($options['height']))? 'max-height: '. $options['height'].'px':'';
            $width =  (isset($options['width']) ) ? 'max-width: '. $options['width']. 'px':'';

            $return = '<img class="img-responsive" src="' . $this->image_path . $image->path . $image->image . '" style=" ' . $width . ' ;' . $height . ';">';

            if ($link) $return = $this->link($return, $image);
            return $return;
        }
    }



    public function getThumb($image,$options=[],$link=false)
    {
        if (!is_null($image->image)) {
            $style ='';
            if(isset($options['height']))
                $style = "style=max-height:".$options['height'].'px';

            $return = '<img class="thumb" src="' . $this->image_path . $image->path . 'thumb/' . $image->image . '" '.$style.'>';

            if ($link) $return = $this->link($return, $image);
            return $return;
        }

    }
    public function getLinkImage($image)
    {
        if (!is_null($image->image)) {
            return $this->image_path . $image->path . $image->image;
        }
    }



}