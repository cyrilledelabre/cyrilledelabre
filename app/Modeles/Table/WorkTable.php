<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 07/02/15
 * Time: 18:12
 */

namespace App\Modeles\Table;


use Core\Table\Table;

class WorkTable extends Table{

    /*
     * Find a Work and add the category
     *
     *
     *
     */
    public function findWithCategory($id){

        return  $this->query(
            "
            SELECT categories.slug as slug, works.id, works.titre, works.contenu, works.soustitre, works.resume, works.keywords,
             categories.titre as categorie, links.name, links.link, links.image, links.path,types.titre as type, works.id_type, affichage.titre as affichage
            FROM works
            LEFT JOIN types ON works.id_type = types.id
            LEFT JOIN categories ON id_category = categories.id
            LEFT JOIN links ON id_media = links.id
            LEFT JOIN affichage ON id_affichage = affichage.id

            WHERE works.id =?",
            [$id],
            true
        );
    }
    /*
     * Find all Works related to the type and add the category

    Voir si le contenu est indispensable ???
     */

    public function findByType($type)
    {
        return  $this->query(
            "
            SELECT categories.slug as slug, works.id, works.titre, works.contenu, categories.titre as categorie, links.name, links.link, links.image, links.path
            FROM works
            LEFT JOIN categories ON id_category = categories.id
            LEFT JOIN links ON id_media = links.id
            LEFT JOIN types ON works.id_type = types.id
            WHERE types.titre =?
            ORDER BY id DESC
            ",
            [$type]
        );
    }


    public function getTitre($id)
    {
        return $this->query(
            "
            SELECT titre
            FROM works
            WHERE id = ?", [$id], true);
    }

    public function getWorks($table)
    {
        return  $this->query(
            "
            SELECT id_work, works.titre as titre
            FROM {$table}
            LEFT JOIN works ON id_work = works.id
            GROUP BY id_work
            ", null , false, false
        );
    }

    public function allThumb($type, $id)
    {
        return $this->query(
            "
            SELECT works.titre,works.id,links.image,links.path
            FROM works
            LEFT JOIN links ON id_media = links.id
            WHERE works.id_type =? AND works.id <> ?",[$type, $id]
        );
    }





/*
 *
 * Get all the Works with categorie and img links
 */

    public function all(){

        return  $this->query(
            "
            SELECT works.id, works.titre, works.contenu, categories.slug as slug, links.name, links.link, links.image, links.path, categories.titre as categorie, works.id_type
            FROM works
            LEFT JOIN categories ON id_category = categories.id
            LEFT JOIN types ON id_type = types.id
            LEFT JOIN links ON id_media = links.id

            "

        );
    }
}