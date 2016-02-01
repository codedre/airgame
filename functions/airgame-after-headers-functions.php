<?php

/*
*=========== [  PHP files that must run after HTTP headers are sent  ]
*/

// This is an extension of functions.php that contains require_once calls to
// PHP files that must be called after headers have been called via wp_head.
// If requiring a PHP file in functions.php is causing a "headers already
// loaded" error on page load, move that line of code here to fix the error.

//Style functions file
require_once( get_template_directory() . '/functions/airgame-style-functions.php' );
