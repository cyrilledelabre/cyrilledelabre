<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 16:45
 */

namespace App\Controller\Admin;
use \App;
use \Core\Auth\DatabaseAuth;
use \Core\fonctions;


class AppController extends \App\Controller\AppController {
    public $params;
    public $name;
    protected $template = 'admin';

    public function __construct()
    {
        parent::__construct();

        $app = App::getInstance();
        $auth = new DatabaseAuth($app->getDb());
        if(!($auth->logged()))
            $this->log();

        $this->renderName = 'admin';

    }


    protected function log(){
    header('Location:'.ABSROOT.'public/users/login');
    }

    protected function uploadFile()
    {
        $uploadOk = 0;
        $comments ='<p class="bg-warning" style="padding-top: "40px">';

        if($_FILES['image']['error']==0) {
            $type = $this->Type->getTitre($_POST['id_type'])->titre;
            if (isset($_POST['id_work'])) {
                $work = fonctions::remove_accents(($this->Work->getTitre($_POST['id_work'])->titre));
                $destination_path = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $work . DIRECTORY_SEPARATOR;
                $return = $type . '/' . $work . '/';

            } else {
                $destination_path = getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR;
                $return = $type . '/';
            }

            $destination_path = strtolower($destination_path);
            $file_name = fonctions::remove_accents($_FILES["image"]["name"]);
            $new_filename = chr(mt_rand(97, 122)) . substr(md5(time()), 1) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);;
            $target_path = $destination_path . $new_filename;
            $imageFileType = pathinfo($target_path, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $comments.= "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $comments.= "File is not an image.\n";
                $uploadOk = 0;
            }

             if (file_exists($target_path)) {
                 $comments.= "Sorry, file already exists.\n";
                 $uploadOk = 0;
             }
            // Check file size
            if ($_FILES["image"]["size"] > 50000000) {
                $comments.= "Sorry, your file is too large.\n";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" && $imageFileType != "JPG"
            ) {
                $comments.= 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.' . $imageFileType;
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $comments.= "Sorry, your file was not uploaded.\n";
                // if everything is ok, try to upload file
            } else {

                if (!is_dir($destination_path)) mkdir($destination_path);
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
                    $comments.= "The file " . basename($_FILES["image"]["name"]) . " has been uploaded. \n";

                    fonctions::createThumb($destination_path, $new_filename,200);


                } else {
                    $comments.= "Sorry, there was an error uploading your file.\n";
                }


            }

        }


        if($uploadOk)
        {

            $image['image'] = $new_filename;
            $image['path'] = $return;
            return $image;
        }

            $comments .='</p>';
        echo $comments;
         return null;

    }


    private function createThumbs()
    {
        fonctions::createThumbs( getcwd() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'info' . DIRECTORY_SEPARATOR,200);
    }

}