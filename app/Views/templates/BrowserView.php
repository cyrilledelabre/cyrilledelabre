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

    <link type="text/css" href="<?= $app->getCss('normalize');?>" rel="stylesheet">

    <link type="text/css" href="<?= $app->getCss('isotope/css/style');?>" rel="stylesheet">

    <link type="text/css" href="<?= $app->getCss('least/least.min');?>" rel="stylesheet">
    <link type="text/css" href="<?= $app->getCss('bootswatch.min');?>" rel="stylesheet">
    <link type="text/css" href="<?= $app->getCss('main');?>" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?=$app->getJs('js-plugins/tinymce/tinymce.min');?>"></script>





</head>

<body>
<div class="container">
    <div class="page-header" id="banner">
        <?= $content; ?>
    </div>
</div>

<!-- Js -->

<script type="text/javascript" src="<?= $app->getJs('classie');?>"></script>
<script type="text/javascript" src="<?= $app->getJs('modernizr-2.6.1.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('bootstrap.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/easing/jquery.easing.1.3');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/bxslider/jquery.bxslider');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/isotope/jquery.isotope.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/least/least.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/custom');?>"></script>

<script type="text/javascript" src="<?=$app->getJs('app');?>"></script>

</body>
</html>
