<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 09/02/15
 * Time: 20:08
 */

namespace App\Controller;


use \App\Controller\AppController;
use \Core\HTML\About\About;

class AboutController extends AppController{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('About');
    }

    public function index()
    {
        $req  = $this->About->AllByCategories();
        $name = $this->About->name();
        $this->titre($name);
        $tab = new About();
        $variables = compact('req','tab', 'name');
        $this->render('about.home', $variables);
    }

}