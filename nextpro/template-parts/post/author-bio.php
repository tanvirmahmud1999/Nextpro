<?php

/**
 * The template for displaying Author info
 *
 * @package WordPress
 * @subpackage Nextpro
 * @since Nextpro 1.0
 */

$display = get_theme_mod('display_post_single_author_bio', false);
if ((bool) get_the_author_meta('description') && get_post_type() == 'post' && $display) :
?>
	<div class="author-bio blog-one__single-post-authorwrap">
		<div class="blog-one__single-post-authorbg d-flex flex-wrap">
			<div class="blog-one__single-post-authorimg">
				<?php echo get_avatar(get_the_author_meta('ID'), 160, NULL, NULL, ['class' => 'border rounded-circle']); ?>
			</div>
			<div class="blog-one__single-post-authorinfo">
				<h4 class="blog-one__single-post-authorname">
					<?php
					printf(
						/* translators: %s: Post author. */
						__('%s', 'nextpro'),
						esc_html(get_the_author())
					);
					?>
				</h4>
				<p class="mb-3">
					<?php the_author_meta('description'); ?>
				</p><!-- .author-description -->
				<ul class="reset-ul footer__socialwrap d-flex">
					<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div><!-- .author-bio -->
	</div><!-- .author-bio -->
<?php
endif;
