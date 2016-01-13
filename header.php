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

        //Add the Site Identity description on the front-page
        $site_description = get_bloginfo( 'description', 'display' );

        if ( $site_description && ( is_home() || is_front_page() ) ) {
          echo " | $site_description";
        }
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
