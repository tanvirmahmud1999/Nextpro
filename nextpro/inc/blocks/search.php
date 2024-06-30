<?php
remove_action('init', 'register_block_core_search');
/**
 * Server-side rendering of the `core/search` block.
 *
 * @package WordPress
 */
/**
 * Dynamically renders the `core/search` block.
 *
 * @since 6.3.0 Using block.json `viewScript` to register script, and update `view_script_handles()` only when needed.
 *
 * @param array    $attributes The block attributes.
 * @param string   $content    The saved content.
 * @param WP_Block $block      The parsed block.
 *
 * @return string The search block markup.
 */
function nextpro_render_block_core_search($attributes)
{
    // Older versions of the Search block defaulted the label and buttonText
    // attributes to `__( 'Search' )` meaning that many posts contain `<!--
    // wp:search /-->`. Support these by defaulting an undefined label and
    // buttonText to `__( 'Search' )`.
    $attributes = wp_parse_args(
        $attributes,
        array(
            'label'      => __('Search', 'nextpro'),
            'buttonText' => __('Search', 'nextpro'),
        )
    );
    $input_id            = wp_unique_id('wp-block-search__input-');
    $classnames          = classnames_for_block_core_search($attributes);
    $show_label          = (!empty($attributes['showLabel'])) ? true : false;
    $use_icon_button     = (!empty($attributes['buttonUseIcon'])) ? true : false;
    $show_button         = (!empty($attributes['buttonPosition']) && 'no-button' === $attributes['buttonPosition']) ? false : true;
    $button_position     = $show_button ? $attributes['buttonPosition'] : null;
    $query_params        = (!empty($attributes['query'])) ? $attributes['query'] : array();
    $button              = '';
    $query_params_markup = '';
    $inline_styles       = styles_for_block_core_search($attributes);
    $color_classes       = get_color_classes_for_block_core_search($attributes);
    $typography_classes  = get_typography_classes_for_block_core_search($attributes);
    $is_button_inside    = !empty($attributes['buttonPosition']) &&
        'button-inside' === $attributes['buttonPosition'];
    // Border color classes need to be applied to the elements that have a border color.
    $border_color_classes = get_border_color_classes_for_block_core_search($attributes);
    // This variable is a constant and its value is always false at this moment.
    // It is defined this way because some values depend on it, in case it changes in the future.
    $open_by_default = false;
    $label_inner_html = empty($attributes['label']) ? __('Search', 'nextpro') : wp_kses_post($attributes['label']);
    $label = new WP_HTML_Tag_Processor(sprintf('<h3 %1$s>%2$s</h3>', $inline_styles['label'], $label_inner_html));

    if ($label->next_tag()) {
        $label->set_attribute('for', $input_id);
        $label->add_class('sidebar__title');
        if ($show_label && !empty($attributes['label'])) {
            if (!empty($typography_classes)) {
                $label->add_class($typography_classes);
            }
        } else {
            $label->add_class('screen-reader-text');
        }
    }

    $input         = new WP_HTML_Tag_Processor(sprintf('<input type="search" name="s" required %s/>', $inline_styles['input']));
    // Add the placeholder attribute to the $attributes array
    $attributes['placeholder'] = 'Type & Hit Enter';
    $input_classes = array('wp-block-search__input form-control');
    if (!$is_button_inside && !empty($border_color_classes)) {
        $input_classes[] = $border_color_classes;
    }
    if (!empty($typography_classes)) {
        $input_classes[] = $typography_classes;
    }
    if ($input->next_tag()) {
        $input->add_class(implode(' ', $input_classes));
        $input->set_attribute('id', $input_id);
        $input->set_attribute('value', get_search_query());
        $input->set_attribute('placeholder', $attributes['placeholder']);
        // If it's interactive, enqueue the script module and add the directives.
        $is_expandable_searchfield = 'button-only' === $button_position;
        if ($is_expandable_searchfield) {
            $suffix = wp_scripts_get_suffix();
            if (defined('IS_GUTENBERG_PLUGIN') && IS_GUTENBERG_PLUGIN) {
                $module_url = gutenberg_url('/build/interactivity/search.min.js');
            }
            wp_register_script_module(
                '@wordpress/block-library/search',
                isset($module_url) ? $module_url : includes_url("blocks/search/view{$suffix}.js"),
                array('@wordpress/interactivity'),
                defined('GUTENBERG_VERSION') ? GUTENBERG_VERSION : get_bloginfo('version')
            );
            wp_enqueue_script_module('@wordpress/block-library/search');
            $input->set_attribute('data-wp-bind--aria-hidden', '!context.isSearchInputVisible');
            $input->set_attribute('data-wp-bind--tabindex', 'state.tabindex');
            // Adding these attributes manually is needed until the Interactivity API
            // SSR logic is added to core.
            $input->set_attribute('aria-hidden', 'true');
            $input->set_attribute('tabindex', '-1');
        }
    }
    if (count($query_params) > 0) {
        foreach ($query_params as $param => $value) {
            $query_params_markup .= sprintf(
                '<input type="hidden" name="%s" value="%s" />',
                esc_attr($param),
                esc_attr($value)
            );
        }
    }
    if ($show_button) {
        $button_classes         = array('wp-block-search__button border-0 bg-transparent position-absolute top-50 end-0 translate-middle-y pe-4');
        $button_internal_markup = '';
        if (!empty($color_classes)) {
            $button_classes[] = $color_classes;
        }
        if (!empty($typography_classes)) {
            $button_classes[] = $typography_classes;
        }
        if (!$is_button_inside && !empty($border_color_classes)) {
            $button_classes[] = $border_color_classes;
        }
        if (!$use_icon_button) {
            if (!empty($attributes['buttonText'])) {
                $button_internal_markup = wp_kses_post($attributes['buttonText']);
            }
        } else {
            $button_classes[]       = 'has-icon';
            $button_internal_markup =
                '<svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M13 5c-3.3 0-6 2.7-6 6 0 1.4.5 2.7 1.3 3.7l-3.8 3.8 1.1 1.1 3.8-3.8c1 .8 2.3 1.3 3.7 1.3 3.3 0 6-2.7 6-6S16.3 5 13 5zm0 10.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z"></path>
                </svg>';
        }
        // Include the button element class.
        $button_classes[] = wp_theme_get_element_class_name('button');
        $button           = new WP_HTML_Tag_Processor(sprintf('<button type="submit" %s title="Search"><img src="' . get_template_directory_uri() . '/assets/images/shapes/search-icon.png" alt="nextmarketing"></button>', $inline_styles['button'], $button_internal_markup));
        if ($button->next_tag()) {
            $button->add_class(implode(' ', $button_classes));
            if ('button-only' === $attributes['buttonPosition']) {
                $button->set_attribute('data-wp-bind--aria-label', 'state.ariaLabel');
                $button->set_attribute('data-wp-bind--aria-controls', 'state.ariaControls');
                $button->set_attribute('data-wp-bind--aria-expanded', 'context.isSearchInputVisible');
                $button->set_attribute('data-wp-bind--type', 'state.type');
                $button->set_attribute('data-wp-on--click', 'actions.openSearchInput');
                // Adding these attributes manually is needed until the Interactivity
                // API SSR logic is added to core.
                $button->set_attribute('aria-label', __('Expand search field', 'nextpro'));
                $button->set_attribute('aria-controls', 'wp-block-search__input-1' . $input_id);
                $button->set_attribute('aria-expanded', 'false');
                $button->set_attribute('type', 'button');
            } else {
                $button->set_attribute('aria-label', wp_strip_all_tags($attributes['buttonText']));
            }
        }
    }
    $field_markup_classes = $is_button_inside ? $border_color_classes : '';
    $field_markup         = sprintf(
        '<div class="wp-block-search__inside-wrapper sidebar__search  position-relative %s" %s>%s</div>',
        esc_attr($field_markup_classes),
        $inline_styles['wrapper'],
        $input . $query_params_markup . $button
    );
    $wrapper_attributes   = get_block_wrapper_attributes(
        array('class' => $classnames)
    );
    $form_directives      = '';
    // If it's interactive, add the directives.
    if ($is_expandable_searchfield) {
        $aria_label_expanded  = __('Submit Search', 'nextpro');
        $aria_label_collapsed = __('Expand search field', 'nextpro');
        $form_context         = data_wp_context(
            array(
                'isSearchInputVisible' => $open_by_default,
                'inputId'              => $input_id,
                'ariaLabelExpanded'    => $aria_label_expanded,
                'ariaLabelCollapsed'   => $aria_label_collapsed,
            )
        );
        $form_directives      = '
         data-wp-interactive="core/search"'
            . $form_context .
            'data-wp-class--wp-block-search__searchfield-hidden="!context.isSearchInputVisible"
         data-wp-on--keydown="actions.handleSearchKeydown"
         data-wp-on--focusout="actions.handleSearchFocusout"
        ';
    }
    return sprintf(
        '<form role="search" method="get" action="%1s" %2s %3s>%4s</form>',
        esc_url(home_url('/')),
        $wrapper_attributes,
        $form_directives,
        $label . $field_markup
    );
}
/**
 * Registers the `core/search` block on the server.
 */
function nextpro_register_block_core_search()
{
    register_block_type_from_metadata(
        ABSPATH . 'wp-includes/blocks/search',
        array(
            'render_callback' => 'nextpro_render_block_core_search',
        )
    );
}
add_action('init', 'nextpro_register_block_core_search');
