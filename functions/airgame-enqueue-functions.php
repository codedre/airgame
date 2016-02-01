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

    // Grabs font pack choice user sets in Customizer
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

    // Unslider stylesheets
    wp_enqueue_style( 'unslider-min', get_template_directory_uri() . '/functions/social-feed-functions/unslider/unslider.css' );
    wp_enqueue_style( 'unslider-dots', get_template_directory_uri() . '/functions/social-feed-functions/unslider/unslider-dots.css' );

    // Velocity script for speedier (Un)sliding
    wp_enqueue_script(
      'velocity-min', // Script short handle
      '//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js', // Path
      array('jquery') // Dependent scripts
    );

    // jQuery swipe support for Unslider
    wp_enqueue_script(
      'jquery-event-move', // Script short handle
      '//stephband.info/jquery.event.move/js/jquery.event.move.js', // Path
      array('jquery') // Dependent scripts
    );
    wp_enqueue_script(
      'jquery-event-swipe', // Script short handle
      '//stephband.info/jquery.event.swipe/js/jquery.event.swipe.js', // Path
      array('jquery') // Dependent scripts
    );

    // Unslider script
    wp_enqueue_script(
      'unslider-min', // Script short handle
      get_template_directory_uri() . '/functions/social-feed-functions/unslider/unslider-min.js', // Path
      array('jquery') // Dependent scripts
    );

    // Calls base app script
    wp_enqueue_script(
      'airgame-app', // Script short handle
      get_template_directory_uri() . '/scripts/airgame-app.js', // Path
      array('jquery') // Dependent scripts
    );

}
add_action('wp_enqueue_scripts', 'add_scripts');
