<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 16:24
 */

namespace Core;


class Autoloader {
    /*
     * Autoloader
     * */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    static function autoload($class){

        if(strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace( __NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            $path  = __DIR__ . '/' . $class . '.php';
            if(file_exists($path))
                require $path;
        }
    }

}