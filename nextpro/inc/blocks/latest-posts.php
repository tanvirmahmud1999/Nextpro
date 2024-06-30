<?php
remove_action('init', 'register_block_core_latest_posts');
/**
 * Server-side rendering of the `core/latest-posts` block.
 *
 * @package WordPress
 */

/**
 * The excerpt length set by the Latest Posts core block
 * set at render time and used by the block itself.
 *
 * @var int
 */
global $block_core_latest_posts_excerpt_length;
$block_core_latest_posts_excerpt_length = 0;

/**
 * Callback for the excerpt_length filter used by
 * the Latest Posts block at render time.
 *
 * @return int Returns the global $block_core_latest_posts_excerpt_length variable
 *             to allow the excerpt_length filter respect the Latest Block setting.
 */
function nextpro_block_core_latest_posts_get_excerpt_length()
{
	global $block_core_latest_posts_excerpt_length;
	return $block_core_latest_posts_excerpt_length;
}

/**
 * Renders the `core/latest-posts` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with latest posts added.
 */
function nextpro_render_block_core_latest_posts($attributes)
{
	global $post, $block_core_latest_posts_excerpt_length;

	$args = array(
		'posts_per_page'      => $attributes['postsToShow'],
		'post_status'         => 'publish',
		'order'               => $attributes['order'],
		'orderby'             => $attributes['orderBy'],
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	$block_core_latest_posts_excerpt_length = $attributes['excerptLength'];
	add_filter('excerpt_length', 'block_core_latest_posts_get_excerpt_length', 20);

	if (!empty($attributes['categories'])) {
		$args['category__in'] = array_column($attributes['categories'], 'id');
	}

	if (isset($attributes['selectedAuthor'])) {
		$args['author'] = $attributes['selectedAuthor'];
	}

	$query        = new WP_Query();
	$recent_posts = $query->query($args);

	if (isset($attributes['displayFeaturedImage']) && $attributes['displayFeaturedImage']) {
		update_post_thumbnail_cache($query);
	}

	$list_items_markup = '';

	foreach ($recent_posts as $post) {
		$post_link = esc_url(get_permalink($post));
		$title     = get_the_title($post);

		if (!$title) {
			$title = __('(no title)');
		}

		$list_items_markup .= '<div class="sidebar__posts__item d-flex align-items-center flex-wrap">';

		if ($attributes['displayFeaturedImage'] && has_post_thumbnail($post)) {

			$image_width = defined('FEATURED_IMAGE_WIDTH') ? FEATURED_IMAGE_WIDTH : 136;
			$image_height = defined('FEATURED_IMAGE_HEIGHT') ? FEATURED_IMAGE_HEIGHT : 85;


			$image_style = sprintf('max-width:%spx;', $image_width);
			$image_style .= sprintf('max-height:%spx; object-fit: cover;', $image_height);


			$image_classes = 'sidebar__posts__image';
			if (isset($attributes['featuredImageAlign'])) {
				$image_classes .= ' ' . $attributes['featuredImageAlign'];
			}


			$featured_image = get_the_post_thumbnail(
				$post,
				array($image_width, $image_height),
				array(
					'style' => esc_attr($image_style),
				)
			);
			if ($attributes['addLinkToFeaturedImage']) {

				$featured_image = sprintf(
					'<a href="%1$s" aria-label="%2$s">%3$s</a>',
					esc_url($post_link),
					esc_attr($title),
					$featured_image
				);
			}


			$list_items_markup .= sprintf(
				'<div class="%1$s">%2$s</div>',
				esc_attr($image_classes),
				$featured_image
			);
		}


		$list_items_markup .= '<div class="sidebar__posts__content">';

		$list_items_markup .= sprintf(
			'<p class="sidebar__posts__date"><span><i class="fa-regular fa-clock"></i></span> %1$s</p>',
			get_the_date('j F Y', $post)
		);

		$list_items_markup .= sprintf(
			'<h5 class="sidebar__posts__title"><a href="%1$s">%2$s</a></h5>',
			esc_url($post_link),
			$title
		);

		$list_items_markup .= '</div></div>';
	}

	remove_filter('excerpt_length', 'nextpro_block_core_latest_posts_get_excerpt_length', 20);

	$classes = array('sidebar__single', 'sidebar__single--recenttpost');

	$wrapper_attributes = get_block_wrapper_attributes(array('class' => implode(' ', $classes)));

	return sprintf(
		'<div %1$s>
			<div class="sidebar__posts sidebar__single__bg">%2$s</div>
		</div>',
		$wrapper_attributes,
		$list_items_markup
	);
}

/**
 * Registers the `core/latest-posts` block on server.
 */
function nextpro_register_block_core_latest_posts()
{
	register_block_type_from_metadata(
		ABSPATH . 'wp-includes/blocks/latest-posts',
		array(
			'render_callback' => 'nextpro_render_block_core_latest_posts',
		)
	);
}
add_action('init', 'nextpro_register_block_core_latest_posts');

/**
 * Handles outdated versions of the `core/latest-posts` block by converting
 * attribute `categories` from a numeric string to an array with key `id`.
 *
 * This is done to accommodate the changes introduced in #20781 that sought to
 * add support for multiple categories to the block. However, given that this
 * block is dynamic, the usual provisions for block migration are insufficient,
 * as they only act when a block is loaded in the editor.
 *
 * TODO: Remove when and if the bottom client-side deprecation for this block
 * is removed.
 *
 * @param array $block A single parsed block object.
 *
 * @return array The migrated block object.
 */
function nextpro_block_core_latest_posts_migrate_categories($block)
{
	if (
		'core/latest-posts' === $block['blockName'] &&
		!empty($block['attrs']['categories']) &&
		is_string($block['attrs']['categories'])
	) {
		$block['attrs']['categories'] = array(
			array('id' => absint($block['attrs']['categories'])),
		);
	}

	return $block;
}
add_filter('render_block_data', 'nextpro_block_core_latest_posts_migrate_categories');
