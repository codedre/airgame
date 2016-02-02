<?php

// Twitter OAuth
require_once get_template_directory() . '/functions/social-feed-functions/twitter-oauth/airgame-twitter-oauth-functions.php';

// Facebook Graph
// require_once get_template_directory() . '/functions/social-feed-functions/facebook-graph/airgame-facebook-graph-functions.php';

// Parse Twitter OAuth created_at and convert to Unix time
function oauthDateConvert( $twDate ) {
  $dt = DateTime::createFromFormat('D M j H:i:s P Y', $twDate );
  $newTime = $dt->format('Y-m-d H:i:s');
  return $newTime;
}

// Parse Facebook Graph created_time and convert to Unix time
// function graphDateConvert($fbDate) {
//   $dt = DateTime::createFromFormat('D M j H:i:s P Y', '2016-01-20T15:55:45+0000');
//   return $dt->format('Y-m-d H:i:s');
// }

// Temporary values
$slider_post_1 = $tweets['0'];
$slider_post_2 = $tweets['1'];
$slider_post_3 = $tweets['2'];
$slider_post_4 = $tweets['3'];

$slider_post_1_date = oauthDateConvert( $tweets['0']['created_at'] );
$slider_post_2_date = oauthDateConvert( $tweets['1']['created_at'] );
$slider_post_3_date = oauthDateConvert( $tweets['2']['created_at'] );
$slider_post_4_date = oauthDateConvert( $tweets['3']['created_at'] );
