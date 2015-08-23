<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 30/01/15
 * Time: 15:41
 */

namespace App\Modeles\Entity;

class ArticleEntity extends AppEntity{

    protected $entity = "articles/article";


    public function getExtrait(){
        $html = '<p>'. substr($this->contenu ,0, 100) . '...</p>';
        $html .='<p><a href="'.$this->getUrl() .'"> Voir la suite</a></p>';
        return $html ;
    }
}

