<?php

// This file contains all customization of the Customizer screen
// (Appearance > Customize).

//--------------------------Table of Contents---------------------------------//

//====<><><> [  1. Customizer async updating  ]
//====<><><> [  2. Customizer custom options  ]
//==== [  2A. Removes Static Front Page  ]
//==== [  2B. Title & Icon (i.e. Site Identity) Section  ]
//==== [  2C. Disclaimers Section  ]
//-- [  2C1. Disclaimers > Disclaimer Setting & Control  ]
//-- [  2C2. Disclaimers > Copyright Setting & Control  ]
//==== [  2D. Email Signup Section  ]
//-- [  2D1. Email Signup > Email Signup Button Call to Action  ]
//-- [  2D2. Email Signup > Email Signup Button Text  ]
//==== [  2E. Contribute & Volunteer Buttons Section  ]
//-- [  2E1. Contribute & Volunteer Buttons > Contribute Button Text Setting & Control  ]
//-- [  2E2. Contribute & Volunteer Buttons > Form Linked to Contribute Button Setting & Control ]
//-- [  2E3. Contribute & Volunteer Buttons > Volunteer Button Text Setting & Control ]
//-- [  2E4. Contribute & Volunteer Buttons > Form Linked to Volunteer Button Setting & Control ]
//==== [  2F. Social Media Links Section  ]
//-- [  2F1. Social Media Links > Facebook Page URL  ]
//-- [  2F2. Social Media Links > Twitter Profile URL  ]
//==== [  2G. CSS to be modified via Customizer  ]
//==== [  2H. Text input sanitizer function  ]

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  1. Customizer async updating  ] <><><>=================//
////////////////////////////////////////////////////////////////////////////////

//Calls to theme-customizer.js, which allows realtime asynchronous updating of
//changes made in the Customizer so users can watch them being applied.

function customizer_live_preview() {

    wp_enqueue_script(
        'airgame-theme-customizer',
        get_template_directory_uri() . '/scripts/airgame-theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        '0.3.0',
        true
    );

}
add_action( 'customize_preview_init', 'customizer_live_preview' );

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  2. Customizer custom options  ] <><><>=================//
////////////////////////////////////////////////////////////////////////////////

//To ensure forward-compatibility with Calypso, Airgame's options are located
//either on the Customizer screen (Appearance > Customize) or on individual
//post / page / custom post type pages.

function register_theme_customizer( $wp_customize ) {

  //=============== [  2A. Removes Static Front Page  ]

  //Airgame forces a static front page. It is not recommended for users to
  //switch to a blog posts front page. This removes that option from the
  //Customizer screen.

  $wp_customize->remove_section( 'static_front_page' );

  //=============== [  2B. Title & Icon (i.e. Site Identity) Section  ]

  //Allows the Site Title to be updated in realtime.
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

  //Removes the Blog Description text field. This theme does not use it.
  $wp_customize->remove_control('blogdescription');

  //=============== [  2C. Disclaimers Section  ]

  $wp_customize->add_section(
    'disclaimers',
    array(
        'title'     => 'Disclaimers',
        'priority'  => 200
    )
  );

  //----------- [  2C1. Disclaimers > Disclaimer Setting & Control  ]

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

  //----------- [  2C2. Disclaimers > Copyright Setting & Control  ]

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

  //=============== [  2D. Email Signup Section  ]

  $wp_customize->add_section(
    'email_signup',
    array(
        'title'     => 'Email Signup',
        'priority'  => 300
    )
  );

  //----------- [  2D1. Email Signup > Email Signup Button Call to Action  ]

  $wp_customize->add_setting(
    'airgame_email_signup_button_call_to_action',
    array(
      'default'            => 'Join the Campaign',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_email_signup_button_call_to_action',
    array(
      'section'  => 'email_signup',
      'label'    => 'Email Signup Call to Action',
      'type'     => 'text'
    )
  );

  //----------- [  2D2. Email Signup > Email Signup Button Text  ]

  $wp_customize->add_setting(
    'airgame_email_signup_button_text',
    array(
      'default'            => 'I\'m In!',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_email_signup_button_text',
    array(
      'section'  => 'email_signup',
      'label'    => 'Email Signup Button Text',
      'type'     => 'text'
    )
  );

  //=============== [  2E. Contribute & Volunteer Buttons Section  ]

  $wp_customize->add_section(
    'contribute_volunteer',
    array(
        'title'     => 'Contribute & Volunteer Buttons',
        'priority'  => 400
    )
  );

  //----------- [  2E1. Contribute & Volunteer Buttons > Contribute Button Text Setting & Control  ]

  $wp_customize->add_setting(
		'airgame_contribute_button_text',
		array(
			'default'            => 'Contribute',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_contribute_button_text',
		array(
			'section'  => 'contribute_volunteer',
			'label'    => 'Contribute Button Text',
			'type'     => 'text'
		)
	);

  //----------- [  2E2. Contribute & Volunteer Buttons > Form Linked to Contribute Button Setting & Control ]

  $wp_customize->add_setting(
    'airgame_contribute_button_form' . $count,
    array(
      'default'           => '',
      'sanitize_callback' => 'absint'
    )
  );

  $wp_customize->add_control(
    'airgame_contribute_button_form' . $count,
    array(
      'label'    => __( 'Form Linked to Contribute Button', 'textdomain' ),
      'section'  => 'contribute_volunteer',
      'type'     => 'dropdown-pages'
    )
  );

  //----------- [  2E3. Contribute & Volunteer Buttons > Volunteer Button Text Setting & Control ]

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
			'section'  => 'contribute_volunteer',
			'label'    => 'Volunteer Button Text',
			'type'     => 'text'
		)
	);

  //----------- [  2E4. Contribute & Volunteer Buttons > Form Linked to Volunteer Button Setting & Control ]

  $wp_customize->add_setting(
    'airgame_volunteer_button_form',
    array(
      'default'           => '',
      'sanitize_callback' => 'absint'
    )
  );

  $wp_customize->add_control(
    'airgame_volunteer_button_form',
    array(
      'label'    => __( 'Form Linked to Volunteer Button', 'textdomain' ),
      'section'  => 'contribute_volunteer',
      'type'     => 'dropdown-pages'
    )
  );

  //=============== [  2F. Social Media Links Section  ]

  $wp_customize->add_section(
    'social_media',
    array(
        'title'     => 'Social Media Links',
        'priority'  => 500
    )
  );

  //----------- [  2F1. Social Media Links > Facebook Page URL  ]

  $wp_customize->add_setting(
		'airgame_facebook_page_url',
		array(
			'default'            => 'http://facebook.com/...',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_facebook_page_url',
		array(
			'section'  => 'social_media',
			'label'    => 'Facebook Page URL',
			'type'     => 'text'
		)
	);

  //----------- [  2F2. Social Media Links > Twitter Profile URL  ]

  $wp_customize->add_setting(
    'airgame_twitter_profile_url',
    array(
      'default'            => 'http://twitter.com/...',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_twitter_profile_url',
    array(
      'section'  => 'social_media',
      'label'    => 'Twitter Profile URL',
      'type'     => 'text'
    )
  );

}
add_action( 'customize_register', 'register_theme_customizer' );


//=============== [  2G. CSS to be modified via Customizer  ]

function customizer_css() {
    ?>
    <style type="text/css">

    </style>
    <?php
}
add_action( 'wp_head', 'customizer_css' );

//=============== [  2H. Text input sanitizer function  ]

//This function prevents the user from inadvertantly running commands against
//their own MySQL database when inputting text in Customizer text fields.

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

?>
