<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 07/02/15
 * Time: 18:10
 */

namespace App\Controller;
use \Core\HTML\BootstrapImage;


class WorksController extends AppController
{
    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Work');
        $this->loadModel('Link');
        $this->loadModel('Categorie');
        $this->loadModel('Image');

    }

    public function index()
    {
        $works = $this->Work->findByType($_GET['type']);
        if(sizeof($works) < 1) {
            $this->notFound();
        }
        else
        {
            $this->titre(ucfirst($_GET['type']));
            $titre = ucfirst($_GET['type']);
            $bootstrap = new BootstrapImage();

            $categories = $this->Categorie->getCategoriesByType($_GET['type'], 'works');
            $variables = compact('works', 'categories', 'titre','bootstrap');
            $this->render($this->renderName . '.' . __FUNCTION__, $variables);
        }
    }


    public function all()
    {
        $titre = ucfirst('Tous les Projets');
        $works = $this->Work->all();
        $bootstrap = new BootstrapImage();

        $categories = $this->Work->getCategories(); //tableau
        $variables = compact('works','categories', 'titre','bootstrap');
        $this->render($this->renderName . '.index', $variables) ;

    }

  



    public function work()
    {
        $work = $this->Work->findWithCategory($_GET['id']);
        if(!$work)
            $this->notFound();

        $this->titre($work->titre);
        $works = $this->Work->allThumb($work->id_type, $work->id);
        $images = $this->Image->findImages($_GET['id']);
        $bootstrap = new BootstrapImage();

        $variables = compact('work', 'images', 'works', 'bootstrap');
        // if($work->affichage == 'Image')
        //     $this->render($this->renderName .'/image', $variables );
        // else
            $this->render($this->renderName .'/default', $variables );



    }

}