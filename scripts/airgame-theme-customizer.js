
////////////////////////////////////////////////////////////////////////////////
//====<><><> [  Asynchronous updating of customizer options  ] <><><>=========//
////////////////////////////////////////////////////////////////////////////////

// These methods update the Customizer preview in realtime with jQuery data
// binding.

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

    wp.customize( 'airgame_footer_email_signup_headline', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_footer_email_signup_headline' ).text( to );
      });
    });

    wp.customize( 'airgame_email_signup_button_text', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_email_signup_button_text' ).text( to );
      });
    });

    wp.customize( 'airgame_contribute_button_text', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_contribute_button_text' ).text( to );
      });
    });

    wp.customize( 'airgame_volunteer_button_text', function( value ) {
      value.bind( function( to ) {
        $( '.airgame_volunteer_button_text' ).text( to );
      });
    });

})( jQuery );
