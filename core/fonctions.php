<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 31/01/15
 * Time: 23:57
 */

namespace Core;


class fonctions
{
    public static function remove_accents($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        $str = preg_replace('/\s+/', '', $str); // supprimer espaces
        $str = strtolower($str);

        return $str;
    }


    public static function createThumbs($pathToImages, $thumbWidth)
    {


        // open the directory
        $dir = opendir($pathToImages);
         var_dump($dir);
$i =0;
        // loop through it, looking for any/all JPG files:
        while (false !== ($fname = readdir($dir))) {
            // parse path_page for the extension
            $info = pathinfo($pathToImages . $fname);

            d($info);
            $img = null;
            // continue only if this is a JPEG image
            if (strtolower($info['extension']) == 'jpg')
                $img = imagecreatefromjpeg("{$pathToImages}{$fname}");

            if (strtolower($info['extension']) == 'png')
                $img = imagecreatefrompng("{$pathToImages}{$fname}");

                // load image and get image size

            if(!isset($info['extension']) && is_dir($pathToImages . $info['basename']) && $i > 3)
            {
                fonctions::createThumbs($pathToImages . $info['basename']. DIRECTORY_SEPARATOR, $thumbWidth);
            }
            $i++;
            if(!is_null($img))
            {

                $width = imagesx($img);
                $height = imagesy($img);

                // calculate thumbnail size
                $new_width = $thumbWidth;
                $new_height = floor($height * ($thumbWidth / $width));

                // create a new temporary image
                $tmp_img = imagecreatetruecolor($new_width, $new_height);

                // copy and resize old image into new image
                imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                if (!is_dir($pathToImages.'thumb/')) mkdir($pathToImages.'thumb/');
                // continue only if this is a JPEG image
                if (strtolower($info['extension']) == 'jpg')
                {
                    imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($tmp_img, $pathToImages.'thumb/'.$fname);


                }


                if (strtolower($info['extension']) == 'png')
                {

                    imagealphablending( $tmp_img, false );
                    imagesavealpha( $tmp_img, true );
                    imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagepng($tmp_img, $pathToImages.'thumb/'.$fname);
                }
                imagedestroy($tmp_img);
                imagedestroy($img);

            }
        }
        // close the directory
        closedir($dir);
    }


    public static function createThumb($pathToImage, $image, $thumbWidth)
    {
        // parse path_page for the extension
        $info = pathinfo($pathToImage.$image);
        // continue only if this is a JPEG image


        if (strtolower($info['extension']) == 'jpg')
            $img = imagecreatefromjpeg($pathToImage.$image);

        if (strtolower($info['extension']) == 'png')
            $img = imagecreatefrompng($pathToImage.$image);
        // load image and get image size

        if(!is_null($img))
        {
            $width = imagesx($img);
            $height = imagesy($img);
            // calculate thumbnail size
            $new_width = $thumbWidth;
            $new_height = floor($height * ($thumbWidth / $width));
            // create a new temporary image
            $tmp_img = imagecreatetruecolor($new_width, $new_height);
            // copy and resize old image into new image

            if (!is_dir($pathToImage.'thumb/')) mkdir($pathToImage.'thumb/');
            // continue only if this is a JPEG image
            if (strtolower($info['extension']) == 'jpg')
            {
                imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($tmp_img, $pathToImage.'thumb/'.$image);


            }


            if (strtolower($info['extension']) == 'png')
            {

                imagealphablending( $tmp_img, false );
                imagesavealpha( $tmp_img, true );
                imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagepng($tmp_img, $pathToImage.'thumb/'.$image);
            }
            imagedestroy($tmp_img);
            imagedestroy($img);

        }
    }

}