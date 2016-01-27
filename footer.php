  <?php wp_footer();

  /*
  * Variable declarations
  */

  $altLogo = get_theme_mod( 'airgame_alternate_logo' );
  $footerImage = get_theme_mod( 'airgame_footer_image' );

  $emailSignupHeadline = get_theme_mod( 'airgame_footer_email_signup_headline' );

  ?>

  <!--
  * Conditional statement that fires on form pages only.
  -->

  <?php if ( get_post_type() !== 'ngp-form-pages' ): ?>

    <!--
    * Email signup section over large image.
    -->

    <div class="airgame-footer-email-signup" style="background-image: url('<?php echo $footerImage; ?>')">
      <div class="footer-signup">
        <div class="airgame-hed-box footer-signup">
          <h1 class="airgame_footer_email_signup_headline footer-signup"><?php echo $emailSignupHeadline; ?></h1>
        </div>
        <form class="front-page-hero-email-signup">
          <input class="email-signup-email" placeholder="Email address" type="text"/ >
          <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
          <button class="airgame_email_signup_button_text"><?php echo get_theme_mod( 'airgame_email_signup_button_text' ); ?></button>
        </form>
      </div>
    </div>

    <!--
    * Contribute / Volunteer ask button & links section over lightened main color.
    -->

    <div class="airgame-footer-ask-buttons">
      <div class="ask-buttons-container">
        <a href="<?php echo get_theme_mod( 'airgame_contribute_button_form' ); ?>">
          <button class="ask-button ask-contribute airgame_contribute_button_text">
            <?php echo get_theme_mod( 'airgame_contribute_button_text' ); ?>
          </button>
        </a>
        <a href="<?php echo get_theme_mod( 'airgame_volunteer_button_form' ); ?>">
          <button class="ask-button ask-volunteer airgame_volunteer_button_text">
            <?php echo get_theme_mod( 'airgame_volunteer_button_text' ); ?>
          </button>
        </a>
      </div>
    </div>

  <?php endif; ?>

  <!--
  * General footer content section over dark main color.
  -->

  <div class="airgame-footer">
    <?php if ($altLogo): ?>
      <a href="<?php echo get_home_url(); ?>">
        <img class="airgame-footer-logo" src="<?php echo $altLogo; ?>" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
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
