<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;


class CategoriesController extends \App\Controller\Admin\AppController {
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Categorie');
        $this->renderName = 'admin.categories';

        $this->name = 'categories';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Categories'
            ];
    }

    public function index(){

        $this->titre('Admin - Categories');
        $items = $this->Categorie->all();
        $params = $this->params;
        $variables = compact('items','params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function add()
    {
        if(!empty($_POST)){
            if(empty($_POST['slug']))
                $_POST['slug'] =\Core\fonctions::remove_accents($_POST['titre']);

            $result = $this->Categorie->create([
                'titre' => $_POST['titre'],
                'slug' => $_POST['slug']
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $variables = compact('form');
        $this->render( $this->renderName.'.edit', $variables );
    }

    public function edit()
    {
        if(!empty($_POST)){

            if(empty($_POST['slug']))
                $_POST['slug'] =\Core\fonctions::remove_accents($_POST['titre']);
            $result = $this->Categorie->update($_GET['id'],[
                'titre' => $_POST['titre'],
                'slug' => $_POST['slug']
            ]);
            if($result){
                return $this->index();
            }
        }
        $categorie = $this->Categorie->find($_GET['id']);
        $form = new BootstrapForm($categorie);
        $variables = compact('categories','form');
        $this->render(  $this->renderName.'.edit', $variables );
    }



    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Categorie->delete($_POST['id']);
            if($result){
               return $this->index();
            }
        }
    }

}