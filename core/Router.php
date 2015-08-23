<?php

namespace Core;
use \App\Controller\AppController;

class Router{

	static function parse($page, $request){

		$page= explode('.', $page);

        if($page[0] == 'admin')
        {   $path = '\App\Controller\Admin\\';
            $request->action =   isset($page[2]) ? $page[2] : "index";
            if(isset($page[1]) && $page[1] != 'index') {
                $request->controller = $path . fonctions::remove_accents(ucfirst($page[1]) . 'Controller');
            }
            else
            {
                $request->controller = $path . 'AppController';
            }

        }
        else
        {
            $path = '\App\Controller\\';
            $request->action  = isset($page[1]) ? $page[1] : "index";
            if (isset($page[0]))
                $request->controller = $path . fonctions::remove_accents(ucfirst($page[0]) . 'Controller');
            else
                $request->controller = $path . 'AppController';
        }

		return true;
	}
}
?>