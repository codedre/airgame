
<!--===========<><><> [  Header  ] <><><>=============-->

<div id="header">
  <?php get_header(); ?>
</div>

<div class="airgame-body ngp-form-page-body"<?php
  if (has_post_thumbnail( $post->ID ) ){
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    echo "style=\"background-image: url('" . $image[0] . "');\"";
  }
?>>
  <div class="airgame-container ngp-form-page-container">
    <div class="ngp-form-page-form-sidebar">

      <!--===========<><><> [  Caption Section  ] <><><>===========-->

      <div class="ngp-form-page-caption-box">
        <?php

        if(have_posts()):
          while(have_posts()):
            the_post(); ?>
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>
            <?php endwhile;
          endif;

          ?>
        </div>

        <!--===========<><><> [  NGP Form  ] <><><>===========-->

        <div class="ngp-form-page-form-box">
          <script type="text/javascript" src="//d1aqhv4sn5kxtx.cloudfront.net/actiontag/at.js"></script>
          <div class="ngp-form" data-id="<?php

          // Retrieves the stored value from the database
          $meta_value = get_post_meta( get_the_ID(), 'ngp-data-id-meta-text', true );

          // Checks and displays the retrieved value
          if( !empty( $meta_value ) ) {
            echo $meta_value;
          }

          ?>"></div>
        </div>

      </div> <!-- ngp-form-page-form-sidebar -->
  </div> <!-- airgame-container ngp-form-page-container -->
</div> <!-- airgame-body ngp-form-page-body -->

<!--===========<><><> [  Footer  ] <><><>=============-->

<?php get_footer(); ?>
