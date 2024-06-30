<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Nextpro
 * @since Nextpro 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

$nextpro_comment_count = get_comments_number();
?>

<div id="comments" class="comments-area leave-comment blog-one__comment-form post-comments <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">
	<div class="comments-wrapper">
		<?php
		if (have_comments()) :
		?>

			<h3 class="comments-title blog-one__commentswrap__heading">
				<?php if ('1' === $nextpro_comment_count) : ?>
					<?php printf(esc_html__('1 comment on "%s"', 'nextpro'), get_the_title()); ?>
				<?php else : ?>
					<?php
					printf(
						/* translators: %s: Comment count number. */
						esc_html(_nx('%s comment on "%s"', 'comments ( %s ) on "%s"', $nextpro_comment_count, 'Comments title', 'nextpro')),
						esc_html(number_format_i18n($nextpro_comment_count)),
						get_the_title()
					);
					?>
				<?php endif; ?>
			</h3><!-- .comments-title -->

			<div class="comment-list pb-3 pb-lg-5">
				<?php
				wp_list_comments([
					'style' => 'div',
					'avatar_size' => 100,
					'depth' => 2,
					'callback' => 'nextpro_comment'
				]);
				?>

			</div><!-- .comment-list -->

			<?php
			the_comments_pagination(
				array(
					'before_page_number' => esc_html__('Page', 'nextpro') . ' ',
					'mid_size'           => 0,
					'prev_text'          => sprintf(
						'%s <span class="nav-prev-text">%s</span>',
						is_rtl() ? nextpro_get_icon_svg('ui', 'arrow_right') : nextpro_get_icon_svg('ui', 'arrow_left'),
						esc_html__('Older comments', 'nextpro')
					),
					'next_text'          => sprintf(
						'<span class="nav-next-text">%s</span> %s',
						esc_html__('Newer comments', 'nextpro'),
						is_rtl() ? nextpro_get_icon_svg('ui', 'arrow_left') : nextpro_get_icon_svg('ui', 'arrow_right')
					),
				)
			);
			?>

			<?php if (!comments_open()) : ?>
				<p class="no-comments"><?php esc_html_e('Comments are closed.', 'nextpro'); ?></p>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		comment_form(
			array(
				'title_reply'        => esc_html__('Write a Comment', 'nextpro'),
				'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title blog-inner-heading mb-3 mb-lg-4 d-flex gap-3 pt-2 pt-lg-3">',
				'title_reply_after'  => '</h4>',
				'class_container' => 'comment-respond blog-one__comment-form pt-3 pt-lg-5 mb-5 border-top mb-5',
				'submit_field'         => '<p class="form-submit text-lg-end mb-0">%1$s %2$s</p>',
			)
		);
		?>

	</div><!-- #comments-wrapper -->
</div><!-- #comments -->