<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 19:57
 */

namespace App\Modeles\Table;
use  Core\Table\Table;


class LinkTable extends Table{
    public function getImage($media){
        return $this->query("
            SELECT *
            FROM links
            WHERE links.name =?",[$media], true
        );
    }


    public function all()
    {
        return $this->query("
            SELECT links.id, links.name, types.titre as type, links.link, links.image, links.path, links.id_type
            FROM links
            LEFT JOIN types ON links.id_type = types.id"
        );
    }

    public function extractByType($key, $value, $type)
    {
        $records = $this->allByType($type);
        $return = [];
        foreach($records as $v)
        {
            $return[$v->$key] = $v->$value;
        }
        return $return;

    }

/*
 * Get all By the type given in param
 * */
    public function allByType($type)
    {
        return $this->query("
            SELECT links.id, links.name, types.titre as type, links.path
            FROM links
            LEFT JOIN types ON links.id_type = types.id
            WHERE types.titre =?",[$type]
        );
    }
}