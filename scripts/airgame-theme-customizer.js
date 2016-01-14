
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

})( jQuery );
