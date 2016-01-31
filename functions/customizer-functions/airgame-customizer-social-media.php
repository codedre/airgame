<?php

// This file registers one of several new options panels on the Customizer
// screen. It is called by /funtions/airgame-customizer-functions.php.

/*
*=============== [  Social Media Section  ]
*/

$wp_customize->add_section(
  'social_media',
  array(
      'title'     => 'Social Media',
      'priority'  => 500
  )
);

/*
*----------- [  Social Media > Facebook Page URL  ]
*/

$wp_customize->add_setting(
  'airgame_facebook_page_url',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_facebook_page_url',
  array(
    'section'  => 'social_media',
    'label'    => 'Facebook Page URL',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Facebook App ID  ]
*/

$wp_customize->add_setting(
  'airgame_facebook_app_id',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_facebook_app_id',
  array(
    'section'  => 'social_media',
    'label'    => 'Facebook App ID',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Facebook App Secret  ]
*/

$wp_customize->add_setting(
  'airgame_facebook_app_secret',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_facebook_app_secret',
  array(
    'section'  => 'social_media',
    'label'    => 'Facebook App Secret',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Twitter Profile URL  ]
*/

$wp_customize->add_setting(
  'airgame_twitter_username',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_twitter_username',
  array(
    'section'  => 'social_media',
    'label'    => 'Twitter Username',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Twitter Consumer Key  ]
*/

$wp_customize->add_setting(
  'airgame_twitter_consumer_key',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_twitter_consumer_key',
  array(
    'section'  => 'social_media',
    'label'    => 'Twitter Consumer Key',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Twitter Consumer Secret ]
*/

$wp_customize->add_setting(
  'airgame_twitter_consumer_secret',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_twitter_consumer_secret',
  array(
    'section'  => 'social_media',
    'label'    => 'Twitter Consumer Secret',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Twitter Access Token  ]
*/

$wp_customize->add_setting(
  'airgame_twitter_access_token',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_twitter_access_token',
  array(
    'section'  => 'social_media',
    'label'    => 'Twitter Access Token',
    'type'     => 'text'
  )
);

/*
*----------- [  Social Media > Twitter Access Token Secret  ]
*/

$wp_customize->add_setting(
  'airgame_twitter_access_token_secret',
  array(
    'default'            => '',
    'sanitize_callback'  => 'airgame_sanitize',
    'transport'          => 'postMessage'
  )
);
$wp_customize->add_control(
  'airgame_twitter_access_token_secret',
  array(
    'section'  => 'social_media',
    'label'    => 'Twitter Access Token Secret',
    'type'     => 'text'
  )
);

?>
