<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 16:45
 */

namespace App\Controller;
use \App;
use \Core\Controller\Controller;

class ArticlesController extends AppController {

    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Categorie');
    }

    public function index(){
        $this->titre('Articles');
        $articles = $this->Article->last();
        /*
        $categories = $this->Categorie->getCategories($this->Article->getCategories());
        */
        $categories = $this->Categorie->getCategoriesFrom('articles');
        $categorie_url = $articles[0]->path_page . 'articles.categorie&id=';


        $variables = compact('articles','categories','categorie_url');
        $this->render($this->renderName .'.'. __FUNCTION__, $variables );
    }
    public function categorie(){

        $categorie = $this->Categorie->find($_GET['id']);
        if($categorie === false)
            $this->notFound();


        $this->titre('Categorie : ' . $categorie->titre);
        $articles = $this->Article->lastByCategorie($_GET['id']);
        $categories = $this->Article->getCategories();
        $categorie_url = $articles[0]->path_page . 'articles.categorie&id=';

        $variables = compact('articles','categorie','categories','categorie_url');
        $this->render($this->renderName .'.'. __FUNCTION__, $variables );
    }
    public function article(){
        $article = $this->Article->findWithCategory($_GET['id']);
        if(!$article)
            $this->notFound();

        $this->titre($article->titre);

        $variables = compact('article');
        $this->render($this->renderName .'.'. __FUNCTION__, $variables );
    }
}