<?php

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Style & script enqueue  ] <><><>=======================//
////////////////////////////////////////////////////////////////////////////////

function add_scripts(){
    wp_enqueue_style("styles", get_stylesheet_uri());
    wp_enqueue_script(
      "app",
      get_template_directory_uri() . "/js/app.js",
      array("jquery")
    );
}
add_action("wp_enqueue_scripts", "add_scripts");

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Post structure > postname  ] <><><>====================//
////////////////////////////////////////////////////////////////////////////////

function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Kills comments dead. Good riddance.  ] <><><>==========//
////////////////////////////////////////////////////////////////////////////////

add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Customizer Async Updating  ] <><><>====================//
////////////////////////////////////////////////////////////////////////////////

function customizer_live_preview() {

    wp_enqueue_script(
        'theme-customizer',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.3.0',
        true
    );

}
add_action( 'customize_preview_init', 'customizer_live_preview' );

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Customizer Custom Options  ] <><><>====================//
////////////////////////////////////////////////////////////////////////////////

function register_theme_customizer( $wp_customize ) {

  //=============== [  Disclaimers Section  ]

  $wp_customize->add_section(
    'disclaimers',
    array(
        'title'     => 'Disclaimers',
        'priority'  => 200
    )
  );

  //----------- [  Disclaimers > Disclaimer Setting & Control  ]

  $wp_customize->add_setting(
		'airgame_disclaimer',
		array(
			'default'            => 'Paid for by...',
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

  //----------- [  Disclaimers > Copyright Setting & Control  ]

  $wp_customize->add_setting(
    'airgame_copyright',
    array(
      'default'            => 'Copyright 2016...',
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

  //=============== [  Email Signup Section  ]

  $wp_customize->add_section(
    'email_signup',
    array(
        'title'     => 'Email Signup',
        'priority'  => 300
    )
  );

  //=============== [  Donate Button Section  ]

  $wp_customize->add_section(
    'donate_button',
    array(
        'title'     => 'Donate Button',
        'priority'  => 400
    )
  );

  //----------- [  Donate Button > Donate Button Text Setting & Control  ]

  $wp_customize->add_setting(
		'airgame_donate_button_text',
		array(
			'default'            => 'Donate',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_donate_button_text',
		array(
			'section'  => 'donate_button',
			'label'    => 'Donate Button Text',
			'type'     => 'text'
		)
	);

  //=============== [  Volunteer Button Section  ]

  $wp_customize->add_section(
    'volunteer_button',
    array(
        'title'     => 'Volunteer Button',
        'priority'  => 500
    )
  );

  //----------- [  Volunteer Button > Volunteer Button Text Setting & Control ]

  $wp_customize->add_setting(
		'airgame_volunteer_button_text',
		array(
			'default'            => 'Volunteer',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_volunteer_button_text',
		array(
			'section'  => 'volunteer_button',
			'label'    => 'Volunteer Button Text',
			'type'     => 'text'
		)
	);

}
add_action( 'customize_register', 'register_theme_customizer' );


//=============== [  CSS to be modified via Customizer  ]

function customizer_css() {
    ?>
    <style type="text/css">

    </style>
    <?php
}
add_action( 'wp_head', 'customizer_css' );

//=============== [  Text input sanitizer function  ]

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Custom Post Types  ] <><><>============================//
////////////////////////////////////////////////////////////////////////////////

//=============== [  NGP Form Page  ]

function ngp_form_pages_init() {
    $args = array(
      'label' => 'NGP Form Pages',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'forms'),
        'query_var' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',)
        );
    register_post_type( 'ngp-form-pages', $args );
}
add_action( 'init', 'ngp_form_pages_init' );

//----------- [  NGP Form Page Meta Boxes  ]

function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Meta Box Title', 'prfx-textdomain' ), 'prfx_meta_callback', 'post' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );

function prfx_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
  $prfx_stored_meta = get_post_meta( $post->ID );
  ?>

  <p>
      <label for="meta-text" class="prfx-row-title"><?php _e( 'Example Text Input', 'prfx-textdomain' )?></label>
      <input type="text" name="meta-text" id="meta-text" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text'][0]; ?>" />
  </p>

  <?php
}

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Admin Dashboard Cleanup  ] <><><>======================//
////////////////////////////////////////////////////////////////////////////////

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );










//don't type below here, ya dingus
?>
