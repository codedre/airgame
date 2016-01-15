
<!--===========<><><> [  Header  ] <><><>=============-->

<div id="header">
  <?php get_header(); ?>
</div>

<div class="airgame-body front-page-body">

<!--===========<><><> [  Hero Box  ] <><><>=============-->
<div class="airgame-body front-page-hero-box" <?php
  echo "style=\"background-image: url('http://i.imgur.com/f3z56h9.jpg')\"";
?>>
  <div class="airgame-container">
    <div class="airgame-half-container">
      <div class="airgame-hed-box">
        <h1 class="airgame_front_page_headline"><?php echo get_theme_mod( 'airgame_front_page_headline' ); ?></h1>
      </div>
      <div class="airgame-dek-box">
        <h2 class="airgame_front_page_subheadline"><?php echo get_theme_mod( 'airgame_front_page_subheadline' ); ?></h2>
      </div>
      <form class="front-page-hero-email-signup">
        <input class="email-signup-email" placeholder="Email address" type="text"/ >
        <input class="email-signup-zip" placeholder="ZIP code" type="text"/ >
        <button>I'm in!</button>
      </form>
    </div>
  </div>
</div>

<div class="airgame-container">
</div>

</div> <!-- airgame-body front-page-hero-box -->

<!--===========<><><> [  Footer  ] <><><>=============-->

<?php get_footer(); ?>
