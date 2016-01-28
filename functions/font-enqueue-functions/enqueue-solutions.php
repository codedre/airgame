<?php

/*
*=================[ Enqueuing of Solutions Fontpack Fonts ]=====================
*/

// Imports Glacial Indifference font from Open Source Font Library CDN
wp_register_style(
  'airgame-font-glacial-indifference', // Stylesheet short handle
  'https://fontlibrary.org/face/glacial-indifference' // Path
);
wp_enqueue_style( 'airgame-font-glacial-indifference' );

// Imports Droid Serif font from Google CDN
wp_register_style(
  'airgame-font-pt-serif', // Stylesheet short handle
  '//fonts.googleapis.com/css?family=PT+Serif' // Path
);
wp_enqueue_style( 'airgame-font-pt-serif' );

?>
