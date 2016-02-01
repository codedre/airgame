<?php

// This file enqueues (loads) CSS style files and JavaScript script files.
// Load new files here, with the add_scripts function, rather than in HTML.

/*
*=================[ Style & script enqueue ]====================================
*/

// This is a core function which allows Wordpress to recognize other CSS and
// JavaScript files.

function add_scripts(){

    // Critical theme settings stylesheet. Do not remove or theme will break!
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // Calls base script
    wp_enqueue_script(
      "airgame-app", // Script short handle
      get_template_directory_uri() . "/scripts/airgame-app.js", // Path
      array("jquery") // Dependent scripts
    );

    $selectedFonts = get_theme_mod( 'airgame_fonts' );

    // Enqueues Bold Fontpack fonts
    if ( $selectedFonts === 'bold' ) {
      require_once get_template_directory() . '/functions/font-enqueue-functions/enqueue-bold.php';
    }

    // Enqueues Solutions Fontpack fonts
    if ( $selectedFonts === 'solutions' ) {
      require_once get_template_directory() . '/functions/font-enqueue-functions/enqueue-solutions.php';
    }

    // Enqueues Solutions Fontpack fonts
    if ( $selectedFonts === 'whistlestop' ) {
      require_once get_template_directory() . '/functions/font-enqueue-functions/enqueue-whistlestop.php';
    }

}
add_action("wp_enqueue_scripts", "add_scripts");
