<?php

remove_action('init', 'register_block_core_archives');
/**
 * Server-side rendering of the `core/archives` block.
 *
 * @package WordPress
 */

/**
 * Renders the `core/archives` block on server.
 *
 * @see WP_Widget_Archives
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with archives added.
 */
function nextpro_render_block_core_archives($attributes)
{
	$show_post_count = !empty($attributes['showPostCounts']);
	$type            = isset($attributes['type']) ? $attributes['type'] : 'monthly';

	$class = 'wp-block-archives-list reset-ul sidebar__nav';

	if (!empty($attributes['displayAsDropdown'])) {

		$class = 'wp-block-archives-dropdown sidebar__single__inner sidebar__single__bg';

		$dropdown_id = wp_unique_id('wp-block-archives-');
		$title       = __('Archives');

		/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
		$dropdown_args = apply_filters(
			'widget_archives_dropdown_args',
			array(
				'type'            => $type,
				'format'          => 'option',
				'show_post_count' => $show_post_count,
			)
		);

		$dropdown_args['echo'] = 0;

		$archives = wp_get_archives($dropdown_args);

		$wrapper_attributes = get_block_wrapper_attributes(array('class' => $class));

		switch ($dropdown_args['type']) {
			case 'yearly':
				$label = __('Select Year');
				break;
			case 'monthly':
				$label = __('Select Month');
				break;
			case 'daily':
				$label = __('Select Day');
				break;
			case 'weekly':
				$label = __('Select Week');
				break;
			default:
				$label = __('Select Post');
				break;
		}

		$show_label = empty($attributes['showLabel']) ? ' screen-reader-text' : '';

		$block_content = '<label for="' . $dropdown_id . '" class="wp-block-archives__label d-none' . $show_label . '">' . esc_html($title) . '</label>
		<select id="' . $dropdown_id . '" name="archive-dropdown" class="form-select form-select-lg py-3" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value="">' . esc_html($label) . '</option>' . $archives . '</select>';

		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			$block_content
		);
	}

	/** This filter is documented in wp-includes/widgets/class-wp-widget-archives.php */
	$archives_args = apply_filters(
		'widget_archives_args',
		array(
			'type'            => $type,
			'show_post_count' => $show_post_count,
		)
	);

	$archives_args['echo'] = 0;

	$archives = wp_get_archives($archives_args);

	$wrapper_attributes = get_block_wrapper_attributes(array('class' => $class));

	if (empty($archives)) {
		return sprintf(
			'<div %1$s>%2$s</div>',
			$wrapper_attributes,
			__('No archives to show.')
		);
	}

	return sprintf(
		'<div class="sidebar__single__inner sidebar__single__bg"><ul %1$s>%2$s</ul></div>',
		$wrapper_attributes,
		$archives
	);
}

/**
 * Register archives block.
 */
function nextpro_register_block_core_archives()
{
	register_block_type_from_metadata(
		ABSPATH . 'wp-includes/blocks/archives',
		array(
			'render_callback' => 'nextpro_render_block_core_archives',
		)
	);
}
add_action('init', 'nextpro_register_block_core_archives');