<?php

// This file loads and configures custom post and page types.

/*
*====================[  Global settings  ]======================================
*/

// Forces Featured Image box on custom post types.
// NGP Form Pages use Featured Images for background photos.
add_theme_support( 'post-thumbnails' );

// Moves all "advanced" context fields (ie metaboxes) above the default editor.
add_action('edit_form_after_title', function() {
    global $post, $wp_meta_boxes;
    do_meta_boxes(get_current_screen(), 'advanced', $post);
    unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});

/*
*====================[  NGP Form Pages  ]=======================================
*/

// Sets up the NGP Form Page post type

function ngp_form_pages_init() {
    $args = array(
      'label' => 'NGP Form Pages',
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'page',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'forms'),
      'query_var' => true,
      'menu_icon' => 'dashicons-clipboard',
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        )
      );
    register_post_type( 'ngp-form-pages', $args );
}
add_action( 'init', 'ngp_form_pages_init' );

/*
*------------------[  NGP Form Page Meta Boxes  ]
*/

//Creates meta box
function ngp_data_id_custom_meta() {
    add_meta_box(
      'ngp_data_id_custom_meta', //Unique meta box ID
      __( 'NGP Form Page Editor', 'ngp-data-id-textdomain' ), //Meta box title
      'ngp_data_id_meta_callback', //Callback function
      'ngp-form-pages' //Creates boxes only on NGP Form Pages
    );
}
add_action( 'add_meta_boxes', 'ngp_data_id_custom_meta' );

//Displays meta box
function ngp_data_id_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'ngp_data_id_nonce' );
  $ngp_data_id_stored_meta = get_post_meta( $post->ID );
  ?>

  <h3>How to Create an NGP Form Page</h3>
  <p>
    This editor allows you to create donation pages, volunteer signup pages, other types of signup pages, and petition pages in a few simple steps.
  </p>
  <p>
    Step 1: Create a form in NGP and copy its <em>data-id</em>, then paste it into the <em>NGP Form Data-ID</em> box below.
    Click here for more help on making NGP forms and retrieving the data-id.
    NOTE: Some data-id values have a minus sign / hypen in front of them. This is part of the data-id.
    If your data-id begins with a hypen, don't omit it or your form will not render.
  </p>
  <p>
      <label for="ngp-data-id-meta-text" class="ngp-data-id-row-title"><?php _e( 'NGP Form Data-ID', 'ngp-data-id-textdomain' )?></label>
      <input type="text" name="ngp-data-id-meta-text" id="ngp-data-id-meta-text" value="<?php if ( isset ( $ngp_data_id_stored_meta['ngp-data-id-meta-text'] ) ) echo $ngp_data_id_stored_meta['ngp-data-id-meta-text'][0]; ?>" />
  </p>
  <p>
    Step 2: Click the white box at the top of the page to edit the form page title and the small Edit button below it to edit the form page address.
  </p>
  <p>
    Step 3: Use the large text editor underneath this box to edit the form page text.
  </p>
  <p>
    Step 4: Set a background image for the form page with the Featured Image box on the right. Click here for help with choosing an image that conforms to best practices.
  </p>


  <?php
}

//Saves meta box data to database
function ngp_data_id_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'ngp_data_id_nonce' ] ) && wp_verify_nonce( $_POST[ 'ngp_data_id_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'ngp-data-id-meta-text' ] ) ) {
        update_post_meta( $post_id, 'ngp-data-id-meta-text', sanitize_text_field( $_POST[ 'ngp-data-id-meta-text' ] ) );
    }

}
add_action( 'save_post', 'ngp_data_id_meta_save' );

/*
*====================[  Issue Pages  ]==========================================
*/

// Sets up the NGP Form Page post type

function issue_pages_init() {
    $args = array(
      'label' => 'Issues',
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'page',
      'hierarchical' => false,
      'rewrite' => array('slug' => 'issues'),
      'query_var' => true,
      'menu_icon' => 'dashicons-format-chat',
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        )
      );
    register_post_type( 'issue-pages', $args );
}
add_action( 'init', 'issue_pages_init' );
