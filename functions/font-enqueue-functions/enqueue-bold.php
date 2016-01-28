<?php

/*
*=================[ Enqueuing of Bold Fontpack Fonts ]==========================
*/

// Imports Now font from Open Source Font Library CDN
wp_register_style(
  'airgame-font-now', // Stylesheet short handle
  'https://fontlibrary.org/face/now' // Path
);
wp_enqueue_style( 'airgame-font-now' );

// Imports Droid Serif font from Google CDN
wp_register_style(
  'airgame-font-droid-serif', // Stylesheet short handle
  '//fonts.googleapis.com/css?family=Droid+Serif' // Path
);
wp_enqueue_style( 'airgame-font-droid-serif' );

?>
