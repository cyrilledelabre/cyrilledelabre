<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 17:14
 */

namespace Core\Database;

use \PDO;
class DatabaseSql extends Database {
        private $conf = array();
        private $pdo;

        public  function  __construct(array $conf)
        {
            $this->conf = $conf;
            $this->conf = array_shift ($this->conf);
        }

        private function getPDO()
        {
            if(!isset($this->pdo)) {
                $pdo = new PDO(
                    'mysql:host=' . $this->conf['host'] . ';dbname=' . $this->conf['database'] . ';',
                    $this->conf['login'],
                    $this->conf['password'],
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
                );
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            return $this->pdo;
        }

        public function query($query, $class_name =null,  $one = false)
        {
            $req = $this->getPDO()->query($query);

            if(strpos($query,'UPDATE') === 0 || strpos($query,'INSERT') === 0 || strpos($query,'DELETE') === 0)
                return $req;

            return $this->subquery($one, $class_name, $req);
        }

        public function prepare($query, $attributes, $class_name =null, $one = false)
        {
            $req = $this->getPDO()->prepare($query);
            $res = $req->execute($attributes);

            if(strpos($query,'UPDATE') === 0 || strpos($query,'INSERT') === 0 || strpos($query,'DELETE') === 0)
                return $res;

            return  $this->subquery($one, $class_name, $req);

        }


        private function subquery($one, $class_name, $req)
        {
            if($class_name === null){
                $req->setFetchMode(PDO::FETCH_OBJ);
            }else{
                $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
            }

            if($one){
                return $req->fetch();
            }else{
                return $req->fetchAll();
            }
        }

        public function lastInsertId()
        {
            return $this->getPDO()->lastInsertId();
        }

}