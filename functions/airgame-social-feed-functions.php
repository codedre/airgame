<?php

// Twitter OAuth
require_once get_template_directory() . '/functions/social-feed-functions/twitter-oauth/airgame-twitter-oauth-functions.php';

// Facebook Graph
require_once get_template_directory() . '/functions/social-feed-functions/facebook-graph/airgame-facebook-graph-functions.php';

// Parse Twitter OAuth created_at and convert to Unix time

// Parse Facebook Graph created_time and convert to Unix time

// Temporary values
$slider_post_1 = $tweets['0'];
$slider_post_2 = $tweets['1'];
$slider_post_3 = $tweets['2'];
$slider_post_4 = $tweets['3'];
