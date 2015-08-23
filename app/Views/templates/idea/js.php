<?php
/**
 * Created by PhpStorm.
 * User: cyrilledelabre
 * Date: 22/03/15
 * Time: 21:44
 */ ?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript" src="<?=$app->getJs('bootstrap.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('cbpFWTabs');?>"></script>
<script type="text/javascript" src="<?= $app->getJs('classie');?>"></script>
<script type="text/javascript" src="<?= $app->getJs('modernizr-2.6.1.min');?>"></script>




<script type="text/javascript" src="<?=$app->getJs('js-plugins/easing/jquery.easing.1.3');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/bxslider/jquery.bxslider');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/isotope/jquery.isotope.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/least/least.min');?>"></script>

<script type="text/javascript" src="<?=$app->getJs('js-plugins/tinymce/tinymce.min');?>"></script>
<script type="text/javascript" src="<?=$app->getJs('js-plugins/custom');?>"></script>

<script type="text/javascript" src="<?=$app->getJs('app');?>"></script>


<script type="text/javascript" src="<?=$app->get('idea/js/modernizr.custom.js');?>"></script>

<script type="text/javascript" src="<?=$app->get('idea/js/classie.js');?>"></script>
<script type="text/javascript" src="<?=$app->get('idea/js/uiMorphingButton_fixed.js');?>"></script>
<script type="text/javascript" src="<?=$app->get('idea/js/uiMorphingButton_inflow.js');?>"></script>

<script>
    (function() {
        var docElem = window.document.documentElement, didScroll, scrollPosition,
            container = document.getElementById( 'container' );

        // trick to prevent scrolling when opening/closing button
        function noScrollFn() {
            window.scrollTo( scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0 );
        }

        function noScroll() {
            window.removeEventListener( 'scroll', scrollHandler );
            window.addEventListener( 'scroll', noScrollFn );
        }

        function scrollFn() {
            window.addEventListener( 'scroll', scrollHandler );
        }

        function canScroll() {
            window.removeEventListener( 'scroll', noScrollFn );
            scrollFn();
        }

        function scrollHandler() {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( function() { scrollPage(); }, 60 );
            }
        };

        function scrollPage() {
            scrollPosition = { x : window.pageXOffset || docElem.scrollLeft, y : window.pageYOffset || docElem.scrollTop };
            didScroll = false;
        };

        scrollFn();

        var el = document.querySelector( '.morph-button' );

        new UIMorphingButton( el, {
            closeEl : '.icon-close',
            onBeforeOpen : function() {
                // don't allow to scroll
                noScroll();
                // push main container
                classie.addClass( container, 'pushed' );
            },
            onAfterOpen : function() {
                // can scroll again
                canScroll();
                // add scroll class to main el
                classie.addClass( el, 'scroll' );
            },
            onBeforeClose : function() {
                // remove scroll class from main el
                classie.removeClass( el, 'scroll' );
                // don't allow to scroll
                noScroll();
                // push back main container
                classie.removeClass( container, 'pushed' );
            },
            onAfterClose : function() {
                // can scroll again
                canScroll();
            }
        } );
    })();
</script>