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
    'transport' => 'refresh'
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
    'transport' => 'refresh'
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

/*
*----------- [  Images > Front Page Top Image  ]
*/

$wp_customize->add_setting(
  'airgame_front_page_top_image',
  array(
    'transport' => 'refresh'
  )
);
$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
    'airgame_front_page_top_image',
    array(
      'section'		=> 'images',
      'label'			=> 'Front Page Top Image',
      'description'	=> 'Select the background image to be used for the large ask section at the top of the front page.'
    )
  )
);

/*
*----------- [  Images > Front Page Top Image  ]
*/

$wp_customize->add_setting(
  'airgame_footer_image',
  array(
    'transport' => 'refresh'
  )
);
$wp_customize->add_control(
  new WP_Customize_Image_Control(
    $wp_customize,
    'airgame_footer_image',
    array(
      'section'		=> 'images',
      'label'			=> 'Footer Image',
      'description'	=> 'Select the background image to be used for the large ask section just above the footer.'
    )
  )
);

?>
