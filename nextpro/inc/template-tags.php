<?php


/**
 * Custom template tags for this theme
 *
 * @package 	WordPress
 * @subpackage 	Nextpro
 */

if (!function_exists('nextpro_posted_on')) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @return void
	 */
	function nextpro_posted_on($human_time_diff = false, $class = '') {

		if ($human_time_diff) {
			$time_string = sprintf(esc_html__('%s ago', 'nextpro'), human_time_diff(get_the_time('U'), current_time('timestamp')));
		} else {
			$time_string = '<a href="#"><time class="entry-date published updated" datetime="%1$s">%2$s</time></a>';
			$time_string = sprintf(
				$time_string,
				esc_attr(get_the_date(DATE_W3C)),
				esc_html(get_the_date())
			);
		}


		echo '<p class="posted-on mb-0' . esc_attr($class) . '">';
		printf(
			/* translators: %s: Publish date. */
			esc_html__('%s', 'nextpro'),
			$time_string // phpcs:ignore WordPress.Security.EscapeOutput
		);
		echo '</p>';
	}
}

if (!function_exists('nextpro_posted_by')) {
	/**
	 * Prints HTML with meta information about theme author.
	 *
	 * @return void
	 */
	function nextpro_posted_by($class = '') {
		if (post_type_supports(get_post_type(), 'author')) {
			echo '<p class="byline mb-0">';
			printf(
				/* translators: %s: Author name. */
				esc_html__('%s', 'nextpro'),
				'<a class="' . esc_attr($class) . '" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
			);
			echo '</p>';
		}
	}
}


//nextpro_entry_meta_header
if (!function_exists('nextpro_entry_meta_header')) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function nextpro_entry_meta_header() {

		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}

		echo '<div class="entry-meta-header default-max-width d-flex flex-wrap gap-1 mb-10">';

		if (is_sticky()) {
			$sticky_text = get_theme_mod('sticky_text', 'Featured post');
			echo '<span class="badge bg-dark bg-opacity-10 text-dark">' . esc_html($sticky_text) . '</span>';
		}


		if (has_category() || has_tag()) {


			$categories_list = '<span class="post-categories">' . get_the_category_list('') . '</span>';
			if ($categories_list) {
				printf($categories_list);
			}
		}

		echo '</div>';
	}
}

//Single Post meta
if (!function_exists('nextpro_post_entry_meta')) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function nextpro_post_entry_meta() {

		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}

		echo '<ul class="reset-ul blog-one__meta flex-wrap">';
		echo '<li class="d-flex align-items-center gap-2">';
		// Posted on.
		echo get_avatar(get_the_author_meta('ID'), 38, '', '', array('class' => 'rounded-circle gap-2', 'width' => 38, 'height' => 38));
		nextpro_posted_by('p-sm mb-0');
		echo '</li>';

		//echo '<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>';

		if (has_category()) {
			echo '<li>';
			// Posted on.
			nextpro_get_categories();
			echo '</li>';
		}
		echo '<li>';
		// Posted on.
		nextpro_posted_on(false, ' mb-0 p-sm ');
		echo '</li>';

		// Edit post link.
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. Only visible to screen readers. */
				esc_html__('Edit %s', 'nextpro'),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			),
			'<li class="edit-link"><p class="p-sm mb-0 edit-link">',
			'</p></li>'
		);

		echo '</ul>';
		// Post Reading time 
		echo '<p class="blog-one__post-time">';
		nextpro_display_reading_time();
		echo '</p>';
	}
}


/* post reading time */
function get_reading_time() {
	$content = get_post_field('post_content', get_the_ID());
	$word_count = str_word_count(strip_tags($content));
	$reading_time = ceil($word_count / 200); // Average reading speed of 200 words per minute
	return $reading_time;
}

if (!function_exists('nextpro_display_reading_time')) {
	function nextpro_display_reading_time() {
		$reading_time = get_reading_time();
		printf(_n('%d min read', '%d minutes read', $reading_time, 'nextpro'), $reading_time);
	}
}
// Remove Auto P tag
remove_action("term_description", "wpautop");


//nextpro_entry_meta_footer
if (!function_exists('nextpro_entry_meta_footer')) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function nextpro_entry_meta_footer() {

		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}

		// Hide meta information on pages.
		if (!is_singular('post')) {

			echo '<ul class="post-meta-list ico-10">';
			echo '<li>';
			// Posted on.
			nextpro_posted_by('p-sm w-500');
			echo '</li>';

			echo '<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>';

			echo '<li>';
			// Posted on.
			nextpro_posted_on(false, 'p-sm');
			echo '</li>';

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__('Edit %s', 'nextpro'),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li><li class="edit-link"><p class="p-sm edit-link">',
				'</p></li>'
			);

			echo '</ul>';
		} else {


			if (has_tag()) {

				echo '<div class="post-taxonomies d-grid gap-20">';

				$tags_list = get_the_tag_list();
				if ($tags_list) {
					printf(
						/* translators: %s: List of tags. */
						'<div class="tags-links tagcloud pb-50 pt-30">%s</div>',
						$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
					);
				}
				echo '</div>';
			}
		}
	}
}


