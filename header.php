<!doctype html>
<html>
  <head>
    <title>Campaign Theme</title>
    <?php wp_head(); ?>
  </head>
  <body>
    <?php wp_nav_menu(); ?>
    <?php

    // Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );

    // Checks and displays the retrieved value
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }

  ?>
