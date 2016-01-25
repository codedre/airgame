<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Email Signup Section  ]
*/

$wp_customize->add_section(
  'email_signup',
  array(
      'title'     => 'Email Signup',
      'priority'  => 300
  )
);

/*
*----------- [  Email Signup > Footer Email Signup Headline Setting & Control  ]
*/

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
      'section'  => 'email_signup',
      'label'    => 'Footer Email Signup Headline',
      'type'     => 'text'
    )
  );

  /*
  ----------- [  Email Signup > Email Signup Button Text Setting & Control  ]
  */

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

?>
