<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 20:08
 */

namespace App\Controller;


class PagesController extends AppController{

    public  function __construct()
    {
        parent::__construct();
        $this->loadModel('Page');
        $this->loadModel('Link');

    }

    public function page()
    {
        if(isset($_GET['id'])) {
            $page = $this->Page->find($_GET['id']);
            if ($page === false)
                $this->notFound();
            $this->titre($page->titre);
            $variables = compact('page', 'this');
            $this->render($this->renderName . '.' . __FUNCTION__, $variables);
        }else {
            $this->index();
        }
    }

    public function cv(){
        $controller = new AboutController();
        $controller->index();
    }


    public function blog()
    {
        $controller = new ArticlesController();
        $controller->index();
    }

    public function works()
    {
        $controller = new WorksController();
        $controller->all();
    }
/* a revoir pour faire juste page id */
    public function about()
    {
        $page = $this->Page->bySlug('about');
        $this->titre($page->titre);
        $variables = compact('page');
        $this->render($this->renderName . '.' . 'page', $variables);
    }

}