//blog grid post meta 
if (!function_exists('nextpro_post_category_list')) {
	function nextpro_post_meta_list() {
		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}

		echo '<ul class="blog-one__meta reset-ul">';
		echo '<li>';
		// Posted on.
		nextpro_posted_by('p-sm');
		echo '</li>';

		//echo '<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>';

		echo '<li>';
		// Posted on.
		nextpro_posted_on(false, 'p-sm mb-0');
		echo '</li>';

		// Edit post link.
		edit_post_link(
			sprintf(
				/* translators: %s: Post title. Only visible to screen readers. */
				esc_html__('Edit %s', 'nextpro'),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			),
			'<li class="edit-link"><p class="p-sm mb-0 edit-link">',
			'</p></li>'
		);

		echo '</ul>';
	}
}
?>
<?php
//Post Tagcloud
if (!function_exists('nextpro_post_tagcloud')) {
	function nextpro_post_tagcloud() {
		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}

		if (has_tag()) {

			echo '<div class="post-taxonomies wp-block-tag-cloud d-flex flex-wrap">';

			$tags_list = get_the_tag_list();
			if ($tags_list) {
				printf(
					/* translators: %s: List of tags. */
					'<p class="blog-one__stheading">Tags:</p> <div class="tags-links tagcloud pb-50 pt-30"> %s</div>',
					$tags_list // phpcs:ignore WordPress.Security.EscapeOutput
				);
			}
			echo '</div>';
		}
	}
}

// 
add_filter("term_links-post_tag", 'nextpro_add_tag_class');
function nextpro_add_tag_class($links) {
	return str_replace('<a href="', '<a class="tag text-decoration-none tag-cloud-link" href="', $links);
}


//Post Single Footer meta
if (!function_exists('nextpro_meta_single_footer')) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 * Footer entry meta is displayed differently in archives and single posts.
	 *
	 * @return void
	 */
	function nextpro_meta_single_footer() {

		// Early exit if not a post.
		if ('post' !== get_post_type()) {
			return;
		}


		// Hide meta information on pages.
		if (is_single()) {

			echo '<ul class="post-meta-list ico-10">';
			echo '<li>';
			// Posted on.
			nextpro_posted_by('p-sm w-500');
			echo '</li>';

			echo '<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>';

			echo '<li>';
			// Posted on.
			nextpro_posted_on(false, 'p-sm');
			echo '</li>';

			// Edit post link.
			edit_post_link(
				sprintf(
					/* translators: %s: Post title. Only visible to screen readers. */
					esc_html__('Edit %s', 'nextpro'),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li><li class="edit-link"><p class="p-sm edit-link">',
				'</p></li>'
			);

			echo '</ul>';
		}
	}
}

//Categories
if (!function_exists('nextpro_get_categories')) :
	/**
	 * Get account endpoint URL.
	 *
	 * @param 	string 	$separator 	(optional)
	 * @return 	string	$taxonomy	category
	 * @param 	boolean	$echo		true
	 * 
	 * @return	string	
	 * 
	 */
	function nextpro_get_categories($separator = '', $taxonomy = 'category', $echo = true) {

		// Get the term IDs assigned to post.
		$post_terms = wp_get_object_terms(get_the_ID(), $taxonomy, array('fields' => 'ids'));

		if (!empty($post_terms) && !is_wp_error($post_terms)) {

			$term_ids = implode(', ', $post_terms);

			$terms = wp_list_categories(array(
				'title_li' => '',
				'style'    => 'none',
				'echo'     => false,
				'show_count'          => 0,
				'walker' => new Custom_Walker_Category(),
				'taxonomy' => $taxonomy,
				'include'  => $term_ids
			));
			$single_cat = is_single() ? 'post-category-separation' : '';
			$terms = rtrim(trim(str_replace('<br />',  $separator, $terms)), $separator);
			if (empty($separator)) {
				$terms = '<div class="post-categories ' . $single_cat . ' d-flex flex-wrap gap-1">' . $terms . '</div>';
			} else {
				$terms = '<div class="post-categories ' . $single_cat . '">' . $terms . '</div>';
			}


			// Display post categories.
			if ($echo) {
				echo wp_kses_post($terms);
			} else {
				return $terms;
			}
		}
	}
