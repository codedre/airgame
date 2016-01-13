<!DOCTYPE html>
<!--

This site is powered by Airgame.

Visit http://airga.me to learn more.

-->
<html>
  <head>
    <title><?php bloginfo('name'); ?></title>
    <meta charset="UTF-8 without BOM" />
    <?php wp_head(); ?>
  </head>
  <body>
    <?php
      if ( get_post_type() !== 'ngp-form-pages' ):
    ?>
      <?php wp_nav_menu(); ?>
    <?php
      endif;
    ?>
