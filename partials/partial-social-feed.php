<?php require_once get_template_directory() . '/functions/social-feed-functions/twitter-oauth/airgame-twitter-oauth-functions.php'; ?>

<div class="social-post">
  <p><?php echo $tweets['0']['text']; ?></p>
  <p><?php echo $tweets['0']['created_at']; ?></p>
</div>

<div class="social-post">
  <p><?php echo $tweets['1']['text']; ?></p>
  <p><?php echo $tweets['1']['created_at']; ?></p>
</div>

<div class="social-post">
  <p><?php echo $tweets['2']['text']; ?></p>
  <p><?php echo $tweets['2']['created_at']; ?></p>
</div>

<div class="social-post">
  <p><?php echo $tweets['3']['text']; ?></p>
  <p><?php echo $tweets['3']['created_at']; ?></p>
</div>
