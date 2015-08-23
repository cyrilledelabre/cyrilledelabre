<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 23:22
 */

namespace Core;



class Config {
    private $settings =  [];
    private static $_instance;


    public static function getInstance($file){
        if(is_null(self::$_instance))
            self::$_instance = new Config($file);
        return self::$_instance;
    }

    private function __construct($file)
    {
        $this->settings = require($file);
    }

    public function getSettings(){
        if(!isset($this->settings))
            return null;
        return $this->settings;

    }
    public function get($key)
    {
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}