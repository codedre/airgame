<?php

// This file enqueues (loads) CSS style files and JavaScript script files.
// Load new files here, with the add_scripts function, rather than in HTML.

/*
*=================[ Style & script enqueue ]====================================
*/

//This is a core function which allows Wordpress to recognize other CSS and
//JavaScript files.

function add_scripts(){

    // Critical theme settings stylesheet. Do not remove or theme will break!
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // Calls base script
    wp_enqueue_script(
      "airgame-app", // Script short handle
      get_template_directory_uri() . "/scripts/airgame-app.js", // Path
      array("jquery") // Dependent scripts
    );

    // Imports Now font from Open Source Font Library CDN
    wp_register_style(
      'airgame-font-now', // Stylesheet short handle
      'https://fontlibrary.org/face/now' // Path
    );
    wp_enqueue_style( 'airgame-font-now' );

    // Imports Droid Serif font from Google CDN
    wp_register_style(
      'airgame-font-droid-serif', // Stylesheet short handle
      '//fonts.googleapis.com/css?family=Droid+Serif' // Path
    );
    wp_enqueue_style( 'airgame-font-droid-serif' );

}
add_action("wp_enqueue_scripts", "add_scripts");

?>
