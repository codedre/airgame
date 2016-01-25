<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Images  ]
*/

$wp_customize->add_section(
  'images',
  array(
      'title'     => 'Images',
      'priority'  => 700
  )
);

/*
*----------- [  Images > Primary Logo  ]
*/

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

/*
*----------- [  Images > Alternate Logo  ]
*/

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

?>