endif;

function wpse_the_category_list($categories, $post_id) {
	return array_slice($categories, 0, 2, true);
}
add_filter('the_category_list', 'wpse_the_category_list', 10, 2);

//Post Thumbnail
if (!function_exists('nextpro_post_thumbnail')) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @return void
	 */
	function nextpro_post_thumbnail() {
		if (!nextpro_can_show_post_thumbnail()) {
			return;
		}
?>

		<?php if (is_singular()) : ?>

			<figure class="post-thumbnail mx-auto  blog-one__innerimg mb-4 mb-lg-5">
				<?php
				// Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
				the_post_thumbnail('nextpro-1320x670-cropped', array('class' => 'img-fluid', 'loading' => false));
				?>
				<?php if (wp_get_attachment_caption(get_post_thumbnail_id())) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail mb-20">
				<a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>
				</a>
				<?php if (wp_get_attachment_caption(get_post_thumbnail_id())) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post(wp_get_attachment_caption(get_post_thumbnail_id())); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
<?php
	}
}

//Posts pagination
if (!function_exists('nextpro_the_posts_navigation')) {
	/**
	 * Print the next and previous posts navigation.
	 *
	 * @return void
	 */
	function nextpro_the_posts_navigation() {
		the_posts_pagination(
			array(
				'before_page_number' => '',
				'mid_size'           => 2,
				'prev_text'          => sprintf(
					'<span class="nav-prev-text">%s<span class="screen-reader-text">%s</span></span>',
					nextpro_get_icon_svg('ui', 'arrow_left'), // Icon for left arrow
					wp_kses(
						get_theme_mod('pagination_prev_text', 'Older posts'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					)
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s<span class="screen-reader-text">%s</span></span>',
					nextpro_get_icon_svg('ui', 'arrow_right'), // Icon for right arrow
					wp_kses(
						get_theme_mod('pagination_next_text', 'Next posts'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					)
				),
			)
		);
	}
}


//Single Posts Navigation
add_filter('navigation_markup_template', function ($template) {
	$template = '
	<nav class="px-3 blog-one--single border-0 d-flex flex-column flex-lg-row justify-content-lg-between pt-lg-4 mt-4 mt-lg-5 mb-4 mb-lg-5 pb-4 pb-lg-5 gap-2 %1$s" aria-label="%4$s">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links theme-pagination numeric-pagination d-lg-flex gap-2  w-100 ms-auto">%3$s</div>
	</nav>';
	return $template;
});

//My Account Links
function nextpro_my_account_links() {
	if (!function_exists('control_listings_user_dashboard_url')) return;


	if (!is_user_logged_in()) {
		$link_options = [
			[
				'text' => esc_attr__('Sign up', 'nextpro'),
				'url' => '#citikidRegisterModal',
				'class' => '',
				'attributes' => ['data-bs-toggle="modal"']
			],
			[
				'text' => esc_attr__('Login', 'nextpro'),
				'url' => '#citikidLoginModal',
				'class' => 'text-primary',
				'attributes' => ['data-bs-toggle="modal"']
			],
		];
	} else {
		$link_options = [
			[
				'text' => esc_attr__('My Account', 'nextpro'),
				'url' => control_listings_user_dashboard_url(),
				'class' => ''
			],
			[
				'text' => esc_attr__('Log Out', 'nextpro'),
				'url' => wp_logout_url(get_permalink()),
				'class' => ''
			]
		];
	}
	$args = [
		'options' => $link_options,
	];
	return nextpro_formatting_list_html($args);
}

add_action('wp_footer', 'nextpro_load_modal_template');
function nextpro_load_modal_template() {
	if (!is_user_logged_in()) :
		get_template_part('template-parts/modal', 'login');
		get_template_part('template-parts/modal', 'register');
		get_template_part('template-parts/modal', 'lost-password');
	endif;
}


// placeholder
function nextpro_custom_thumbnail_attributes($attr, $attachment, $size) {
	// Get the actual image URL
	$data_src = wp_get_attachment_image_url($attachment->ID, $size);

	// Set the placeholder image as the src
	$attr['src'] = get_template_directory_uri() . '/assets/images/placeholder.svg';

	// Add data-src attribute
	$attr['data-src'] = $data_src;

	// Add class for lazy loading
	if (isset($attr['class'])) {
		$attr['class'] .= ' img-fluid';
	} else {
		$attr['class'] = 'img-fluid';
	}

	return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'nextpro_custom_thumbnail_attributes', 10, 3);
