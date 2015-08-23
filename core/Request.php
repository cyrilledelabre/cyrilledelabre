<?php

namespace Core;

class Request
{
    public $page; // URL appelée par user
    public $type; // URL appelée par user
    public $id;

    function __construct()
    {
        if (isset($_GET['p'])) {
            $this->page = $_GET['p'];
        } else {
            $this->page = 'pages.about';
        }



    }
}

?>