<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 18:15
 */

namespace Core\Table;
use Core\Database\Database;

class Table {

    protected $table;
    protected $db;
    protected $name;

    public function  __construct(Database $db)
    {
        $this->db = $db;
        $parts = explode('\\', get_class($this));
        $class_name = end($parts);
        //find name of table automatic -> e.q : categories / posts / user
        if(is_null($this->table))
            $this->table = strtolower(str_replace('Table','', $class_name)) . 's';
        if(is_null($this->name))
            $this->name = (str_replace('Table','', $class_name));

    }

    public function name(){
        return $this->name;
    }

    public function all(){
        return $this->query('
            SELECT *
            FROM '. $this->table .'

            ');
    }

    public function find($id){
        return  $this->query('
            SELECT *
            FROM '.$this->table.'
            WHERE id = ?',
            [$id],
            true
        );
    }

    public function getCategories(){
        $result =$this->query('
            SELECT id_category, categories.titre, categories.slug
            FROM  categories, '.$this->table.'
            WHERE id_category= categories.id
            GROUP BY id_category
            ', null, false, false);


        return $result;
    }



    public function update($id, $fields)
    {
        $sql_parts =[];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts);

        return  $this->query("UPDATE {$this->table} SET $sql_part WHERE id =?", $attributes, true);
    }

    public function delete($id)
    {
        return  $this->query("DELETE FROM {$this->table} WHERE id =?", [$id], true);
    }

    public function create($fields)
    {
        $sql_parts =[];
        $attributes = [];
        foreach($fields as $k => $v) {
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }

        $sql_part = implode(', ', $sql_parts);

        return  $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
    }

    public function query($statement, $attributes = null , $one = false, $object=true)
    {

        $classname = $object ? str_replace('Table','Entity',get_class($this)) : null;

        if($attributes)
        {
             return $this->db->prepare(
                    $statement,
                    $attributes,
                    $classname,
                    $one
             );
        }
        else
        {
             return $this->db->query(
                    $statement,
                    $classname,
                    $one
             );
        }
    }

    public function extract($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach($records as $v)
        {
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }



}