<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 04/02/15
 * Time: 21:16
 */

namespace App\Controller;
use \Core\HTML\BootstrapForm;
use \Core\Auth\DatabaseAuth;
use \App;

class UsersController extends AppController{
    public function login()
    {
        $errors = false;

        $form = new BootstrapForm($_POST);
        if(!empty($_POST)){
            $auth = new DatabaseAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location:'.ABSROOT.'public/admin/index');
                //redirection
            } else {
               $errors = true;
            }
        }


        $variables = compact('form','errors');
        $this->render($this->renderName . '.' . __FUNCTION__, $variables);
    }

}