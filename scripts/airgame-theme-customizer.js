
////////////////////////////////////////////////////////////////////////////////
//====<><><> [  Asynchronous updating of disclaimer & copyright  ] <><><>=====//
////////////////////////////////////////////////////////////////////////////////

(function( $ ) {
    "use strict";

    wp.customize( 'airgame_disclaimer', function( value ) {

  		value.bind( function( to ) {
  			$( '.airgame-disclaimer' ).text( to );
  		});
  	});

    wp.customize( 'airgame_copyright', function( value ) {
      value.bind( function( to ) {
        $( '.airgame-copyright' ).text( to );
      });
    });

    wp.customize( 'airgame_front_page_headline', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_front_page_headline' ).text( to );
      });
    });

    wp.customize( 'airgame_front_page_subheadline', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_front_page_subheadline' ).text( to );
      });
    });

})( jQuery );
