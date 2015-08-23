<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;
use \Core\HTML\BootstrapImage;

use \Core\fonctions;

class ImagesController extends \App\Controller\Admin\AppController {
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Image');
        $this->loadModel('Type');
        $this->loadModel('Work');
        $this->renderName = 'admin.images';
        $this->name = 'images';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Images'
            ];
    }




    public function index(){
        $this->titre('Images - Admin');
        $items = $this->Image->all();
        $types = $this->Type->getTypes('images');
        $works = $this->Work->getWorks('images');
        $params = $this->params;

        $bootstrap = new BootstrapImage();
        $variables = compact('items','types','bootstrap' , 'works','params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }


    public function addorchoose()
    {
        if(!empty($_POST)){
            $image  = $this->uploadFile();
            if(empty($_POST['titre']))
                $_POST['titre'] = 'Sans titre';
            if(!is_null($image)) {
                $result = $this->Image->create([
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type'=> $_POST['id_type'],
                    'id_work' => $_POST['id_work']
                ]);
            }
        }

        $items = $this->Image->all();
        $types = $this->Type->getTypes('images');
        $works = $this->Work->getWorks('images');
        $params = $this->params;

        $type = $this->Type->extract('id', 'titre');
        $work = $this->Work->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $bootstrap = new BootstrapImage();

        $variables = compact('form','type', 'work', 'bootstrap','items','types','works','params');
        $this->render( $this->renderName.'.addorchoose', $variables, 'browserView' );
    }

    public function add()
    {
        if(!empty($_POST)){
            $image  = $this->uploadFile();
            if(empty($_POST['titre']))
                $_POST['titre'] = 'Sans titre';
            if(!is_null($image)) {
                $result = $this->Image->create([
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type'=> $_POST['id_type'],
                    'id_work' => $_POST['id_work']
                ]);
            }
            if ($result) {
                return $this->index();
            }
        }
        $type = $this->Type->extract('id', 'titre');
        $work = $this->Work->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $bootstrap = new BootstrapImage();

        $variables = compact('form','type', 'work', 'bootstrap');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function edit()
    {
        if(!empty($_POST)){

            $image  = $this->uploadFile();
            if(!is_null($image)) {
                $result = $this->Image->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type' => $_POST['id_type'],
                    'id_work' => $_POST['id_work']

                ]);
            }else {
                $result = $this->Image->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'id_type' => $_POST['id_type'],
                    'id_work' => $_POST['id_work']

                ]);
            }
            if ($result) {
                return $this->index();
            }
        }

        $type = $this->Type->extract('id', 'titre');
        $work = $this->Work->extract('id', 'titre');
        $bootstrap = new BootstrapImage();

        $link = $this->Image->find($_GET['id']);
        $form = new BootstrapForm($link);
        $variables = compact('form', 'type', 'work', 'bootstrap');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Image->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }




}