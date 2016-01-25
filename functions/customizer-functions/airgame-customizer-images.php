<?php

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

?>
