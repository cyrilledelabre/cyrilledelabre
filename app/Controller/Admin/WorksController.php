<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;
use Core\fonctions;


class WorksController extends \App\Controller\Admin\AppController {
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Work');
        $this->loadModel('Categorie');
        $this->loadModel('Link');
        $this->loadModel('Type');
        $this->renderName = 'admin.works';
        $this->name = 'works';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Works'
            ];
    }

    public function index(){
        $this->titre('Works - Admin');
        $works = $this->Work->all();
        $types = $this->Type->getTypes('works');
        $params = $this->params;
        $variables = compact('works', 'types','params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function add()
    {
        if(!empty($_POST)) {
            $result = $this->Work->create([
                'titre' => $_POST['titre'],
                'soustitre' => $_POST['soustitre'],
                'resume' => $_POST['resume'],
                'keywords' => $_POST['keywords'],
                'contenu' => $_POST['contenu'],
                'id_media' => $_POST['id_media'],
                'id_type' => $_POST['id_type'],
                'id_category' => $_POST['id_category'],
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $categories = $this->Categorie->extract('id','titre');
        $media = $this->Link->extract('id','name');
        $type = $this->Type->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $variables = compact('result','categories','media','form', 'type');
        $this->render( $this->renderName.'.edit', $variables );
    }


    public function edit()
    {
        if(!empty($_POST)){
            $result = $this->Work->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'soustitre' => $_POST['soustitre'],
                'resume' => $_POST['resume'],
                'keywords' => $_POST['keywords'],
                'contenu' => $_POST['contenu'],
                'id_media' => $_POST['id_media'],
                'id_type' => $_POST['id_type'],
                'id_category' => $_POST['id_category']
            ]);
            if($result){
                return $this->index();
            }
        }
        $work = $this->Work->find($_GET['id']);
        $type = $this->Type->extract('id', 'titre');
        $categories = $this->Categorie->extract('id','titre');
        $media = $this->Link->extract('id','name');
        $form = new BootstrapForm($work);
        $variables = compact('result','categories','media','form','type');
        $this->render(  $this->renderName.'.edit', $variables );
    }



    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Work->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

}