<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;


class ArticlesController extends \App\Controller\Admin\AppController {
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Categorie');
        $this->renderName = 'admin.articles';
        $this->name = 'articles';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Articles'
            ];

    }

    public function index(){
        $this->titre('Admin - Articles');
        $articles = $this->Article->all();

        $params = $this->params ;

        $variables = compact('articles', 'params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function add()
    {

        if(!empty($_POST)){
            $result = $this->Article->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'id_category' => $_POST['id_category']

            ]);
            if($result){
                return $this->index();
            }
        }
        $categories = $this->Categorie->extract('id','titre');
        $form = new BootstrapForm($_POST);

        $variables = compact('result','categories','form');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function edit()
    {

        if(!empty($_POST)){
            $result = $this->Article->update($_GET['id'],[
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'id_category' => $_POST['id_category']

            ]);
            if($result){
                return $this->index();
            }
        }


        $post = $this->Article->find($_GET['id']);
        $categories = $this->Categorie->extract('id','titre');
        $form = new BootstrapForm($post);

        $variables = compact('post','categories','form');
        $this->render(  $this->renderName.'.edit', $variables );

    }



    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Article->delete($_POST['id']);
            if($result){
               return $this->index();
            }
        }
    }

}