<?php

function add_scripts(){
    wp_enqueue_style("styles", get_stylesheet_uri());
    wp_enqueue_script(
      "app",
      get_template_directory_uri() . "/js/app.js",
      array("jquery")
    );
}
add_action("wp_enqueue_scripts", "add_scripts");

// Sets post structure to postname, which is optimal for SEO
function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
}
add_action( 'init', 'reset_permalinks' );

?>
