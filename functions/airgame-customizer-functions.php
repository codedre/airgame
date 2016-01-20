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
//==== [  2F. Social Media Section  ]
//-- [  2F1. Social Media > Facebook Page URL  ]
//-- [  2F2. Social Media > Facebook App ID  ]
//-- [  2F3. Social Media > Facebook App Secret  ]
//-- [  2F4. Social Media > Twitter Profile URL  ]
//-- [  2F5. Social Media > Twitter Consumer Key  ]
//-- [  2F6. Social Media > Twitter Consumer Secret  ]
//-- [  2F7. Social Media > Twitter Access Token  ]
//-- [  2F8. Social Media > Twitter Access Token Secret  ]
//==== [  2E. Headlines  ]
//-- [  2E1. Headlines > Front Page Headline  ]
//-- [  2E2. Headlines > Front Page Subheadline  ]
//-- [  2E3. Headlines > Footer Email Signup Headline  ]
//==== [  2G. CSS to be modified via Customizer  ]
//==== [  2H. Text input sanitizer function  ]

////////////////////////////////////////////////////////////////////////////////
//===========<><><> [  1. Customizer async updating  ] <><><>=================//
////////////////////////////////////////////////////////////////////////////////

// Calls to theme-customizer.js, which allows realtime asynchronous updating of
// changes made in the Customizer so users can watch them being applied.

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

// To ensure forward-compatibility with Calypso, Airgame's options are located
// either on the Customizer screen (Appearance > Customize) or on individual
// post / page / custom post type pages. Airgame has no discrete backend
// options page.

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
      'default'            => '',
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
      'default'            => '',
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
      'default'            => '',
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
      'default'            => '',
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
      'default'            => '',
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
      'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
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
      'default'            => '',
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
      'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
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

  //=============== [  2F. Social Media Section  ]

  $wp_customize->add_section(
    'social_media',
    array(
        'title'     => 'Social Media',
        'priority'  => 500
    )
  );

  //----------- [  2F1. Social Media > Facebook Page URL  ]

  $wp_customize->add_setting(
		'airgame_facebook_page_url',
		array(
			'default'            => '',
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

  //----------- [  2F2. Social Media > Facebook App ID  ]

  $wp_customize->add_setting(
		'airgame_facebook_app_id',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_facebook_app_id',
		array(
			'section'  => 'social_media',
			'label'    => 'Facebook App ID',
			'type'     => 'text'
		)
	);

  //----------- [  2F3. Social Media > Facebook App Secret  ]

  $wp_customize->add_setting(
		'airgame_facebook_app_secret',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_facebook_app_secret',
		array(
			'section'  => 'social_media',
			'label'    => 'Facebook App Secret',
			'type'     => 'text'
		)
	);

  //----------- [  2F4. Social Media > Twitter Profile URL  ]

  $wp_customize->add_setting(
    'airgame_twitter_profile_url',
    array(
      'default'            => '',
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

  //----------- [  2F5. Social Media > Twitter Consumer Key  ]

  $wp_customize->add_setting(
		'airgame_twitter_consumer_key',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_twitter_consumer_key',
		array(
			'section'  => 'social_media',
			'label'    => 'Twitter Consumer Key',
			'type'     => 'text'
		)
	);

  //----------- [  2F6. Social Media > Twitter Consumer Secret ]

  $wp_customize->add_setting(
		'airgame_twitter_consumer_secret',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_twitter_consumer_secret',
		array(
			'section'  => 'social_media',
			'label'    => 'Twitter Consumer Secret',
			'type'     => 'text'
		)
	);

  //----------- [  2F7. Social Media > Twitter Access Token  ]

  $wp_customize->add_setting(
		'airgame_twitter_access_token',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_twitter_access_token',
		array(
			'section'  => 'social_media',
			'label'    => 'Twitter Access Token',
			'type'     => 'text'
		)
	);

  //----------- [  2F8. Social Media > Twitter Access Token Secret  ]

  $wp_customize->add_setting(
		'airgame_twitter_access_token_secret',
		array(
			'default'            => '',
			'sanitize_callback'  => 'airgame_sanitize',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'airgame_twitter_access_token_secret',
		array(
			'section'  => 'social_media',
			'label'    => 'Twitter Access Token Secret',
			'type'     => 'text'
		)
	);

  //=============== [  2E. Headlines  ]

  $wp_customize->add_section(
    'headlines',
    array(
        'title'     => 'Headlines',
        'priority'  => 600
    )
  );

  //----------- [  2E1. Headlines > Front Page Headline  ]

  $wp_customize->add_setting(
    'airgame_front_page_headline',
    array(
      'default'            => 'Common sense solutions for our community',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_front_page_headline',
    array(
      'section'  => 'headlines',
      'label'    => 'Front Page Headline',
      'type'     => 'text'
    )
  );

  //----------- [  2E2. Headlines > Front Page Subheadline  ]

  $wp_customize->add_setting(
    'airgame_front_page_subheadline',
    array(
      'default'            => 'Join our movement now',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_front_page_subheadline',
    array(
      'section'  => 'headlines',
      'label'    => 'Front Page Subheadline',
      'type'     => 'text'
    )
  );

  //----------- [  2E3. Headlines > Footer Email Signup Headline  ]

  $wp_customize->add_setting(
    'airgame_footer_email_signup_headline',
    array(
      'default'            => 'Join the campaign now',
      'sanitize_callback'  => 'airgame_sanitize',
      'transport'          => 'postMessage'
    )
  );
  $wp_customize->add_control(
    'airgame_footer_email_signup_headline',
    array(
      'section'  => 'headlines',
      'label'    => 'Footer Email Signup Headline',
      'type'     => 'text'
    )
  );

}
add_action( 'customize_register', 'register_theme_customizer' );


//=============== [  2G. CSS to be modified via Customizer  ]

// This has no function yet, but allows for custom CSS to be directly applied
// via the Customizer.

function customizer_css() {
    ?>
    <style type="text/css">

    </style>
    <?php
}
add_action( 'wp_head', 'customizer_css' );

//=============== [  2H. Text input sanitizer function  ]

// This function prevents the user from inadvertently (or intentionally) running
// SQL injection commands against their own MySQL database when inputting text
// in Customizer text fields.

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

?>
