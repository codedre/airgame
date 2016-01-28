<?php

// This file sets up the menu.

/*
*=================[ Menu Init ]=================================================
*/

function airgame_register_theme_menu() {
    register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'airgame_register_theme_menu' );

?>
