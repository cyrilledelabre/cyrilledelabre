<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 12/03/15
 * Time: 12:36
 */


namespace App\Modeles\Table;
use  Core\Table\Table;


class TypeTable extends Table {


    public function getTypes($table)
    {
        return  $this->query(
            "
            SELECT id_type, types.titre as titre
            FROM {$table}
            LEFT JOIN types ON id_type = types.id
            GROUP BY id_type
            ", null , false, false
        );
    }

    public function getTitre($id)
    {
        return $this->query(
            "
            SELECT titre
            FROM types
            WHERE id = ?", [$id], true);
    }
} 