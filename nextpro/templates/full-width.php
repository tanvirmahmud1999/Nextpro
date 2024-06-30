<?php
/* 
Template Name: Full-width template 
*/

get_header();

get_template_part('template-parts/header/banner', get_post_type());
//get_template_part('template-parts/content/before', get_post_type());
?> 
		<?php
		if (have_posts()) :

			// Load posts loop.
			while (have_posts()) {
				the_post();

				get_template_part('template-parts/content/content', 'page');
			}


		else :

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content-none');

		endif; ?>
		
 
<?php
//get_template_part('template-parts/content/after', get_post_type());

// if (!is_front_page() || (function_exists('is_woocommerce') && is_woocommerce())) {
// 	get_template_part('template-parts/footer/cta');
// }
get_footer();
