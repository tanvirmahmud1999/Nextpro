<?php

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 *
 * @param 	string 	$uri  Social link.
 * @param 	int    	$size The icon size in pixels.
 * @return 	string
 */
function nextpro_get_social_link_svg($uri, $size = 24) {
	return Nextpro\SVG_Icons::get_social_link_svg($uri, $size);
}

/**
 * Displays SVG icons in the footer navigation.
 *
 * @param 	string   	$item_output 	The menu item's starting HTML output.
 * @param 	WP_Post  	$item        	Menu item data object.
 * @param 	int      	$depth       	Depth of the menu. Used for padding.
 * @param 	stdClass 	$args        	An object of wp_nav_menu() arguments.
 * @return 	string		The menu item output with social icon.
 */
function nextpro_nav_menu_social_icons($item_output, $item, $depth, $args) {
	// Change SVG icon inside social links menu if there is supported URL.
	if (in_array($args->theme_location, ['social', 'footer_social'])) {
		$svg = nextpro_get_social_link_svg($item->url, 24);
		if (!empty($svg)) {
			$item_output = str_replace($args->link_before, $svg, $item_output);
		}
	}

	return $item_output;
}

add_filter('walker_nav_menu_start_el', 'nextpro_nav_menu_social_icons', 10, 4);

/**
 * Filters the arguments for a single nav menu item.
 *
 * @param 	stdClass $args  	An object of wp_nav_menu() arguments.
 * @param 	WP_Post  $item  	Menu item data object.
 * @param 	int      $depth 	Depth of menu item. Used for padding.
 * @return 	stdClass
 */
function nextpro_add_menu_description_args($args, $item, $depth) {
	if ('</span>' !== $args->link_after) {
		$args->link_after = '';
	}

	if (0 === $depth && isset($item->description) && $item->description) {
		// The extra <span> element is here for styling purposes: Allows the description to not be underlined on hover.
		$args->link_after = '<p class="menu-item-description"><span>' . $item->description . '</span></p>';
	}

	return $args;
}
add_filter('nav_menu_item_args', 'nextpro_add_menu_description_args', 10, 3);


// menu items filter
add_filter('wp_nav_menu_items', 'pd_logout_menu_link', 10, 2);
function pd_logout_menu_link($menu_items, $args) {
	if ($args->theme_location == 'topbar') {
		$menu_items .= nextpro_my_account_links();
	}
	return $menu_items;
}

// li > item classes
add_filter('nav_menu_css_class', 'nextpro_nav_menu_css_class', 10, 4);
function nextpro_nav_menu_css_class($classes, $menu_item, $args, $depth) {
	if ($depth == 0) {
		$classes[] = 'nav-item';
	}

	if (in_array('menu-item-has-children', $classes)) {
		$classes[] = 'dropdown-arrow';
		if ($depth > 0) {
			$classes[] = 'submenu';
			$classes[] = 'nav-item';
		}
	}
	return $classes;
}

// li > ul
add_filter('nav_menu_submenu_css_class', 'nextpro_nav_menu_submenu_css_class', 10, 3);
function nextpro_nav_menu_submenu_css_class($classes, $args, $depth) {
	$classes[] = 'dropdown_menu reset-ul';
	if ($depth == 0) {
		$classes[] = 'hover-menu reset-ul';
	}
	return $classes;
}

// Link Attr
add_filter('nav_menu_link_attributes', 'nextpro_nav_menu_link_attributes', 10, 4);
function nextpro_nav_menu_link_attributes($atts, $menu_item, $args, $depth) {

	$classes = [];
	if ($depth == 0) {
		$classes[] = '';
	}
	if ($depth > 0) {
		$classes[] = 'dropdown-item';
	}
	if (in_array('current-menu-item', $menu_item->classes)) {
		$classes[] = 'active';
	}
	if (in_array('menu-item-has-children', $menu_item->classes)) {
		$atts['data-bs-toggle'] = 'dropdown';
		$atts['aria-expanded'] = 'false';

		if ($depth > 0) {
			$classes[] = 'd-flex justify-content-between align-items-center';
		}
	}
	$atts['class'] = implode(' ', $classes);
	return $atts;
}



//nav_menu_item_title
// add_filter('nav_menu_item_title', 'nextpro_nav_menu_item_title', 10, 4);

// function nextpro_nav_menu_item_title($title, $menu_item, $args, $depth)
// {
// 	if (in_array('menu-item-has-children', $menu_item->classes)) {
// 		if ($depth == 0) {
// 			$title .= '<span class="dropdown-icon">
// 				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
// 					<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"></path>
// 				</svg>
// 			</span>';
// 		} else {
// 			$title .= '<span class="dropdown-icon">
// 			<i class="fa-light fa-angle-right"></i>
// 			</span>';
// 		}
// 	}

// 	return $title;
// }


//  Menu style select from rwmb_meta 

// function nextpro_filter_nav_menu($args)
// {
// 	if (is_page() && function_exists('rwmb_meta')) {
// 		$custom_menu = rwmb_meta('custom_menu');
// 		if (!empty($custom_menu) && !is_wp_error($custom_menu)) {
// 			$args['menu'] = $custom_menu;
// 		}
// 	}
// 	return $args;
// }
