<?php

require_once('oauth/twitteroauth.php');

class StormTwitter {
  private $defaults = array(
    'directory' => '',
    'key' => '',
    'secret' => '',
    'token' => '',
    'token_secret' => '',
    'screenname' => '',
    'cache_expire' => ''
  );

  public $st_last_error = false;

  function __construct( $args = array() ) {
    $this->defaults = array_merge( $this->defaults, $args );
  }

  function __toString() {
    return print_r( $this->defaults, true );
  }

  function getTweets($screenname = false, $count = 20, $options = false) {
    // BC: $count used to be the first argument
    if (is_int($screenname)) {
      list($screenname, $count) = array($count, $screenname);
    }

    if ($count > 20) $count = 20;
    if ($count < 1) $count = 1;

    $default_options = array(
      'trim_user'       => true,
      'exclude_replies' => true,
      'include_rts'     => false
    );

    if ($options === false || !is_array( $options )) {
      $options = $default_options;
    } else {
      $options = array_merge( $default_options, $options );
    }

    if ($screenname === false || $screenname === 20) $screenname = $this->defaults['screenname'];

    // $result = $this->checkValidCache($screenname,$options);
    //
    // if ($result !== false) {
    //   return $this->cropTweets($result,$count);
    // }

    //If we're here, we need to load.
    $result = $this->oauthGetTweets( $screenname, $options );

    if (is_array($result) && isset($result['errors'])) {
      if (is_array($result) && isset($result['errors'][0]) && isset($result['errors'][0]['message'])) {
        $last_error = $result['errors'][0]['message'];
      } else {
        $last_error = $result['errors'];
      }
      return array( 'error' => 'Twitter said: ' . json_encode( $last_error ));
    } else {
      if ( is_array( $result ) ) {
        return $this->cropTweets( $result, $count );
      } else {
        $last_error = 'Something went wrong with the twitter request: ' . json_encode($result);
        return array('error' => $last_error);
      }
    }

  }

  private function cropTweets($result,$count) {
    return array_slice($result, 0, $count);
  }

  // private function getCacheLocation() {
  //   return $this->defaults['directory'].'.tweetcache';
  // }

  private function getOptionsHash($options) {
    $hash = md5(serialize($options));
    return $hash;
  }

  // private function checkValidCache($screenname,$options) {
  //   $file = $this->getCacheLocation();
  //   if (is_file($file)) {
  //     $cache = file_get_contents($file);
  //     $cache = @json_decode($cache,true);
  //
  //     if (!isset($cache)) {
  //       unlink($file);
  //       return false;
  //     }
  //
  //     // Delete the old cache from the first version, before we added support for multiple usernames
  //     if (isset($cache['time'])) {
  //       unlink($file);
  //       return false;
  //     }
  //
  //     $cachename = $screenname."-".$this->getOptionsHash($options);
  //
  //     //Check if we have a cache for the user.
  //     if (!isset($cache[$cachename])) return false;
  //
  //     if (!isset($cache[$cachename]['time']) || !isset($cache[$cachename]['tweets'])) {
  //       unset($cache[$cachename]);
  //       file_put_contents($file,json_encode($cache));
  //       return false;
  //     }
  //
  //     if ($cache[$cachename]['time'] < (time() - $this->defaults['cache_expire'])) {
  //       $result = $this->oauthGetTweets($screenname,$options);
  //       if (!isset($result['errors'])) {
  //         return $result;
  //       }
  //     }
  //     return $cache[$cachename]['tweets'];
  //   } else {
  //     return false;
  //   }
  // }

  private function oauthGetTweets($screenname,$options) {
    $key = $this->defaults['key'];
    $secret = $this->defaults['secret'];
    $token = $this->defaults['token'];
    $token_secret = $this->defaults['token_secret'];

    $cachename = $screenname."-".$this->getOptionsHash($options);

    $options = array_merge($options, array('screen_name' => $screenname, 'count' => 20));

    if (empty($key)) return array('error'=>'Missing Consumer Key - Check Settings');
    if (empty($secret)) return array('error'=>'Missing Consumer Secret - Check Settings');
    if (empty($token)) return array('error'=>'Missing Access Token - Check Settings');
    if (empty($token_secret)) return array('error'=>'Missing Access Token Secret - Check Settings');
    if (empty($screenname)) return array('error'=>'Missing Twitter Feed Screen Name - Check Settings');

    $connection = new TwitterOAuth($key, $secret, $token, $token_secret);
    $result = $connection->get('statuses/user_timeline', $options);

    // if (is_file($this->getCacheLocation())) {
    //   $cache = json_decode(file_get_contents($this->getCacheLocation()),true);
    // }
    //
    // if (!isset($result['errors'])) {
    //   $cache[$cachename]['time'] = time();
    //   $cache[$cachename]['tweets'] = $result;
    //   $file = $this->getCacheLocation();
    //   file_put_contents($file, json_encode($cache));
    // } else {
    //   if (is_array($results) && isset($result['errors'][0]) && isset($result['errors'][0]['message'])) {
    //     $last_error = '['.date('r').'] Twitter error: '.$result['errors'][0]['message'];
    //     $this->st_last_error = $last_error;
    //   } else {
    //     $last_error = '['.date('r').'] Twitter returned an invalid response. It is probably down.';
    //     $this->st_last_error = $last_error;
    //   }
    // }

    return $result;

  }

  // //check if cache needs update
  // $tp_twitter_plugin_last_cache_time = get_option('tp_twitter_plugin_last_cache_time');
  // $diff = time() - $tp_twitter_plugin_last_cache_time;
  // $crt = $instance['cachetime'] * 3600;
  //
  // //	yes, it needs update
  // if($diff >= $crt || empty($tp_twitter_plugin_last_cache_time)){
  //
  // if(!require_once('twitteroauth.php')){
  // 	echo '<strong>'.__('Couldn\'t find twitteroauth.php!','tp_tweets').'</strong>' . $after_widget;
  // 	return;
  // }
  //
  // function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  //   $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  //   return $connection;
  // }
  //
  // $connection = getConnectionWithAccessToken($instance['consumerkey'], $instance['consumersecret'], $instance['accesstoken'], $instance['accesstokensecret']);
  // $tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$instance['username']."&count=10&exclude_replies=".$instance['excludereplies']) or die('Couldn\'t retrieve tweets! Wrong username?');
  //
  // if(!empty($tweets->errors)){
  // 	if($tweets->errors[0]->message == 'Invalid or expired token'){
  // 		echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />' . __('You\'ll need to regenerate it <a href="https://apps.twitter.com/" target="_blank">here</a>!','tp_tweets') . $after_widget;
  // 	}else{
  // 		echo '<strong>'.$tweets->errors[0]->message.'</strong>' . $after_widget;
  // 	}
  // 	return;
  // }
  //
  // $tweets_array = array();
  // for($i = 0;$i <= count($tweets); $i++){
  // 	if(!empty($tweets[$i])){
  // 		$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
  //
  // 			//clean tweet text
  // 			$tweets_array[$i]['text'] = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $tweets[$i]->text);
  //
  // 		if(!empty($tweets[$i]->id_str)){
  // 			$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;
  // 		}
  // 	}
  // }
  //
	// //save tweets to wp option
	// update_option('tp_twitter_plugin_tweets',serialize($tweets_array));
	// update_option('tp_twitter_plugin_last_cache_time',time());
  //
	// echo '<!-- twitter cache has been updated! -->';
//}

}
