<?php

/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$nextpro_unique_id = wp_unique_id('search-form-');
$nextpro_aria_label = !empty($args['aria_label']) ? 'aria-label="' . esc_attr($args['aria_label']) . '"' : '';
?>

<div class="sidebar__single sidebar__single--searchsingle col-lg-9 mx-auto">
	<div class="sidebar__single__inner">
		<form class="sidebar__search position-relative" role="search" <?php echo nextpro_return_data($nextpro_aria_label); ?> method="get" action="<?php echo esc_url(home_url('/')); ?>">
			<label class="screen-reader-text" <?php echo esc_attr($nextpro_unique_id); ?>><?php _e('Search&hellip;', 'nextpro'); ?></label>

			<input type="text" class="form-control" placeholder="Enter text here" id="<?php echo esc_attr($nextpro_unique_id); ?>" value="<?php echo get_search_query(); ?>" name="s">
			<!-- <div class="section-hero__field-bd-effect"></div> -->
			<button class="btn search-submit p-0 position-absolute top-0 bottom-0" type="submit" aria-label="search submit">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shapes/search-icon.png" alt="nextmarketing">
			</button>

		</form>
	</div>
</div>