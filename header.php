<!DOCTYPE html>
<!--

This site is powered by Airgame.

Visit http://airga.me to learn more.

-->
<html>
  <head>
    <title>
      <?php
        global $page, $paged;
        wp_title( '|', true, 'right' );

        //Add the Site Identity campaign name
        bloginfo( 'name' );

      ?>
    </title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <?php wp_head(); ?>
  </head>
  <body>
    <?php
      if ( get_post_type() !== 'ngp-form-pages' ) {
        wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) );
      }
    ?>
