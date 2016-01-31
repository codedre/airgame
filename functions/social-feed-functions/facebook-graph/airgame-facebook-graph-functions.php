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

$profile_id = "the_profile_id_of_the_page_you_want";

//App Info, needed for Auth
$app_id = "your_app_id_in_here";
$app_secret = "your_app_secret_in_here";

//Retrieve auth token
$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");

$json_object = fetchUrl("https://graph.facebook.com/{$profile_id}/feed?{$authToken}");
