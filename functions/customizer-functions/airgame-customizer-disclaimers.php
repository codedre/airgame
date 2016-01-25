<?php

/*
*=============== [  Disclaimers Section  ]
*/

$wp_customize->add_section(
  'disclaimers',
  array(
      'title'     => 'Disclaimers',
      'priority'  => 200
  )
);

/*
*----------- [  Disclaimers > Disclaimer Setting & Control  ]
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
    'section'  => 'disclaimers',
    'label'    => 'Boxed Disclaimer',
    'type'     => 'text'
  )
);

/*
*----------- [  Disclaimers > Copyright Setting & Control  ]
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
    'section'  => 'disclaimers',
    'label'    => 'Copyright',
    'type'     => 'text'
  )
);

?>
