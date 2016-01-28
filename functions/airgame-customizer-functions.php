<?php

// This pages encapsulates functions that set up Airgame's
// modification of the Customizer screen (Appearance > Customize from the
// WordPress backend sidebar).

// To ensure forward-compatibility with Calypso, Airgame's options are located
// either on the Customizer screen (Appearance > Customize) or on individual
// post/page editors. Airgame has no discrete backend options page.

// Airgame adds numerous sections, and settings within those sections, to the
// Customizer screen. Because each section and setting requires lengthy blocks
// of code to instantiate, each section's instantiation functions have been
// abstracted out from the customize_register function with require_once calls
// to separate php files.

// These files are located within a sibling directory of this file called
// 'customizer-functions'.

/*
*=========== [  Customizer live updating  ]
*/

// Calls to /scripts/theme-customizer.js, which allows realtime asynchronous
// updating of changes made in the Customizer so users can watch them being
// applied. This is set through the 'transport' => 'postMessage' option in the
// add_setting code block within individual custom Customizer section php files.

// Some settings do not use postMessage but remain set to the default 'refresh'
// setting, which refreshes the page. This is generally because the setting is
// linked to a conditional statement which must be rerun with a page refresh
// so the user can observe it updating properly, or because of some other
// error that prevents postMessage from playing nicely with the setting.

// Live updating with postMessage is an optional backend-only user experience
// feature and does not affect the database. If you're experiencing problems
// with live updating on the Customizer screen and you're unable to debug
// /scripts/theme-customizer.js, change 'postMessage' to 'refresh' in
// the Customizer section's php file within the 'customizer-functions'
// directory to switch from data binding to page refresh and fix the issue.

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
  *=============== [  New Customizer Controls  ]
  */

  // Defines custom controls used in the custom Customizer sections.
  // This must be require_once'd before the Customizer sections or they'll
  // probably break or something idk but it won't be good lol so don't do it k

  require_once get_template_directory() . '/functions/customizer-functions/airgame-customizer-custom-controls.php';

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
