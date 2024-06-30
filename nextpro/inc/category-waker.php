<?php

class Custom_Walker_Category extends Walker_Category
{
    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {
        $separator = ',';
        $cat_name = esc_attr($category->name);
        $cat_name = apply_filters('list_cats', $cat_name, $category);

        $single_cat = is_single() ? '' : 'blog-one__tag';
        // Generate custom class
        $custom_class = ' ' . $single_cat . ' custom-category-' . $category->slug;

        $link = '<a href="' . esc_url(get_term_link($category)) . '" ';
        if ($args['use_desc_for_title'] == 0 || !empty($category->description)) {
            $link .= 'title="' . esc_attr(strip_tags($category->description)) . '"';
        }
        $link .= ' class="' . esc_attr($custom_class) . '"'; // Add custom class here
        $link .= '>';
        $link .= $cat_name . '<span class="separator">' . $separator . '</span></a>';

        if (!empty($args['show_count'])) {
            $link .= ' (' . number_format_i18n($category->count) . ')';
        }

        if ('list' == $args['style']) {
            $output .= "\t<li class=\"cat-item cat-item-" . $category->term_id . "\">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}
