<?php

// This pages encapsulates functions that set up Airgame's
// modification of the Customizer page (Appearance > Customize from the
// WordPress backend sidebar).

// To ensure forward-compatibility with Calypso, Airgame's options are located
// either on the Customizer screen (Appearance > Customize) or on individual
// post/page editing pages. Airgame has no discrete backend options page.

// Airgame adds numerous sections, and settings within those sections, to the
// Customizer screen. Because each section and setting requires lengthy blocks
// of code to instantiate, each section's instantiation functions have been
// abstracted out from the customize_register function towards the end of this
// document with require_once calls to separate individual php files.

// These files are located within a sibling directory of this file called
// 'customizer-functions'.

/*
*=========== [  Customizer live updating  ]
*/

// Calls to theme-customizer.js, which allows realtime asynchronous updating of
// changes made in the Customizer so users can watch them being applied,
// through the 'transport' => 'postMessage' option in add_setting.

// Some settings do not use postMessage but remain set to the default 'refresh'
// setting, which refreshes the page. This is generally because the setting is
// linked to a conditional statement which must be rerun with a page refresh
// so the user can observe it updating properly.

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

function airgame_customize_register( $wp_customize ) {

  if ( ! isset( $wp_customize ) ) {
		return;
	}

/*
*=============== [  Removes Static Front Page  ]
*/

// Airgame forces a static front page. It is not recommended for users to
// switch to a blog posts front page. This removes that option from the
// Customizer screen.

$wp_customize->remove_section( 'static_front_page' );

/*
*=============== [  Title & Icon (i.e. Site Identity) Section  ]
*/

// Allows the Site Title to be updated in realtime.
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

// Removes the Blog Description text field. This theme does not use it.
$wp_customize->remove_control('blogdescription');

/*
*=============== [  New Customizer Sections  ]
*/

// Adds new Customizer sections. Each section is abstracted to its own php
// file in /customizer-functions/, which includes settings & controls for
// that section.

// Headlines & Disclaimers Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-headlines-disclaimers.php';

// Email Signup Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-email-signup.php';

// Contribute & Volunteer Buttons Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-contribute-volunteer.php';

// Social Media Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-social-media.php';

// Images Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-images.php';

// Airgame Style Section
require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-airgame-style.php';

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
