<?php

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Include abstracted PHP function files  ] <><><>========//
////////////////////////////////////////////////////////////////////////////////

// Enqueueing of CSS and JavaScript
require_once( get_template_directory() . '/functions/airgame-enqueue-functions.php' );

// Customizer ( Appearance > Customize ) custom options
require_once( get_template_directory() . '/functions/airgame-customizer-functions.php' );

// Overrides for WordPress default backend settings and styles
require_once( get_template_directory() . '/functions/airgame-wordpress-override-functions.php' );

// Custom post types setup
require_once( get_template_directory() . '/functions/airgame-custom-post-types-functions.php' );

//Menu initialization
require_once( get_template_directory() . '/functions/airgame-menu-functions.php' );

//Font loading
require_once( get_template_directory() . '/functions/airgame-font-functions.php' );

?>
