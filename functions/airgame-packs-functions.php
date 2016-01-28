<?php

/*
* =========== [  Airgame Style Variables  ]
*/

$selectedColors = get_theme_mod( 'airgame_colors' );
$selectedFonts = get_theme_mod( 'airgame_fonts' );
$selectedLayout = get_theme_mod( 'airgame_layout' );

/*
* =========== [  Colorpacks  ]
*/

// Colorpack: Americana
if ( $selectedColors === 'alexandria' ) {
  require_once get_template_directory() . '/airgame-colorpacks/colorpack-alexandria.php';
}

// Colorpack: La Jolla
if ( $selectedColors === 'lajolla' ) {
  require_once get_template_directory() . '/airgame-colorpacks/colorpack-lajolla.php';
}

// Colorpack: La Jolla
if ( $selectedColors === 'tahoe' ) {
  require_once get_template_directory() . '/airgame-colorpacks/colorpack-tahoe.php';
}

/*
* =========== [  Font Packs  ]
*/

// Fontpack: Bold
if ( $selectedFonts === 'bold' ) {
  require_once get_template_directory() . '/airgame-fontpacks/fontpack-bold.php';
}

// Fontpack: Solutions
if ( $selectedFonts === 'solutions' ) {
  require_once get_template_directory() . '/airgame-fontpacks/fontpack-solutions.php';
}

// Fontpack: Whistlestop
if ( $selectedFonts === 'whistlestop' ) {
  require_once get_template_directory() . '/airgame-fontpacks/fontpack-whistlestop.php';
}

?>
