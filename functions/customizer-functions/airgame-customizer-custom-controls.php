<?php

// This file sets up extensions of WP_Customize_Control that enable custom
// control types. These types are then referenced in the add_control sections of
// Customizer section setup files in functions/customizer-functions.

/*
*=============== [  Dropdown Select from NGP Form Pages  ]
*/

// if( class_exists( 'WP_Customize_Control' ) ):
	class Form_Pages_Dropdown_Control extends WP_Customize_Control {
		public $type = 'form_pages_dropdown';

		public function render_content() {

    // NOTE: This dropdown will only render form pages that have been published.

		$latest = new WP_Query( array(
			'post_type'   => 'ngp-form-pages',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'DESC'
		));

		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?>>
					<?php
					echo "<option value='' selected='selected' >Select a form...</option>";
					while( $latest->have_posts() ) {
						$latest->the_post();
						echo "<option value='" . get_permalink() . "'>" . the_title( '', '', false ) . "</option>";
					}
					?>
				</select>
			</label>
		<?php
		}
	}
// endif;

?>
