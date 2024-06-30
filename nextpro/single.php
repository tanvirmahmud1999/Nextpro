<?php
get_header();

do_action('nextpro_content_before');
get_template_part('template-parts/header/banner', get_post_type());
get_template_part('template-parts/content/before', get_post_type());
?> 
	<?php

	if (have_posts()) :

		// Load posts loop.
		while (have_posts()) {
			the_post();
			get_template_part('template-parts/content/content-single', get_post_format());

			if (is_attachment()) {
				// Parent post navigation.
				the_post_navigation(
					array(
						/* translators: %s: Parent post link. */
						'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'nextpro'), '%title'),
					)
				);
			}

			// If comments are open or there is at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) {
				comments_template();
			}
		}


	else :

		// If no content, include the "No posts found" template.
		get_template_part('template-parts/content/content-none');

	endif;
	?> 
<?php
get_template_part('template-parts/content/after', get_post_type());

do_action('nextpro_content_after');

get_footer();
