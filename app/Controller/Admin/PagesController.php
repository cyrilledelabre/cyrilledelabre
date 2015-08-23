<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;


class PagesController extends \App\Controller\Admin\AppController {
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Page');

        $this->renderName = 'admin.pages';
        $this->name = 'pages';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer les Pages'
            ];

    }

    public function index(){
        $this->titre('Admin - Pages');
        $pages = $this->Page->all();
        $params = $this->params;
        $variables = compact('pages','params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function add()
    {
        if(!empty($_POST)){
            $result = $this->Article->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'slug' => $_POST['slug']
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $variables = compact('result','form');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function edit()
    {
        if(!empty($_POST)){
            $result = $this->Page->update($_GET['id'],[
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'slug' => $_POST['slug']
            ]);
            if($result){
                return $this->index();
            }
        }
        $post = $this->Page->find($_GET['id']);
        $form = new BootstrapForm($post);
        $variables = compact('post','form');
        $this->render(  $this->renderName.'.edit', $variables );
    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Page->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

}