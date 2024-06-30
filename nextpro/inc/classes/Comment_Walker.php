<?php

namespace Nextpro;

class Comment_Walker extends \Walker_Comment
{

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment($comment, $depth, $args)
	{

		$tag = ('div' === $args['style']) ? 'div' : 'li';

		$commenter          = wp_get_current_commenter();
		$show_pending_links = !empty($commenter['comment_author']);

		if ($commenter['comment_author_email']) {
			$moderation_note = esc_attr__('Your comment is awaiting moderation.', 'nextpro');
		} else {
			$moderation_note = esc_attr__('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'nextpro');
		}
?>
		<<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : 'blog-one__commentswrap__replycomments', $comment); ?>>

			<div class="author-thumbnail gap-3 d-flex">
				<?php
				// if (0 != $args['avatar_size']) {
				// 	echo get_avatar($comment, $args['avatar_size'], NULL, NULL, ['class' => 'rounded-circle']);
				// }
				if (0 != $args['avatar_size']) {
					$author_avatar_id = !empty($comment->user_id) ? $comment->user_id : $comment->comment_author_email;
					echo get_avatar($author_avatar_id, $args['avatar_size']);
				}
				?>
				<div class="comment-author vcard d-flex align-items-center gap-15">
					<!-- <div class="w-100"> -->

					<div class="comment-meta">
						<div class="comment-metadata ico-15">
							<?php
							$comment_author = get_comment_author_link($comment);

							if ('0' == $comment->comment_approved && !$show_pending_links) {
								$comment_author = get_comment_author($comment);
							}

							printf(
								/* translators: %s: Comment author link. */
								'<h6 class="author-name s-17 w-700">%s <span class="says">%s</span></h6>',
								sprintf('<b class="fn">%s</b>', $comment_author),
								esc_attr__('', 'nextpro')
							);
							?>
							<!-- Author Name -->
							<?php
							printf(
								'<span class="%s"><time datetime="%s">%s</time> - </span>',
								'comment-date',
								//esc_url(get_comment_link($comment, $args)),
								get_comment_time('c'),
								sprintf(
									/* translators: 1: Comment date, 2: Comment time. */
									esc_attr__('%1$s', 'nextpro'),
									get_comment_date('', $comment),
									//get_comment_time()
								)
							);
							?>
							<!-- comment-date -->
							<?php
							if ('1' == $comment->comment_approved || $show_pending_links) {
								comment_reply_link(
									array_merge(
										$args,
										array(
											'add_below' => 'div-comment',
											'depth'     => $depth,
											'max_depth' => $args['max_depth'],
											'before'    => '<span class="flaticon-reply-arrow ms-1"></span> <span class="reply btn-reply ico-20">',
											'after'     => '</span>',
										)
									)
								);
							}

							$edit_text = __('Edit', 'nextpro');
							if (current_user_can('edit_comment', $comment->comment_ID)) {
								edit_comment_link($edit_text, ' <span class="edit-link ms-2">', '</span>');
							}
							?>

						</div>
					</div>
					<!-- comment-meta -->
				</div>
			</div>
			<!-- thumb -->
			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body mb-30" data-id="<?php comment_ID(); ?>">

				<div class="comment-content">
					<?php if ('0' == $comment->comment_approved) : ?>
						<em class="review-awaiting-moderation comment-awaiting-moderation"><?php echo wp_kses_post($moderation_note); ?></em>
					<?php endif; ?>
					<?php comment_text(); ?>

				</div>
				<!-- .comment-content -->
			</div>
			<!-- .comment-body -->

	<?php
	}
}
