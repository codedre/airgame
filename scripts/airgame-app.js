
////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Global scripts  ] <><><>===============================//
////////////////////////////////////////////////////////////////////////////////

(function($){
  $(document).ready(function(){


    // Menu background-color change on scroll
    var $scrollingDiv = $(".menu");
    $(window).scroll(function () {
       $scrollingDiv.stop()
       $scrollingDiv.css("background-color", ($(window).scrollTop() >= 50) ? "#073A59" : "");
     });

  })
})(jQuery);
