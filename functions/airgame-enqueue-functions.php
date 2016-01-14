<?php

// This file enqueues (loads) CSS style files and JavaScript script files.
// Load new files here, with the add_scripts function, rather than in HTML.

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Style & script enqueue  ] <><><>=======================//
////////////////////////////////////////////////////////////////////////////////

//This is a core function which allows Wordpress to recognize other CSS and
//JavaScript files.

function add_scripts(){

    // Calls base theme styles. Do not touch! Theme will break!
    wp_enqueue_style(
      'style', get_stylesheet_uri() );

    // Calls base script, app.js
    wp_enqueue_script(
      "airgame-app", // Script short handle
      get_template_directory_uri() . "/scripts/airgame-app.js", // Path
      array("jquery") // Dependent scripts
    );

    // Calls proper styles on front page load only
    if ( is_front_page() ) {
      wp_register_style(
        'airgame-front-page-style', // Stylesheet short handle
        get_template_directory_uri() . '/styles/airgame-front-page-style.css' // Path
      );
      wp_enqueue_style( 'airgame-front-page-style' );
    }

    // Calls proper styles on NGP Form Page load only
    if ( get_post_type() == 'ngp-form-pages' ) {
      wp_register_style(
        'airgame-ngp-form-pages-style', // Stylesheet short handle
        get_template_directory_uri() . '/styles/airgame-ngp-form-pages-style.css' // Path
      );
      wp_enqueue_style( 'airgame-ngp-form-pages-style' );
    }

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
