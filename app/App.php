<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 20:35
 */

Use Core\Database\DatabaseSql;
Use Core\Config;

class App{
    public  $title = "Cyrille Delabre";

    private static $_instance;
    private  $db_instance;
    private static $debug;
    public static function getInstance(){
        if(is_null(self::$_instance))
            self::$_instance = new App();
        return self::$_instance;
    }

    public static function load(){
        if(isset(self::$debug))
            require ROOT . '/kint-master/Kint.class.php';

        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    /**
     * Table toujours au singulier !
     * @param $name
     * @return mixed
     */
    public function getTable($name){
      if(substr($name, -1) === 's'){$name = substr_replace($name, "", -1);}
      $class_name = '\\App\\Modeles\\Table\\' . ucfirst($name) . 'Table';
      return new $class_name($this->getDb());
    }

    public function home(){
        return ABSROOT.'public/pages/about';
    }

    public function getCss($css)
    {
        return ABSROOT.'public/css/'.$css.'.css';
    }
    public function getJs($js)
    {
        return ABSROOT.'public/js/'.$js.'.js';
    }


    public function get($root)
    {
        return ABSROOT.'public/'.$root.'';
    }
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/conf.php')->getSettings();
        if(is_null($this->db_instance)) {
            $this->db_instance = new DatabaseSql($config);
        }
        return $this->db_instance;
    }


}