/* custom js */
var REPTILEHAUS = {}


REPTILEHAUS.slickSlide = (function($) {
    "use strict";
    return function() {

        $('.c-slider').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            speed: 800,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
        });
    };

}(jQuery));




REPTILEHAUS.initializeMenu = (function($) {
    "use strict";
    return function() {


    };
}(jQuery));


REPTILEHAUS.initializePlugins = (function($) {
    "use strict";
    return function() {


    };
}(jQuery));


REPTILEHAUS.initSlickRatio = (function($) {
    "use strict";
    return function() {

        window.setGalleryHeight = function setGalleryHeight() {
            var getRation = $(".c-ratio").outerHeight();
            $(".c-slider .c-slider__item").css({
                'height': getRation
            });
        }
        $(window).on('resize', function(e) {
            window.setGalleryHeight();
        });
        $(window).on('load', function(e) {
            $(window).trigger('resize');
        });

    };
}(jQuery));

REPTILEHAUS.demoPlugins = (function($) {
    "use strict";
    return function() {

        $('a.open-popup').fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            closeBtn: false,
            helpers: {
                media: {},
                // overlay: {
                //     css: { 'background-color': 'rgba(0,0,0,0.8)' }
                // },
            }
        });


        $(".fancybox").fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            'nextEffect': 'fade',
            'prevEffect': 'fade',
            helpers: {
                media: {},
                // overlay: {
                //     css: { 'background-color': 'rgba(0,0,0,0.8)' }
                // },
            }
        });


        
        var mixer = mixitup("#mix");
        
       $("ul#mix-category > li > a").on("click", function(e) {
            e.preventDefault()
        })



        var n = document.querySelector(".c-masonry");
        if (document.contains(n)) {
            new Masonry(n, {
                columnWidth: ".c-masonry__grid-item",
                itemSelector: ".c-masonry__grid-item",
            })
        }


    };
}(jQuery));




(function($) {
    "use strict";

    // REPTILEHAUS.consoleEncore();

    REPTILEHAUS.initSlickRatio();

    REPTILEHAUS.slickSlide();

    REPTILEHAUS.demoPlugins();

    REPTILEHAUS.initializeMenu();

    $(document).on('click', '[data-lightbox]', lity);

    $(document).ready(function() {


        var ppp = 3; // Post per page
        var cat = 8;
        var pageNumber = 1;

        function load_posts() {
            pageNumber++;
            var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
            $.ajax({
                type: "POST",
                dataType: "html",
                url: ajax_posts.ajaxurl,
                data: str,
                success: function(data) {
                    var $data = $(data);
                    $(".o-loading").removeClass('c-active');
                    if ($data.length) {
                        $("#ajax-posts").append($data);
                        $("#more_posts").attr("disabled", false);
                    } else {
                        $("#more_posts").addClass("o-noresults");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $(".o-loading").removeClass('c-active');
                    $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }

            });
            return false;
        }

        $("#more_posts").on("click", function() { // When btn is pressed.
            $("#more_posts").attr("disabled", true); // Disable the button, temp.
            $(".o-loading").addClass('c-active');
            setTimeout(function() {
                load_posts();
            }, 1000);
        });

        $(".generate-articles").on('click', function(e) {
            e.preventDefault();
        });


        //  The second way to initialize:
        $('[data-remodal-id=modal]').remodal({
            modifier: 'with-red-theme'
        });

    });






})(jQuery);