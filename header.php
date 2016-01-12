<!doctype html>
<!--

This site is powered by Airgame.

Visit http://airga.me to learn more.

-->
<html>
  <head>
    <title>Campaign Theme</title>
    <meta charset="UTF-8">
    <?php wp_head(); ?>
  </head>
  <body>
    <?php wp_nav_menu(); ?>
    <script type="text/javascript" src="//d1aqhv4sn5kxtx.cloudfront.net/actiontag/at.js"></script>
    <div class="ngp-form" data-id="<?php

    // Retrieves the stored value from the database
    $meta_value = get_post_meta( get_the_ID(), 'ngp-data-id-meta-text', true );

    // Checks and displays the retrieved value
    if( !empty( $meta_value ) ) {
        echo $meta_value;
    }

    ?>"></div>
