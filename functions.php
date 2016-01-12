<?php

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Style & script enqueue  ] <><><>=======================//
////////////////////////////////////////////////////////////////////////////////

//This is a core function which allows Wordpress to recognize other CSS and
//JavaScript files.

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
//===========<><><> [  Custom meta boxes  ] <><><>============================//
////////////////////////////////////////////////////////////////////////////////

//nothing here yet

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Defaults post structure to postname  ] <><><>==========//
////////////////////////////////////////////////////////////////////////////////

//The perferred URL structure for SEO, sharing, and human-readability is
//definitely /%postname%/, which omits ugly date / author taxonomies. This sets
//the post structure to postname by default. If you're switching to this
//platform on a site with significant inbound traffic to extant links (which is
//not recommended), you may want to override this setting.

function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Kills comments dead  ] <><><>==========================//
////////////////////////////////////////////////////////////////////////////////

//Good riddance. If you want comments, (and you shouldn't, they're bad and have
//no place on a campaign site) then use something like Disqus, which is better
//in every way.

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
//===========<><><> [  Customizer async updating  ] <><><>====================//
////////////////////////////////////////////////////////////////////////////////

//Calls to theme-customizer.js, which allows realtime asynchronous updating of
//changes made in the Customizer so users can watch them being applied.

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
//===========<><><> [  Customizer custom options  ] <><><>====================//
////////////////////////////////////////////////////////////////////////////////

//To ensure forward-compatibility with Calypso, Airgame's options are located
//either on the Customizer screen (Appearance > Customize) or on individual
//post / page / custom post type pages.

function register_theme_customizer( $wp_customize ) {

  //----------- [  Removes Static Front Page  ]

  //Airgame forces a static front page. It is not recommended for users to
  //switch to a blog posts front page. This removes that option from the
  //Customizer screen.

  $wp_customize->remove_section( 'static_front_page' );

  //=============== [  Title & Icon (i.e. Site Identity) Section  ]

  //Allows the Site Title to be updated in realtime.
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

  //Removes the Blog Description text field. This theme does not use it.
  $wp_customize->remove_control('blogdescription');

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

//This function prevents the user from inadvertantly running commands against
//their own MySQL database when inputting text in Customizer text fields.

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Custom Post Types  ] <><><>============================//
////////////////////////////////////////////////////////////////////////////////

//=============== [  Global settings  ]

// Forces Featured Image box on custom post types.
// NGP Form Pages use Featured Images for background photos.
add_theme_support( 'post-thumbnails' );

// Moves all "advanced" metaboxes above the default editor.
add_action('edit_form_after_title', function() {
    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});

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
        'thumbnail',
        )
      );
    register_post_type( 'ngp-form-pages', $args );
}
add_action( 'init', 'ngp_form_pages_init' );

//----------- [  NGP Form Page Meta Boxes  ]

function ngp_data_id_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'NGP Form Page Editor', 'ngp-data-id-textdomain' ), 'ngp_data_id_meta_callback', 'ngp-form-pages' );
}
add_action( 'add_meta_boxes', 'ngp_data_id_custom_meta' );

function ngp_data_id_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
  $ngp_data_id_stored_meta = get_post_meta( $post->ID );
  ?>

  <h3>How to Create an NGP Form Page</h3>
  <p>
    This editor allows you to create donation pages, volunteer signup pages, other types of signup pages, and petition pages in a few simple steps.
  </p>
  <p>
    Step 1: Create a form in NGP and copy its <em>data-id</em>, then paste it into the <em>NGP Form Data-ID</em> box below. Click here for more help on making NGP forms and retrieving the data-id.
  </p>
  <p>
      <label for="meta-text" class="ngp-data-id-row-title"><?php _e( 'NGP Form Data-ID', 'ngp-data-id-textdomain' )?></label>
      <input type="text" name="meta-text" id="meta-text" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $ngp_data_id_stored_meta['meta-text'][0]; ?>" />
  </p>
  <p>
    Step 2: Click the white box above to edit the form page title and the small Edit button below it to edit the form page address.
  </p>
  <p>
    Step 3: Use the large text editor underneath this box to edit the form page text.
  </p>
  <p>
    Step 4: Set a background image for the form page with the Featured Image box on the right. Click here for help with choosing an image that conforms to best practices.
  </p>


  <?php
}

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  Admin Dashboard Cleanup  ] <><><>======================//
////////////////////////////////////////////////////////////////////////////////

// function remove_dashboard_meta() {
//         remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
//         remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
//         remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
// }
// add_action( 'admin_init', 'remove_dashboard_meta' );










//don't type below here, ya dingus
?>
