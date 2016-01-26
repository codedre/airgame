<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [ Contribute & Volunteer Buttons Section  ]
*/

$wp_customize->add_section(
  'contribute_volunteer',
  array(
      'title'     => 'Contribute & Volunteer Buttons',
      'priority'  => 400
  )
);

/*
*----------- [  Contribute & Volunteer Buttons > Contribute Button Text Setting & Control  ]
*/

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

/*
*----------- [  Contribute & Volunteer Buttons > Form Linked to Contribute Button Setting & Control ]
*/

$wp_customize->add_setting(
  'airgame_contribute_button_form',
  array(
    'default'            => '',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  new Form_Pages_Dropdown_Control(
    $wp_customize, 'airgame_contribute_button_form', array(
      'label'    => __( 'Form Linked to Contribute Button', 'textdomain' ),
      'section'  => 'contribute_volunteer',
      'type'     => 'form_pages_dropdown'
    )
  )
);

/*
*----------- [  Contribute & Volunteer Buttons > Volunteer Button Text Setting & Control ]
*/

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

/*
*----------- [  Contribute & Volunteer Buttons > Form Linked to Volunteer Button Setting & Control ]
*/

$wp_customize->add_setting(
  'airgame_volunteer_button_form',
  array(
    'default'            => '',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  new Form_Pages_Dropdown_Control(
    $wp_customize, 'airgame_volunteer_button_form', array(
      'label'    => __( 'Form Linked to Volunteer Button', 'textdomain' ),
      'section'  => 'contribute_volunteer',
      'type'     => 'form_pages_dropdown'
    )
  )
);

?>
