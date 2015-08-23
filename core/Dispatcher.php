<?php

namespace Core;

use \Core\Router;
use \Core\Request;
use \App\Controller\AppController;

class Dispatcher{

	var $request;
	function __construct()
    {

        $this->request = new Request();
        Router::parse($this->request->page, $this->request);

        if($this->check())
        {

            $controller = new $this->request->controller();
            $action = $this->request->action;
            $controller->$action();

        }else
        {
            $controller = new AppController();
            $controller->notFound();
        }

    }

    private function check()
    {
        if (class_exists($this->request->controller)) {
            $controller = new $this->request->controller();
            $action = $this->request->action;


            $aMethods = get_class_methods($controller);
            if ($aMethods) {
                foreach ($aMethods as $idx => $method) {
                    if ($action == $method) return true;
                }
            }
        }
        return false;
    }


}
