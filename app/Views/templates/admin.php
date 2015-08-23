<?php
$app= App::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $app->title; ?></title>

    <? include('css.php') ?>



</head>

<body>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= $app->home() ;?>">Cyrille Delabre</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li><a href="<?=ABSROOT?>public/pages/about">À propos</a></li>
                <li><a href="<?=ABSROOT?>public/pages/cv">Web Cv</a></li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Portfolio <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="themes">
                        <li><a href="<?=ABSROOT?>public/pages/works">Tous</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=ABSROOT?>public/works/graphisme">Graphisme</a></li>
                        <li><a href="<?=ABSROOT?>public/works/art">Art</a></li>
                        <li><a href="<?=ABSROOT?>public/works/info">Informatique</a></li>
                    </ul>
                </li>
                <li><a href="<?=ABSROOT?>public/pages/blog">Blog</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="<?=ABSROOT?>public/admin/index">Connecté</a></li>
            </ul>

        </div>
    </div>
</nav>


<div class="container">
    <div class="page-header" id="banner">
        <?= $content; ?>
    </div>
</div>

<footer id="footer" class="panel-footer hidden-print">
    <div class="container text-center">
        <p class="">All rights reserved || Made by Cyrille Delabre @ 2015</p>

            <a href="http://wwww.facebook.com/cyrilledelabre">
                <i class="fa fa-facebook-official fa-2x"></i>
            </a>&nbsp; &nbsp;
            <a href="mailto:cyrilledelabre@gmail.com">
                <span class="fa fa-2x mceNonEditable"></span>
            </a>&nbsp; &nbsp;
            <a href="https://www.linkedin.com/profile/view?id=210759293">
                <span class="fa fa-2x mceNonEditable"></span>
            </a>&nbsp;&nbsp;
            <a href="https://github.com/cyrilledelabre">
            <span class="fa fa-2x mceNonEditable"></span>
            </a>

        </p>
    </div>
</footer>

<!-- Js -->
<? include('js.php');?>

</body>
</html>
