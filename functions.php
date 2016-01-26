<?php

/*
* =========== [  Include abstracted PHP function files  ]
*/

// Enqueueing of CSS and JavaScript
require_once get_template_directory() . '/functions/airgame-enqueue-functions.php';

// Overrides for WordPress default backend settings and styles
require_once get_template_directory() . '/functions/airgame-wordpress-override-functions.php';

// Custom post types setup
require_once get_template_directory() . '/functions/airgame-custom-post-types-functions.php';

// Custom input types setup
// NOTE: This must come before Customizer custom options or the Customizer will break
require_once get_template_directory() . '/functions/airgame-custom-input-types-functions.php';

// Customizer ( Appearance > Customize ) custom options
require_once get_template_directory() . '/functions/airgame-customizer-functions.php';

//Menu initialization
require_once get_template_directory() . '/functions/airgame-menu-functions.php';

// IMPORTANT NOTE: Functions that interfere with HTTP headers must be called after wp_head.
// These have been abstracted out to /functions/airgame-after-headers-functions.php and are
// called one line after wp_head in header.php.

?>
