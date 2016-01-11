<?php

//===========<><><> [  Style & script enqueue  ] <><><>=============//

function add_scripts(){
    wp_enqueue_style("styles", get_stylesheet_uri());
    wp_enqueue_script(
      "app",
      get_template_directory_uri() . "/js/app.js",
      array("jquery")
    );
}
add_action("wp_enqueue_scripts", "add_scripts");

//===========<><><> [  Post structure > postname  ] <><><>=============//

function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

//===========<><><> [  Customizer Async Updating  ] <><><>=============//

function tcx_customizer_live_preview() {

    wp_enqueue_script(
        'tcx-theme-customizer',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.3.0',
        true
    );

}
add_action( 'customize_preview_init', 'tcx_customizer_live_preview' );

//===========<><><> [  Customizer Custom Options  ] <><><>=============//

function tcx_register_theme_customizer( $wp_customize ) {

  //=============== [  Disclaimers Section  ]

  $wp_customize->add_section(
    'disclaimers',
    array(
        'title'     => 'Disclaimers',
        'priority'  => 200
    )
  );

  //----------- [  Disclaimer Setting & Control  ]

  $wp_customize->add_setting(
		'airgame_disclaimer',
		array(
			'default'            => 'Paid for by Cheryl Anderson for Congress',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_disclaimer',
		array(
			'section'  => 'disclaimers',
			'label'    => 'Boxed Disclaimer',
			'type'     => 'text'
		)
	);

  //----------- [  Copyright Setting & Control  ]

  $wp_customize->add_setting(
    'airgame_copyright',
    array(
      // 'default'            => 'Copyright 2016 Cheryl Anderson for Congress. All Rights Reserved.',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_copyright',
    array(
      'section'  => 'disclaimers',
      'label'    => 'Copyright',
      'type'     => 'text'
    )
  );

}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

function tcx_customizer_css() {
    ?>
    <style type="text/css">

    </style>
    <?php
}
add_action( 'wp_head', 'tcx_customizer_css' );

//===========<><><> [  Customizer Input Sanitizer  ] <><><>=============//

/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    tcx
 * @since      0.5.0
 * @version    1.0.0
 */
function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}





//don't type below here, ya dingus
?>
