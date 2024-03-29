<?php

// This file contains overrides of WordPress routing and backend options.

/*
*=================[  Defaults post structure to postname  ]=====================
*/

// The perferred URL structure for SEO, sharing, and human-readability is
// definitely /%postname%/, which omits ugly date / author taxonomies. This sets
// the post structure to postname by default. If you're switching to this
// platform on a site with significant inbound traffic to extant links (which is
// not recommended), you may want to override this setting.

function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

/*
*=================[  Disables comments  ]=======================================
*/

// Default WordPress comments have all sorts of problems. You don't want them.
// If you want comments, then use something like Disqus, which is better
// in every way.

add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

function airgame_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'airgame_admin_bar_render' );

/*
*=================[  Admin Dashboard Cleanup  ]=================================
*/

// Might re-add this later

// function remove_dashboard_meta() {
//         remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
//         remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
//         remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
//         remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
// }
// add_action( 'admin_init', 'remove_dashboard_meta' );

?>
