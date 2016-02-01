
// This file contains global JavaScript that fires on most or all pages.

//
//==============[  Top menu jQuery background color fill on scroll  ]===========
//

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

    // Initialized Unslider social feed slider
    $('.social-feed-slider').unslider({
      autoplay: true,
      speed: '500',
      delay: '5000',
      animateHeight: true,
      fluid: true
    });

  })
})(jQuery);
