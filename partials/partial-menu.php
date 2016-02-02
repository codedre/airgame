<?php

wp_nav_menu( array( 'container_class' => 'main-nav', 'theme_location' => 'primary' ) ); ?>

<div class="menu-actions">
  <a href="<?php echo get_home_url(); ?>">
    <img src="<?php echo get_theme_mod( 'airgame_primary_logo' ); ?>" class="airgame-logo" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
  </a>

  <a href="<?php echo get_theme_mod( 'airgame_contribute_button_form' ); ?>">
    <div class="airgame-top-donate">
      <h3 class="airgame_contribute_button_text">
        <?php echo get_theme_mod( 'airgame_contribute_button_text' ); ?>
      </h3>
    </div>
  </a>
</div>
<?php
