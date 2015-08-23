<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 29/01/15
 * Time: 18:15
 */

namespace App\Modeles\Table;
use  \Core\Table\Table;
class ArticleTable extends Table {
    //protected  $table = 'article';


    /*
     * BDD Articles
     * id
     * titre
     * contenu
     * date
     * categorie
     * */


    /**
     * Recupère les derniers articles en liant la categorie associée
     * @return array
     */
    public  function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories on id_category = categories.id
            ORDER BY articles.date DESC
            ");
    }


    /**
     * Recupère les derniers articles de la categorie_id
     * @return array
     * @param $categorie_id id categorie
     */
    public  function lastByCategorie($categorie_id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories on id_category = categories.id
            WHERE articles.id_category = ?
            ORDER BY articles.date DESC",
            [$categorie_id]
            );
    }




/**
 * Recupere l'article $id en liant la categorie associée
 * @param $id
 * @return \App\Entity\PostEntity
 */
    public function findWithCategory($id){

        return  $this->query(
            "
            SELECT articles.id, articles.date, articles.titre, articles.contenu, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON id_category = categories.id
            WHERE articles.id =?",
            [$id],
            true
        );
    }


    public function getArticleByName($name)
    {
        return $this->query(
        "
        SELECT id, titre, contenu
        FROM articles
        WHERE titre = ? ", [$name], true);
    }


}