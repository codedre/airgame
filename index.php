
<!--===========<><><> [  Menu  ] <><><>=============-->
<div id="header">
  <?php get_header(); ?>
</div>

<div class="airgame-post-header-container">
  <div class="airgame-post-header-image" style="background-image: url('http://i.imgur.com/z1RFv6j.jpg');";>
  </div>
</div>

<!--===========<><><> [  The WP Loop  ] <><><>=============-->

<div class="airgame-content-wrapper">
  <div class="airgame-content-container">
    <?php get_template_part("loop"); ?>
  </div>
</div>

<!--===========<><><> [  Footer  ] <><><>=============-->

<?php get_footer(); ?>
