<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 01/02/15
 * Time: 00:46
 */

namespace Core\HTML\About;




class DefaultAbout extends About{

    public function date($debut, $fin){
        $datetime1 = date_create($debut);
        $datetime2 = date_create($fin);
        $interval = date_diff($datetime1, $datetime2);
        $mois = $interval->m;
        $jours = $interval->d;

        $interval_html = '<small><i>';
        if($mois == 0)
            $interval_html .= $jours.' Jours';
        else
            $interval_html .= $mois.' Mois';

        $interval_html .= '</small></i>';

        $debut = explode("-", $debut);
        $fin = explode("-", $fin);

        if($fin[0] == 0 && $debut[0] == 0)
            return '';
        //one date - year
        if($fin[0] == 0)
            return $debut[0].' :';

        if($debut[0] == 0)
            return $fin[1] .'/'. $fin[0].' :';

        //only one month
        if($debut[1] == $fin[1] && $debut[0] == $fin[0])
            return $debut[1].'/'.$debut[0].'<br>'.$interval_html;

        //more than one month
        if($debut[0] === $fin[0])
            return $debut[1].' au '.$fin[1].' /'.$debut[0].'<br>'.$interval_html;


        // Aujourd'hui
        if($fin[0] > date("Y"))
            $fin[0] = 'Aujourd\'hui';

        return $debut[0].' - '.$fin[0];
    }


}
