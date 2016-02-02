<?php get_header();

// This is the static front page hardcoded into the theme. Lots of php is
// compiled into html via this file, based on settings edited by the user in
// the Customizer backend screen.

// The user can add to this page by designating a Page as the 'Front Page'.
// Because this file retains the Wordpress Loop, it will be able to render
// content from the page designated as the Front Page as if it were a normal
// page, bookended by the front page modules.

/*
*====================[  Variable declarations  ]================================
*/

$frontPageTopImage = get_theme_mod( 'airgame_front_page_top_image' );
$frontPageHeadline = get_theme_mod( 'airgame_front_page_headline' );
$frontPageSubheadline = get_theme_mod( 'airgame_front_page_subheadline' );
$signupButtonText = get_theme_mod( 'airgame_email_signup_button_text' );

?>

<!--
=======================[  Hero Box  ]===========================================
-->

<div class="airgame-body front-page-body">

  <div class="airgame-body front-page-hero-box" style="background-image: url('<?php echo $frontPageTopImage; ?>')">
    <div class="airgame-container">
      <div class="airgame-half-container">
        <div class="airgame-hed-box">
          <h1 class="airgame_front_page_headline">
            <?php echo $frontPageHeadline; ?>
          </h1>
        </div>
        <div class="airgame-dek-box">
          <h2 class="airgame_front_page_subheadline">
            <?php echo $frontPageSubheadline; ?>
          </h2>
        </div>
        <form class="front-page-hero-email-signup">
          <input class="email-signup-email" placeholder="Email address" type="text"/ >
          <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
          <button class="airgame_email_signup_button_text"><?php echo $signupButtonText ?></button>
        </form>
      </div>
    </div>
  </div>

  <!--
  =======================[  Social feed  ]========================================
  -->

  <?php
    if (isset($tweets)) {
      require_once get_template_directory() . '/partials/partial-social-feed.php';
    }
  ?>

  <!--
  =======================[  The Loop  ]===========================================
  -->

  <div class="airgame-content-wrapper">

    <?php
    echo "<pre>";
    var_dump($tweets);
    echo "</pre>";
    ?>

    <div class="airgame-content-container">
      <?php get_template_part("loop"); ?>
    </div>
  </div>

  <!--
  =======================[  Footer  ]=============================================
  -->

</div> <!-- airgame-body front-page-body -->

<?php get_footer(); ?>
