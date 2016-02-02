<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <?php wp_head(); ?>
    <title>
      <?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>
    </title>
    <?php require_once( get_template_directory() . '/functions/airgame-after-headers-functions.php' ); ?>
  </head>
  <body>

    <!--===========<><><> [  Menu  ] <><><>=============-->

    <div id="header">
      <?php if ( get_post_type() !== 'ngp-form-pages' ) {
        require( get_template_directory() . '/partials/partial-menu.php' );
      } ?>
    </div>
    <?php
