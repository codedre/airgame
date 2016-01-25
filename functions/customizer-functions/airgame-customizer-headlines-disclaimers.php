<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Headlines & Disclaimers Section  ]
*/

$wp_customize->add_section(
  'headlines_disclaimers',
  array(
      'title'     => 'Headlines & Disclaimers',
      'priority'  => 200
  )
);

/*
*----------- [  Headlines & Disclaimers > Front Page Headline Setting & Control  ]
*/

$wp_customize->add_setting(
  'airgame_front_page_headline',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_front_page_headline',
  array(
    'section'  => 'headlines_disclaimers',
    'label'    => 'Front Page Headline',
    'type'     => 'text'
  )
);

/*
*----------- [  Headlines & Disclaimers > Front Page Subheadline Setting & Control  ]
*/

$wp_customize->add_setting(
  'airgame_front_page_subheadline',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_front_page_subheadline',
  array(
    'section'  => 'headlines_disclaimers',
    'label'    => 'Front Page Subheadline',
    'type'     => 'text'
  )
);

/*
*----------- [  Headlines & Disclaimers > Disclaimer Setting & Control  ]
*/

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
    'section'  => 'headlines_disclaimers',
    'label'    => 'Boxed Disclaimer',
    'type'     => 'text'
  )
);

/*
*----------- [  Headlines & Disclaimers > Copyright Setting & Control  ]
*/

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
    'section'  => 'headlines_disclaimers',
    'label'    => 'Copyright',
    'type'     => 'text'
  )
);

?>
