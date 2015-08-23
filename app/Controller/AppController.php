<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 16:45
 */

namespace App\Controller;
use \Core\Controller\Controller;
use \Core\Auth\DatabaseAuth;
use \App;


class AppController extends Controller {
       // redirection : View/$renderName/function
       protected $renderName;
       protected $template = 'default';
       protected $viewPath;

    public function __construct(){
        $this->viewPath= ROOT . '/App/Views/';
        if(!isset($this->renderName))
        {
            $className = explode('\\', get_class($this));
            $this->renderName = strtolower(str_replace('Controller','', end($className)));
        }

        $app = App::getInstance();
        $auth = new DatabaseAuth($app->getDb());
        if($auth->logged())
             $this->template = 'admin';
    }
    protected function titre($titre){
        $title = App::getInstance()->title;
        App::getInstance()->title =  $titre ." - ". $title;
    }

    protected function loadModel($model)
    {
        $this->$model = App::getInstance()->getTable($model);
    }

    public function index()
    {

        $this->render($this->renderName . '.' . __FUNCTION__);
    }


}