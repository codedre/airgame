
////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Global scripts  ] <><><>===============================//
////////////////////////////////////////////////////////////////////////////////

(function($){
  $(document).ready(function() {

    // Caches an object with the header element
    var header = $(".menu");

    // Listens to scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        // Adds and removes classes
        if (scroll >= 50) {
            header.removeClass('menu-switch-top').addClass('menu-switch-scroll');
        }
        else {
            header.removeClass('menu-switch-scroll').addClass('menu-switch-top');
        }

    });
  })
})(jQuery);
