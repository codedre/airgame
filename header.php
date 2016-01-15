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
    <?php if ( get_post_type() !== 'ngp-form-pages' ): ?>
      <div class="menu-actions-container">
        <div class="menu-actions">
          <img src="http://i.imgur.com/23Jp7Dz.png" class="airgame-logo" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
          <div class="airgame-top-donate">
            <?php echo get_theme_mod( 'airgame_contribute_button_text' ); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
