<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 21:16
 */

namespace App\Modeles\Table;
use  Core\Table\Table;

class CategorieTable extends Table{
    public function getCategoriesByType($type, $from)
    {
        return  $this->query(
            "
            SELECT categories.titre , categories.slug
            FROM {$from}
            LEFT JOIN categories ON id_category = categories.id
            LEFT JOIN types ON  {$from}.id_type = types.id

            WHERE types.titre = ?
            GROUP BY categories.titre
            ",
            [$type]
        );
    }

    public function getCategoriesFrom($value)
    {
        $result =$this->query('
            SELECT id_category as id, categories.titre, categories.slug
            FROM  categories, '.$value.'
            WHERE id_category= categories.id
            GROUP BY id_category
            ', null, false);


        return $result;
    }
}

