
//===========<><><> [  JavaScript  ] <><><>=============//

(function($){
  $(document).ready(function(){


    // Menu background-color change on scroll
    var $scrollingDiv = $(".menu");
    $(window).scroll(function () {
       $scrollingDiv.stop()
       $scrollingDiv.css("background-color", (($(window).scrollTop() / $(document).height()) > 0.15) ? "#073A59" : "");
     });

  })
})(jQuery);
