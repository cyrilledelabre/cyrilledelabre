<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 31/01/15
 * Time: 15:37
 */

namespace App\Modeles\Table;
use  \Core\Table\Table;

class AboutTable extends Table {
    protected $name = 'Web Cv';

    /**
     * Recupère les  abouts d'une categorie
     * @return array
     */
    public  function categorie($id){
        return $this->query("
            SELECT abouts.id, abouts.titre, abouts.contenu, abouts.debut, abouts.fin, abouts.lieu,abouts.etablissement,abouts.slug, categories.id as categorie, links.image as image, links.path as path
            FROM abouts
            LEFT JOIN links on abouts.id_media = links.id
            LEFT JOIN categories on id_category = categories.id
            WHERE abouts.id_category =?
            ORDER BY abouts.fin DESC",
            [$id]);
    }


    public function AllByCategories(){

        $array = $this->all();

        $return = array();
        foreach ($array as $object){
            if(isset($return[$object->categorie]))
                array_push($return[$object->categorie], $object);
            else
                $return[$object->categorie] =[$object];
        }


        return $return;
    }




/**
     * Retourne toutes les objets table ordonne par id de categorie
     * @return array(objects)
     */
    public  function all(){
        return $this->query("
            SELECT abouts.id, abouts.titre, abouts.contenu, abouts.debut, abouts.fin, abouts.lieu, abouts.etablissement, abouts.type, abouts.experience, categories.titre as categorie, affichage.titre as affichage, links.image as image, links.link as link, links.path as path
            FROM abouts
            LEFT JOIN links on abouts.id_media = links.id
            LEFT JOIN categories on id_category = categories.id
            LEFT JOIN affichage on id_affichage = affichage.id
            ORDER BY id_category ASC, abouts.fin DESC
            "
          );
    }


    public  function allByCatWithImg(){
        return $this->query("
            SELECT abouts.id, abouts.titre, abouts.contenu, abouts.debut, abouts.fin, abouts.lieu, abouts.etablissement, abouts.slug, abouts.id_media, abouts.type, abouts.experience, categories.titre as categorie, affichage.titre as affichage, links.image as image, links.path as path
            FROM abouts
            LEFT JOIN links on abouts.id_media = links.id
            LEFT JOIN categories on id_category = categories.id
            LEFT JOIN affichage on id_affichage = affichage.id
            ORDER BY categories.id ASC
            "
        );
    }






}
