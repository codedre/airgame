<!DOCTYPE html>
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
    <?php require_once( get_template_directory() . '/functions/airgame-after-headers-functions.php' ); ?>
  </head>
  <body>
    <!--===========<><><> [  Menu  ] <><><>=============-->
    <div id="header">
    <?php
      if ( get_post_type() !== 'ngp-form-pages' ) {
        wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) );
      }
      else {
        echo '<!-- No menu output on form pages -->';
      }
    ?>
    <?php if ( get_post_type() !== 'ngp-form-pages' ): ?>
          <div class="menu-actions">
            <a href="<?php echo get_home_url(); ?>">
              <img src="http://i.imgur.com/23Jp7Dz.png" class="airgame-logo" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
            </a>
            <a href="<?php echo get_home_url(); ?>/forms/contribute">
              <div class="airgame-top-donate">
                <h3>
                  <?php echo get_theme_mod( 'airgame_contribute_button_text' ); ?>
                </h3>
              </div>
            </a>
          </div>
    <?php endif; ?>
    </div>
