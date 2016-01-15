  <?php wp_footer(); ?>

  <div class="airgame-footer-email-signup" <?php
      echo "style=\"background-image: url('http://i.imgur.com/Bx5mrnT.jpg')\"";
    ?>>
    <div class="airgame-container footer-signup">
      <div class="airgame-hed-box footer-signup">
        <h1 class="footer-signup">Join the campaign now</h1>
      </div>
      <form class="front-page-hero-email-signup">
        <input class="email-signup-email" placeholder="Email address" type="text"/ >
        <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
        <button>I'm in!</button>
      </form>
    </div>
  </div>

  <div class="airgame-footer">
    <div class="airgame-disclaimer-container">
      <h2 class="airgame-disclaimer"><?php echo get_theme_mod( 'airgame_disclaimer' ); ?></h2>
    </div>
    <div class="airgame-copyright-container">
      <h2 class="airgame-copyright"><?php echo get_theme_mod( 'airgame_copyright' ); ?></h2>
    </div>
  </div>

  </body>
</html>
