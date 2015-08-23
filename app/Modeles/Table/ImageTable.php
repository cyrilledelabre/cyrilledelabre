<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 16/03/15
 * Time: 19:59
 */

namespace App\Modeles\Table;
use  Core\Table\Table;

class ImageTable extends Table
{

    public function all()
    {
        return $this->query("
            SELECT images.id, images.titre, types.titre as type, images.contenu, images.id_type, images.image, images.path, works.titre as work , id_work
            FROM images
            LEFT JOIN types ON images.id_type = types.id
            LEFT JOIN works ON images.id_work = works.id
"
        );
    }

    public function findImages($id)
    {
        return $this->query("
            SELECT *
            FROM images
             WHERE id_work =?", [$id]
        );
    }

}