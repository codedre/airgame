<?php get_header(); ?>

<div class="front-page-body">

<div class="airgame-post-header-container">
  <div class="airgame-post-header-image" style="background-image: url('http://i.imgur.com/z1RFv6j.jpg');";>
  </div>
</div>

<!-- the WP Loop -->
<div class="airgame-content-wrapper">
  <div class="airgame-content-container">
    <?php get_template_part("loop"); ?>
  </div>
</div>

</div>

<!-- Footer -->
<?php get_footer(); ?>
