<?php

function fetchUrl($url){

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($ch, CURLOPT_TIMEOUT, 20);
 // You may need to add the line below
 // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

 $feedData = curl_exec($ch);
 curl_close($ch);

 return $feedData;

}

$profile_id = get_theme_mod( 'airgame_facebook_page_id' );

//App Info, needed for Auth
$app_id = get_theme_mod( 'airgame_facebook_app_id' );
$app_secret = get_theme_mod( 'airgame_facebook_app_secret' );

//Retrieve auth token
$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");

$fb_json = fetchUrl("https://graph.facebook.com/{$profile_id}/feed?{$authToken}");

$fb_posts = json_decode( $fb_json );
