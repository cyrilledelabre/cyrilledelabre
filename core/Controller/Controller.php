<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 16:44
 */

namespace Core\Controller;


class Controller {
    protected $viewPath;
    protected $template;

    protected function render($view, $variables = null, $template = null)
    {
        ob_start();
        if(!is_null($variables))extract($variables);
        if(is_null($template))$template=$this->template;

        require($this->viewPath. str_replace('.','/', $view) .'.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' .$template . '.php');
    }


    public function notFound(){
        header("HTTP/1.0 404 Not Found");

        $this->render('404');
        die();
    }



    public static function forbidden(){
        header("HTTP/1.0 403 Forbidden,");
        header("Location:index.php?p=404");
        die('Acces interdit');
    }


}