<?php

/*
*=========== [  Customizer async updating  ]
*/

// Calls to theme-customizer.js, which allows realtime asynchronous updating of
// changes made in the Customizer so users can watch them being applied.

function customizer_live_preview() {

    wp_enqueue_script(
        'airgame-theme-customizer',
        get_template_directory_uri() . '/scripts/airgame-theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.3.0',
        true
    );

}
add_action( 'customize_preview_init', 'customizer_live_preview' );

/*
*=========== [  Customizer custom options  ]
*/

// To ensure forward-compatibility with Calypso, Airgame's options are located
// either on the Customizer screen (Appearance > Customize) or on individual
// post / page / custom post type pages. Airgame has no discrete backend
// options page.

function airgame_customize_register( $wp_customize ) {

  if ( ! isset( $wp_customize ) ) {
		return;
	}

/*
*=============== [  Removes Static Front Page  ]
*/

//Airgame forces a static front page. It is not recommended for users to
//switch to a blog posts front page. This removes that option from the
//Customizer screen.

$wp_customize->remove_section( 'static_front_page' );

/*
*=============== [  Title & Icon (i.e. Site Identity) Section  ]
*/

//Allows the Site Title to be updated in realtime.
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

//Removes the Blog Description text field. This theme does not use it.
$wp_customize->remove_control('blogdescription');

/*
*=============== [  New Customizer Sections  ]
*/

// Adds new Customizer sections. Each section is abstracted to its own php
// file in /customizer-functions/, which includes settings & controls for
// that section.

// Disclaimers Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-disclaimers.php';

// Email Signup Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-email-signup.php';

// Contribute & Volunteer Buttons Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-contribute-volunteer.php';

// Social Media Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-social-media.php';

// Headlines Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-headlines.php';

// Images Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-images.php';

}
add_action( 'customize_register', 'airgame_customize_register' );

/*
*=============== [  CSS to be modified via Customizer  ]
*/

// This allows for custom CSS to be directly applied via the Customizer.

function customizer_css() {
  ?>
  <style type="text/css">

    /* Nothing for now. */

  </style>
  <?php
}
add_action( 'wp_head', 'customizer_css' );

/*
*=============== [  Text input sanitizer function  ]
*/

// This function prevents the user from inadvertently (or intentionally) running
// SQL injection commands against their own MySQL database when inputting text
// in Customizer text fields.

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

?>
