<?php

require_once('StormTwitter.class.php');

// Define all the variables! \(:D)/
$temp_path = WP_CONTENT_DIR . '/themes/campaign-theme/functions/social-feed-functions/twitter-oauth/cache/';
$temp_key = get_theme_mod( 'airgame_twitter_consumer_key' );
$temp_secret = get_theme_mod( 'airgame_twitter_consumer_secret' );
$temp_token = get_theme_mod( 'airgame_twitter_access_token' );
$temp_token_secret = get_theme_mod( 'airgame_twitter_access_token_secret' );
$temp_username = get_theme_mod( 'airgame_twitter_username' );

$config = array(
  'directory' => $temp_path, //The path used to store the .tweetcache cache file.
  'key' => $temp_key,
  'secret' => $temp_secret,
  'token' => $temp_token,
  'token_secret' => $temp_token_secret,
  'screenname' => '', //This is now deprecated and you shouldn't define this - but it's here for backwards compatibility
  'cache_expire' => 3600 //The duration of the cache
);

$twitter = new StormTwitter($config);



// getTweets is the only public method. For legacy reasons, it takes between 0 and 3 parameters.
// getTweets(twitter_screenname, number_of_tweets, custom_parameters_to_go_twitter);

$tweets = $twitter->getTweets($temp_username, 4, array('include_rts' => true, 'exclude_replies' => true));
