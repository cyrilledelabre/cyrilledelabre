<?php
$app= App::getInstance();
?>

<!DOCTYPE html>
<html lang="en" class=" demo-7 js csstransitions">
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
<div class="morph-button morph-button-sidebar morph-button-fixed">
    <button type="button"><span class="icon icon-cog">Settings Menu</span></button>
    <div class="morph-content">
        <div>
            <div class="content-style-sidebar">
                <span class="icon icon-close">Close the overlay</span>
                <h2>Settings</h2>
                <ul>
                    <li><a class="icon icon-camera" href="#">Default filters</a></li>
                    <li><a class="icon icon-server" href="#">Storage Use</a></li>
                    <li><a class="icon icon-heart" href="#">Favorites</a></li>
                    <li><a class="icon icon-zoom-in" href="#">Readability</a></li>
                    <li><a class="icon icon-microphone" href="#">Speech</a></li>
                    <li><a class="icon icon-cloud" href="#">Uploads</a></li>
                    <li><a class="icon icon-user" href="#">Profile</a></li>
                    <li><a class="icon icon-briefcase" href="#">Documents</a></li>
                    <li><a class="icon icon-globe" href="#">Global Options</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- morph-button -->


<div id="container" class="container">
        <?= $content; ?>
</div>
<!---->
<!--<footer id="footer" class="panel-footer hidden-print">-->
<!--    <div class="container text-center">-->
<!--        <p class="">All rights reserved || Made by Cyrille Delabre @ 2015 </p>-->
<!--        <p>-->
<!--            <a href="http://wwww.facebook.com/cyrilledelabre">-->
<!--                <i class="fa fa-facebook-official fa-2x"></i>-->
<!--            </a>&nbsp; &nbsp;-->
<!--            <a href="mailto:cyrilledelabre@gmail.com">-->
<!--                <span class="fa fa-2x mceNonEditable"></span>-->
<!--            </a>&nbsp; &nbsp;-->
<!--            <a href="https://www.linkedin.com/profile/view?id=210759293">-->
<!--                <span class="fa fa-2x mceNonEditable"></span>-->
<!--            </a>&nbsp;&nbsp;-->
<!--            <a href="https://github.com/cyrilledelabre">-->
<!--                <span class="fa fa-2x mceNonEditable"></span>-->
<!--            </a>-->
<!---->
<!--        </p>-->
<!--    </div>-->
<!--</footer>-->

<!-- Js -->
<?include('js.php');?>
</body>
</html>
