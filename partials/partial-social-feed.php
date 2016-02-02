<?php require_once get_template_directory() . '/functions/airgame-social-feed-functions.php'; ?>

<div class="social-feed-wrapper">
	<div class="social-feed-slider">
		<ul>
			<?php if (isset( $slider_post_1 )) { ?>
				<li>
		      <div class="social-post">
		        <p class="social-text"><?php echo $slider_post_1['text']; ?></p>
		        <p class="social-time"><?php echo $slider_post_1_date; ?></p>
		      </div>
		    </li>
			<?php } ?>
			<?php if (isset( $slider_post_2 )) { ?>
				<li>
		      <div class="social-post">
		        <p class="social-text"><?php echo $slider_post_2['text']; ?></p>
		        <p class="social-time"><?php echo $slider_post_2_date; ?></p>
		      </div>
				</li>
			<?php } ?>
			<?php if (isset( $slider_post_3 )) { ?>
				<li>
		      <div class="social-post">
		        <p class="social-text"><?php echo $slider_post_3['text']; ?></p>
		        <p class="social-time"><?php echo $slider_post_3_date; ?></p>
		      </div>
				</li>
			<?php } ?>
			<?php if (isset( $slider_post_4 )) { ?>
		    <li>
		      <div class="social-post">
		        <p class="social-text"><?php echo $slider_post_4['text']; ?></p>
		        <p class="social-time"><?php echo $slider_post_4_date; ?></p>
		      </div>
		    </li>
			<?php } ?>
		</ul>
	</div>
</div>
