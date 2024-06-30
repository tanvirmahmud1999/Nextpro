<?php
add_filter('comment_form_fields', 'bootstrap_comment_form_fields');
function bootstrap_comment_form_fields($comment_fields) {
	$req   = get_option('require_name_email');
	$commenter     = wp_get_current_commenter();
	$html5 = 'html5';
	// Define attributes in HTML5 or XHTML syntax.
	$required_attribute = ($html5 ? ' required' : ' required="required"');
	$checked_attribute  = ($html5 ? ' checked' : ' checked="checked"');

	$required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();

	//Author
	$comment_fields['author'] = sprintf(
		'<div class="row"><p class="comment-form-author col-lg-6">%s %s</p>',
		sprintf(
			'<label class="d-none" for="author">%s%s</label>',
			esc_attr__('Name', 'nextpro'),
			($req ? $required_indicator : '')
		),
		sprintf(
			'<input id="author" name="author" class="form-control mb-1"  placeholder="' . esc_attr_x('Your Name *', 'Name placeholder', 'nextpro') . '" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
			esc_attr($commenter['comment_author']),
			($req ? $required_attribute : '')
		)
	);
	// Email
	$comment_fields['email'] = sprintf(
		'<p class="comment-form-email col-lg-6">%s %s</p> </div>',
		sprintf(
			'<label class="d-none" for="email">%s%s</label>',
			esc_attr__('Email', 'nextpro'),
			($req ? $required_indicator : '')
		),
		sprintf(
			'<input id="email" name="email" %s value="%s" class="form-control mb-1"  placeholder="' . esc_attr_x('Your Email *', 'Email placeholder', 'nextpro') . '" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
			($html5 ? 'type="email"' : 'type="text"'),
			esc_attr($commenter['comment_author_email']),
			($req ? $required_attribute : '')
		)
	);
	// Comment
	$comment_fields['comment'] = sprintf(
		'<p class="comment-form-comment">%s %s</p>',
		sprintf(
			'<label class="d-none" for="comment">%s%s</label>',
			esc_attr_x('Comment', 'noun', 'nextpro'),
			$required_indicator
		),
		'<textarea id="comment" name="comment" placeholder="' . esc_attr_x('Write your Comment *', 'Comment placeholder', 'nextpro') . '" class="form-control mb-1" cols="45" rows="8" maxlength="65525"' . $required_attribute . '></textarea>'
	);
	// Url
	$comment_fields['url'] = sprintf(
		'<p class="comment-form-url d-none">%s %s</p>',
		sprintf(
			'<label class="d-none" for="url">%s</label>',
			esc_attr__('Website', 'nextpro'),
		),
		sprintf(
			'<input id="url" name="url" %s value="%s" class="form-control"  placeholder="' . esc_attr_x('Your website url', 'website placeholder', 'nextpro') . '" size="30" maxlength="200" autocomplete="url" />',
			($html5 ? 'type="url"' : 'type="text"'),
			esc_attr($commenter['comment_author_url'])
		)
	);
	// cookies
	if (has_action('set_comment_cookies', 'wp_set_comment_cookies') && get_option('show_comments_cookies_opt_in')) {
		$consent = empty($commenter['comment_author_email']) ? '' : $checked_attribute;

		$comment_fields['cookies'] = sprintf(
			'<p class="comment-form-cookies-consent align-items-center gap-2 d-flex  justify-content-lg-end">%s %s</p>',
			sprintf(
				'<input id="wp-comment-cookies-consent" class="" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
				$consent
			),
			sprintf(
				'<label clas="order-lg-0" for="wp-comment-cookies-consent">%s</label>',
				__('Save my name, email, and website in this browser for the next time I comment.')
			)
		);
	}
	return $comment_fields;
}


add_filter('comment_form_defaults', 'bootstrap_comment_form_defaults');
function bootstrap_comment_form_defaults($defaults) {
	$defaults['class_submit'] = 'submit btn next-marketing-btn dark-btn ms-auto';

	// logged out user before
	$defaults['comment_notes_before'] = $defaults['comment_notes_before'] . '<div class="row"><div class="col-12">';
	// logged in user before
	$defaults['logged_in_as'] = $defaults['logged_in_as'] . '<div class="row"><div class="col-12">';

	$defaults['submit_field'] = '</div></div>' . $defaults['submit_field'];

	$defaults = array(
		'comment_notes_after'  => '',
		'action'               => site_url('/wp-comments-post.php'),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_container'      => 'comment-respond blog-one__comment-form',
		'class_form'           => 'comment-form',
		'class_submit'         => 'btn next-marketing-btn dark-btn ms-auto',
		'name_submit'          => 'submit',
		'title_reply'          => esc_attr__('Leave a comment', 'nextpro'),
		/* translators: %s: Author of the comment being replied to. */
		'title_reply_to'       => esc_attr__('Leave a Reply to %s', 'nextpro'),
		'title_reply_before'   => '<h5 id="reply-title" class="leave-comment">',
		'title_reply_after'    => '</h5>',
		'cancel_reply_before'  => ' <small class="cancel-comment-reply">',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => esc_attr__('Cancel Reply', 'nextpro'),
		'label_submit'         => esc_attr__('Submit', 'nextpro'),
		'submit_field'         => '<p class="form-submit mt-20 ">%1$s %2$s</p>  ',
		'format'               => 'xhtml',
	);

	return $defaults;
}



//////////////////// Comments ///////////////////
// comment depth
add_filter('comment_class', 'nextpro_comment_class');
function nextpro_comment_class($classes) {
	if (!in_array('depth-1', $classes)) {
		$classes[] = 'blog-one__commentswrap__replycomments';
		$classes[] = 'mt-4';
	} else {
		$classes[] = 'mb-4 mt-4';
	}
	return $classes;
}
// Comments List
function nextpro_comment($comment, $args, $depth) {
	if ('div' === $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo $tag; ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID() ?>">
		<?php if ('div' != $args['style']) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
			<div class="comment-author blog-one__commentswrap__commentmain d-flex">
				<!-- author thumbnail -->
				<div class="blog-one__commentswrap__authorimg">
					<?php
					if (0 != $args['avatar_size']) {
						$author_avatar_id = !empty($comment->user_id) ? $comment->user_id : $comment->comment_author_email;
						echo get_avatar($author_avatar_id, $args['avatar_size'], '', '', array('class' => 'img-fluid'));
					}
					?>
				</div>
				<div class="blog-one__commentswrap__comments w-100">
					<div>
						<!-- get_comment_author_link -->
						<?php printf(__('<div><h6 class="fw-semibold mb-0">%s</h6></div>'), get_comment_author_link()); ?>
						<!-- comment date -->
						<div class="comment-meta d-flex gap-2">
							<small class="fs-6 mb-2 d-block">
								<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
									<?php
									/* translators: 1: date, 2: time */
									printf(
										__('%1$s'),
										get_comment_date(),
									); ?>
								</a>
							</small>
							<small class="fs-6 mb-2 d-block"><?php edit_comment_link(__('(Edit)'), '  ', ''); ?></small>
						</div>

						<!-- comment_text -->
						<?php comment_text(); ?>
						<!-- reply -->
						<div class="fw-semibold mb-0 blog-one__commentswrap__reply">
							<?php
							comment_reply_link(
								array_merge(
									$args,
									array(
										'add_below' => $add_below,
										'depth'     => $depth,
										'max_depth' => $args['max_depth']
									)
								)
							); ?>
						</div>
					</div>
				</div>

			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em><br />
			<?php endif ?>
			<?php
			if ('div' != $args['style']) : ?>
			</div>
	<?php endif;
		}
