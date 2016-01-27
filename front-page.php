<?php

/*
* Variable declarations
*/

$frontPageTopImage = get_theme_mod( 'airgame_front_page_top_image' );

$frontPageHeadline = get_theme_mod( 'airgame_front_page_headline' );
$frontPageSubheadline = get_theme_mod( 'airgame_front_page_subheadline' );

?>
<div id="header">
  <?php get_header(); ?>
</div>

<div class="airgame-body front-page-body">

<!--===========<><><> [  Hero Box  ] <><><>=============-->
<div class="airgame-body front-page-hero-box" style="background-image: url('<?php echo $frontPageTopImage; ?>')">;
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
        <button class="airgame_email_signup_button_text"><?php echo get_theme_mod( 'airgame_email_signup_button_text' ); ?></button>
      </form>
    </div>
  </div>
</div>

</div> <!-- airgame-body front-page-hero-box -->

<!--===========<><><> [  Loop  ] <><><>=============-->

<!-- the WP Loop -->
<div class="airgame-content-wrapper">
  <div class="airgame-content-container">
    <?php get_template_part("loop"); ?>
  </div>
</div>

<!--===========<><><> [  Footer  ] <><><>=============-->

<?php get_footer(); ?>
