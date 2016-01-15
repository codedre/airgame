  <?php wp_footer(); ?>

  <?php if ( get_post_type() !== 'ngp-form-pages' ): ?>
    <div class="airgame-footer-email-signup" <?php
        echo "style=\"background-image: url('http://i.imgur.com/Bx5mrnT.jpg')\"";
      ?>>
      <div class="airgame-container footer-signup">
        <div class="airgame-hed-box footer-signup">
          <h1 class="footer-signup"><?php echo get_theme_mod( 'airgame_footer_email_signup_headline' ); ?></h1>
        </div>
        <form class="front-page-hero-email-signup">
          <input class="email-signup-email" placeholder="Email address" type="text"/ >
          <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
          <button>I'm in!</button>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <div class="airgame-footer">
    <img class="airgame-footer-logo" src="http://i.imgur.com/TIC2DD3.png" alt="<?php echo get_bloginfo('name') . " campaign logo"; ?>" />
    <div class="airgame-disclaimer-container">
      <h2 class="airgame-disclaimer"><?php echo get_theme_mod( 'airgame_disclaimer' ); ?></h2>
    </div>
    <div class="airgame-copyright-container">
      <h2 class="airgame-copyright"><?php echo get_theme_mod( 'airgame_copyright' ); ?></h2>
    </div>
  </div>

  </body>
</html>
