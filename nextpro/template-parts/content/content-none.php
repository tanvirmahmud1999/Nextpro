<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * */

?>
<section id="page-404" class="division">
	<div class="container">
		<div class="row justify-content-center">
			<!-- 404 PAGE TEXT -->
			<div class="col-md-9 col-lg-8">
				<div class="page-none-txt text-center pb-50">
					<?php if (is_home() && current_user_can('publish_posts')) : ?>

						<?php
						printf(
							'<p>' . wp_kses(
								/* translators: %s: Link to WP admin new post page. */
								__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'nextpro'),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url(admin_url('post-new.php'))
						);
						?>

					<?php elseif (is_search()) : ?>

						<p class="mb-5"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nextpro'); ?></p>
						<?php get_search_form(); ?>

					<?php else : ?>


						<?php //get_search_form(); 
						?>

					<?php endif; ?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</section><!-- .no-results -->