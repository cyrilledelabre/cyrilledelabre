<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 03/02/15
 * Time: 23:51
 */

namespace App\Modeles\Table;


use Core\Table\Table;

class PageTable extends Table {
    public function byName($name)
    {
        return $this->query(
            "SELECT *
            FROM pages
            WHERE titre = ?", [$name], true);

    }


    public function bySlug($name){

        return $this->query(
            "SELECT *
            FROM pages
            WHERE slug = ?", [$name], true);

    }
}