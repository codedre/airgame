  <?php wp_footer();

  /*
  * Variable declarations
  */

  $altlogo = get_theme_mod( 'airgame_alternate_logo' );

  ?>

  <!--
  * Conditional statement that fires on form pages only.
  -->

  <?php if ( get_post_type() !== 'ngp-form-pages' ): ?>

    <!--
    * Email signup section over large image.
    -->

    <div class="airgame-footer-email-signup" <?php
        echo "style=\"background-image: url('http://i.imgur.com/Bx5mrnT.jpg')\"";
      ?>>
      <div class="airgame-container footer-signup">
        <div class="airgame-hed-box footer-signup">
          <h1 class="airgame_footer_email_signup_headline footer-signup"><?php echo get_theme_mod( 'airgame_footer_email_signup_headline' ); ?></h1>
        </div>
        <form class="front-page-hero-email-signup">
          <input class="email-signup-email" placeholder="Email address" type="text"/ >
          <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
          <button class="airgame_email_signup_button_text"><?php echo get_theme_mod( 'airgame_email_signup_button_text' ); ?></button>
        </form>
      </div>
    </div>

    <!--
    * Ask button section over lightened main color.
    -->

    <div class="airgame-footer-ask-buttons">
      <div class="ask-buttons-container">
        <a href="<?php echo get_home_url(); ?>/forms/contribute">
          <button class="ask-button ask-contribute airgame_contribute_button_text">
            <?php echo get_theme_mod( 'airgame_contribute_button_text' ); ?>
          </button>
        </a>
          <button class="ask-button ask-volunteer airgame_volunteer_button_text">
            <?php echo get_theme_mod( 'airgame_volunteer_button_text' ); ?>
          </button>
      </div>
    </div>

  <?php endif; ?>

  <!--
  * General footer content section over dark main color.
  -->

  <div class="airgame-footer">
    <?php if ($altlogo): ?>
      <a href="<?php echo get_home_url(); ?>">
        <img class="airgame-footer-logo" src="<?php echo $altlogo; ?>" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
      </a>
    <?php endif; ?>
    <div class="airgame-disclaimer-container">
      <h2 class="airgame-disclaimer"><?php echo get_theme_mod( 'airgame_disclaimer' ); ?></h2>
    </div>
    <div class="airgame-copyright-container">
      <h2 class="airgame-copyright"><?php echo get_theme_mod( 'airgame_copyright' ); ?></h2>
    </div>
  </div>

  </body>
</html>
