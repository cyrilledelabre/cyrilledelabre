$(document).ready(function() {
    if ($('#email').length) {
        var parts = ["cyrilledelabre", "gmail", "com", "&#46;", "&#64;"];
        var email = parts[0] + parts[4] + parts[1] + parts[3] + parts[2];
        document.getElementById("email").innerHTML = email;
    }




});

$(window).load(function() {
    if ($('.isotopeTable').length) {

        // init Isotope
        var $container = $('.isotopeTable');

        $container.isotope({
            itemSelector: '.isotope',
            layoutMode: 'vertical',
            masonry: {
                columnWidth: 200
            }
        });

        $('#filter a').click(function () {
            $('#filter a').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector
            });
            return false;
        });
        $container.show();
        $container.fadeIn();
    }

    if ($('.isotopeWrapper').length) {

        var $container = $('.isotopeWrapper');
        $container.fadeIn();
        $container.show();

        var $resize = $('.isotopeWrapper').attr('id');
        // initialize isotope

        $container.isotope({
            itemSelector: '.isotopeItem',
            resizable: false, // disable normal resizing
            masonry: {
                columnWidth: $container.parent().width() / $resize
            }
        });

        $('#filter a').click(function () {
            $('#filter a').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector
            });
            return false;
        });

        $container.delegate('.masoneryBloc .imgWrapper', 'click', function () {

            var $this = $(this);

            if ($this.parent().hasClass('span4')) {

                $('.masoneryBloc').addClass('span4');
                $('.masoneryBloc').removeClass('span8');

                $this.parent().removeClass('span4');
                $this.parent().addClass('span8');
                $this.parent().find('.media-hover').css('display', 'none');

                if ($('.hiddenInfos').length) {

                    $('.masoneryBloc').find('.mask>i').attr('class', 'icon-plus');
                    $this.find('.mask>i').attr('class', 'icon-minus');
                    $('.hiddenInfos').css('display', 'none');
                    $this.parent().children('.hiddenInfos').css('display', 'block');

                }

            } else {

                $this.parent().addClass('span4');
                $this.parent().removeClass('span8');
                $this.parent().find('.media-hover').css('display', 'none');
                $this.find('.mask>i').attr('class', 'icon-plus');

                if ($('.hiddenInfos').length) {

                    $('.hiddenInfos').css('display', 'none');

                }

            }

            $container.size('100px');
            $container.isotope('reLayout');
            return false;
        });

    }

    if (('.bxslider').length) {
        $('.bxslider').parent().fadeIn();
        $('.bxslider').parent().show();
        $('.bxslider').bxSlider({
            minSlides: 1,
            maxSlides: 6,
            slideWidth: 150,
            slideMargin: 10
        });
    }


    if (('.tabs-style-iconfall').length) {
        (function() {

            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });

        })();
    }

    if (('.least-gallery').length) {
        $('.least-gallery').least();
    }

    if (('textarea#wysiwyg').length) {
        tinymce.init({
            selector: "textarea#wysiwyg",
            theme: "modern",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor fontawesome noneditable"
            ],
            extended_valid_elements: 'span[class]',
            content_css: "//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor fontawesome",
            relative_urls: false,
            file_browser_callback: fileBrowser
        });
    }

});

function fileBrowser(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: '../links/addorchoose',
        title: 'Gallery',
        width: 800,
        height: 600,
        resizable: 'yes',
        inline: 'yes',
        close_previous: 'no'
    }, {
        window: win,
        input: field_name
    });
    return false;
}



