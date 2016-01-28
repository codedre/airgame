<?php

/*
*=================[ Enqueuing of Whistlestop Fontpack Fonts ]=====================
*/

// Imports Arvo and Open Sans fonts from Google CDN
wp_register_style(
  'airgame-fonts-arvo-open-sans', // Stylesheet short handle
  '//fonts.googleapis.com/css?family=Arvo|Open+Sans' // Path
);
wp_enqueue_style( 'airgame-fonts-arvo-open-sans' );

?>
