<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:58
 */

namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;


class AboutsController extends \App\Controller\Admin\AppController {

    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('About');
        $this->loadModel('Categorie');
        $this->loadModel('Link');
        $this->renderName = 'admin.abouts';
        $this->name = 'abouts';
        $this->params =
            [   'delete' => ABSROOT . 'public/admin/'.$this->name.'/delete',
                'add' => ABSROOT . 'public/admin/'.$this->name.'/add' ,
                'edit' => ABSROOT . 'public/admin/'.$this->name.'/edit-',
                'titre' => 'Administrer le CV'
            ];
    }

    public function index(){



        $this->titre('Cv - Admin');
        $params = $this->params;
        $abouts = $this->About->allByCatWithImg();
        $variables = compact('abouts', 'params');
        $this->render( $this->renderName .'.'. __FUNCTION__, $variables );
    }

    public function add()
    {

        if(!empty($_POST)) {
            $result = $this->About->create([
                'titre' => $_POST['titre'],
                'etablissement' => $_POST['etablissement'],
                'lieu' => $_POST['lieu'],
                'contenu' => $_POST['contenu'],
                'debut' => $_POST['debut'],
                'fin' => $_POST['fin'],
                'id_media' => $_POST['id_media'],
                'id_category' => $_POST['id_category'],
                'experience' => (int)$_POST['experience'],
                'type' => $_POST['type']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $links = $this->Link->extractByType('id','name','about');
        $categories = $this->Categorie->extract('id','titre');
        $form = new BootstrapForm($_POST);


        $variables = compact('result','categories','form', 'links');
        $this->render( $this->renderName.'.edit', $variables );

    }

    public function edit()
    {

        if(!empty($_POST)){
            $result = $this->About->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'etablissement' => $_POST['etablissement'],
                'lieu' => $_POST['lieu'],
                'contenu' => $_POST['contenu'],
                'debut' => $_POST['debut'],
                'fin' => $_POST['fin'],
                'id_media' => $_POST['id_media'],
                'type' => $_POST['type'],
                'experience' => $_POST['experience'],
                'id_category' => $_POST['id_category']
            ]);
            if($result){
                return $this->index();
            }
        }

        d($_GET['id']);

        $about = $this->About->find($_GET['id']);
        $links = $this->Link->extractByType('id','name','about');
        $categories = $this->Categorie->extract('id','titre');
        $form = new BootstrapForm($about);

        $variables = compact('about','categories','form','links');
        $this->render(  $this->renderName.'.edit', $variables );

    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->About->delete($_POST['id']);
            if($result){
                return $this->index();
            }
        }
    }

}