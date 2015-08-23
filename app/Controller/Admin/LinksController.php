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


class LinksController extends \App\Controller\Admin\AppController {
    /**
     *
     */
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Link');
        $this->loadModel('Type');
        $this->renderName = 'admin.links';
        $this->name = 'links';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Links'
            ];
    }


    public function index()
    {
        $this->titre('Liens - Admin');
        $items = $this->Link->all();
        $types = $this->Type->getTypes('links');
        $bootstrap = new BootstrapImage();
        $params = $this->params;
        $variables = compact('items','types','bootstrap','params');

        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function addorchoose()
    {
        if(!empty($_POST)){
            $image  = $this->uploadFile();
            if(empty($_POST['titre']))
                $_POST['titre'] = 'Sans titre';
            if(!is_null($image)) {
                $result = $this->Link->create([
                    'name' => $_POST['name'],
                    'link' => $_POST['link'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type' => $_POST['id_type']
                ]);
                if($result)
                    unset($_POST);
            }
        }

        $items = $this->Link->all();
        $types = $this->Type->getTypes('images');
        $params = $this->params;

        $type = $this->Type->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $bootstrap = new BootstrapImage();

        $variables = compact('form','type', 'bootstrap','items','types','params');
        $this->render( $this->renderName.'.addorchoose', $variables, 'browserView' );
    }

    public function add()
    {
        if(!empty($_POST)){
            $image  = $this->uploadFile();
            if(!is_null($image)) {
                $result = $this->Link->create([
                    'name' => $_POST['name'],
                    'link' => $_POST['link'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type' => $_POST['id_type']
                ]);
            }else {
                $result = $this->Link->create([
                    'name' => $_POST['name'],
                    'link' => $_POST['link'],
                    'id_type' => $_POST['id_type']
                ]);
            }
            if ($result) {
                return $this->index();
            }
        }
        $type = $this->Type->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $bootstrap = new BootstrapImage();

        $variables = compact('form','type','bootstrap');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function edit()
    {
        if(!empty($_POST)){
            $image  = $this->uploadFile();
            if(!is_null($image)) {
                $result = $this->Link->update($_GET['id'], [
                    'name' => $_POST['name'],
                    'link' => $_POST['link'],
                    'image' => $image['image'],
                    'path' => $image['path'],
                    'id_type' => $_POST['id_type']
                ]);
            }else {
                $result = $this->Link->update($_GET['id'], [
                    'name' => $_POST['name'],
                    'link' => $_POST['link'],
                    'id_type' => $_POST['id_type']
                ]);
            }
            if ($result) {
                return $this->index();
            }
        }

        $type = $this->Type->extract('id', 'titre');
        $link = $this->Link->find($_GET['id']);
        $form = new BootstrapForm($link);
        $bootstrap = new BootstrapImage();

        $variables = compact('form', 'type','bootstrap');

        $this->render( $this->renderName.'.edit', $variables );

    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Link->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }




}