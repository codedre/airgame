<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Airgame Style Section  ]
*/

$wp_customize->add_section(
  'airgame_style',
  array(
      'title'         => 'Airgame Style',
      'priority'      => 50
  )
);

/*
*----------- [  Airgame Style > Layout  ]
*/

$wp_customize->add_setting(
  'airgame_layout',
  array(
    'transport'           => 'refresh',
    'default'             => 'foggybottom'
  )
);
$wp_customize->add_control(
  'airgame_layout', array(
    'label'               => 'Layout Pack',
    'section'             => 'airgame_style',
    'type'                => 'radio',
    'choices'             => array(
      'foggybottom'       => 'Foggy Bottom',
      'columbiaheights'   => 'Columbia Heights',
      'farragutnorth'     => 'Farragut North'
    )
  )
);

/*
*----------- [  Airgame Style > Fonts  ]
*/

$wp_customize->add_setting(
  'airgame_fonts',
  array(
    'transport'           => 'refresh',
    'default'             => 'bold'
  )
);
$wp_customize->add_control(
  'airgame_fonts', array(
    'label'               => 'Font Pack',
    'section'             => 'airgame_style',
    'type'                => 'radio',
    'choices'             => array(
      'bold'              => 'Bold',
      'heartland'         => 'Heartland',
      'progress'          => 'Progress'
    )
  )
);

/*
*----------- [  Airgame Style > Colors  ]
*/

$wp_customize->add_setting(
  'airgame_colors',
  array(
    'transport'           => 'refresh',
    'default'             => 'Americana'
  )
);
$wp_customize->add_control(
  'airgame_colors', array(
    'label'               => 'Color Pack',
    'section'             => 'airgame_style',
    'type'                => 'radio',
    'choices'             => array(
      'americana'         => 'Americana',
      'sequoia'           => 'Sequoia',
      'lajolla'           => 'La Jolla'
    )
  )
);

?>
