<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Headlines  ]
*/

$wp_customize->add_section(
  'headlines',
  array(
      'title'     => 'Headlines',
      'priority'  => 600
  )
);

/*
*----------- [  Headlines > Front Page Headline  ]
*/

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

/*
*----------- [  Headlines > Front Page Subheadline  ]
*/

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

?>
