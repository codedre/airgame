<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Airgame Style Section  ]
*/

$wp_customize->add_section(
  'airgame_style',
  array(
      'title'     => 'Airgame Style',
      'priority'  => 50
  )
);

/*
*----------- [  Airgame Style > Layout  ]
*/

$wp_customize->add_setting(
  'airgame_layout',
  array(
    'default'            => '',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_layout',
  array(
    'section'  => 'airgame_style',
    'label'    => 'Layout'
  )
);

/*
*----------- [  Airgame Style > Fonts  ]
*/

$wp_customize->add_setting(
  'airgame_fonts',
  array(
    'default'            => '',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_fonts',
  array(
    'section'  => 'airgame_style',
    'label'    => 'Fonts'
  )
);

/*
*----------- [  Airgame Style > Colors  ]
*/

$wp_customize->add_setting(
  'airgame_colors',
  array(
    'default'            => '',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_colors',
  array(
    'section'  => 'airgame_style',
    'label'    => 'Colors'
  )
);

?>
