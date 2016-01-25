<?php

// This file contains all customization of the Customizer screen
// (Appearance > Customize).

// It is enormous and unwieldy. I apologize. Unfortunately, customize_register

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
//==== [  2G. Headlines  ]
//-- [  2G1. Headlines > Front Page Headline  ]
//-- [  2G2. Headlines > Front Page Subheadline  ]
//==== [  2H. Images  ]
//-- [  2H1. Images > Primary Logo  ]
//-- [  2H2. Images > Alternate Logo  ]
//-- [  2H3. Images > Front Page Top Section Background Image  ]
//-- [  2H4. Images > Footer Email Signup Background Image  ]
//==== [  2I. CSS to be modified via Customizer  ]
//==== [  2J. Text input sanitizer function  ]

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

function airgame_customize_register( $wp_customize ) {

  if ( ! isset( $wp_customize ) ) {
		return;
	}

  /*
  *=============== [  2A. Removes Static Front Page  ]
  */

  //Airgame forces a static front page. It is not recommended for users to
  //switch to a blog posts front page. This removes that option from the
  //Customizer screen.

  $wp_customize->remove_section( 'static_front_page' );

  /*
  *=============== [  2B. Title & Icon (i.e. Site Identity) Section  ]
  */

  //Allows the Site Title to be updated in realtime.
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

  //Removes the Blog Description text field. This theme does not use it.
  $wp_customize->remove_control('blogdescription');

  /*
  *=============== [  Disclaimers Section  ]
  */
  require_once 'customizer-functions/airgame-customizer-disclaimers.php';

  /*
  *=============== [  Email Signup Section  ]
  */
  require_once 'customizer-functions/airgame-customizer-email-signup.php';

  /*
  *=============== [  Contribute & Volunteer Buttons Section  ]
  */
  require_once 'customizer-functions/airgame-customizer-contribute-volunteer.php';

  /*
  *=============== [  Social Media Section  ]
  */
  require_once 'customizer-functions/airgame-customizer-social-media.php';

  //=============== [  2G. Headlines  ]

  $wp_customize->add_section(
    'headlines',
    array(
        'title'     => 'Headlines',
        'priority'  => 600
    )
  );

  //----------- [  2G1. Headlines > Front Page Headline  ]

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

  //----------- [  2G2. Headlines > Front Page Subheadline  ]

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

  //=============== [  2H. Images  ]

  $wp_customize->add_section(
    'images',
    array(
        'title'     => 'Images',
        'priority'  => 700
    )
  );

  //----------- [  2H1. Images > Primary Logo  ]

  $wp_customize->add_setting(
    'airgame_primary_logo',
    array(
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'airgame_primary_logo',
			array(
				'section'		=> 'images',
				'label'			=> 'Primary Logo',
				'description'	=> 'Select the image to be used for the primary top logo. This should be the full-color version of your logo, with no transparency.'
			)
		)
	);

  //----------- [  2H2. Images > Alternate Logo  ]

  $wp_customize->add_setting(
    'airgame_alternate_logo',
    array(
      'transport' => 'postMessage'
    )
  );
  $wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'airgame_alternate_logo',
			array(
				'section'		=> 'images',
				'label'			=> 'Alternate Logo',
				'description'	=> 'Select the image to be used for the alternate footer logo. This should be a PNG image with simple white version of logo on a transparent background.'
			)
		)
	);


  //**** ------- END CUSTOMIZE OPTIONS ------- ****
}
add_action( 'customize_register', 'airgame_customize_register' );


//=============== [  2I. CSS to be modified via Customizer  ]

// This has no function yet, but allows for custom CSS to be directly applied
// via the Customizer.

function customizer_css() {
  ?>
  <style type="text/css">

  </style>
  <?php
}
add_action( 'wp_head', 'customizer_css' );

//=============== [  2J. Text input sanitizer function  ]

// This function prevents the user from inadvertently (or intentionally) running
// SQL injection commands against their own MySQL database when inputting text
// in Customizer text fields.

function airgame_sanitize( $input ) {
	return strip_tags( stripslashes( $input ) );
}

?>
