<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 16:23
 */

use \App\Controller\AppController;

use \Core\Dispatcher;
define('ROOT',dirname(__DIR__));
define('ABSROOT' ,'/');
define('ABSROOTT', '/Users/cyrilledelabre/info/projects/cyrilledelabre/');
require ROOT . '/app/App.php';

App::load();

new Dispatcher();



