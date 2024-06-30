<?php
/*
control header
*/

function nextpro_get_custom_logo($customizer_id = 'custom_logo', $default = 'images/logo-next.png', $blog_id = 0) {
	$html          = '';
	$switched_blog = false;

	if (is_multisite() && !empty($blog_id) && get_current_blog_id() !== (int) $blog_id) {
		switch_to_blog($blog_id);
		$switched_blog = true;
	}

	$has_custom_logo = nextpro_get_logo_uri($customizer_id);

	if ($has_custom_logo) {
		$html = sprintf(
			'<img src="%s" alt="%s" width="%s" />',
			nextpro_get_logo_uri($customizer_id),
			esc_attr(get_bloginfo('name', 'display')),
			intval(get_theme_mod('logo_width', 163))
		);
	} else {
		$html = sprintf(
			'<img src="%s" alt="%s" width="%s" />',
			NEXTPRO_ASSETS . '/' . $default,
			esc_attr(get_bloginfo('name', 'display')),
			intval(get_theme_mod('logo_width', 163))
		);
	}



	if ($switched_blog) {
		restore_current_blog();
	}

	/**
	 * Filters the custom logo output.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	return apply_filters('nextpro_get_custom_logo', $html, $blog_id);
}

if (!function_exists('nextpro_get_logo_uri')) :
	function nextpro_get_logo_uri($customizer_id = 'custom_logo') {
		$logo_uri = false;

		$attachment_id = get_theme_mod($customizer_id);
		$custom_logo_uri = wp_get_attachment_image_url($attachment_id, 'full');

		if (!empty($custom_logo_uri) && !is_wp_error($custom_logo_uri)) {
			$logo_uri = $custom_logo_uri;
		}

		return $logo_uri;
	}
endif;

if (!function_exists('nextpro_theme_mod_image_uri')) :
	function nextpro_theme_mod_image_uri($customizer_id, $static_image = 'assets/images/logo.png', $size = 'full') {

		$image_uri = get_theme_file_uri($static_image);


		$custom_image_id = get_theme_mod($customizer_id);
		$image = wp_get_attachment_image_src($custom_image_id,  $size);

		if (empty($image[0]) || is_wp_error($image)) return $image_uri;

		$image_uri = $image[0];

		return $image_uri;
	}
endif;

// if (!function_exists('nextpro_myaccount_link')) :
// 	function nextpro_myaccount_link()
// 	{
// 		if (!is_user_logged_in()) {
// 			$myaccount_url = wp_login_url(get_permalink());
// 		} else {
// 			$myaccount_url = admin_url('profile.php');
// 		}

// 		if (function_exists('WC') && !empty(get_option('woocommerce_myaccount_page_id'))) {
// 			$myaccount_url = wc_get_page_permalink('myaccount');
// 		}
// 		return $myaccount_url;
// 	}
// endif;

// if (!function_exists('nextpro_logout_link')) :
// 	function nextpro_logout_link()
// 	{
// 		$logout_url = wp_login_url('/');
// 		if (function_exists('WC') && !empty(get_option('woocommerce_myaccount_page_id'))) {
// 			$logout_url = wc_logout_url();
// 		}
// 		return $logout_url;
// 	}
// endif;

function nextpro_display_attributes_filter($attribs, $types) {
	$extra_attribs = array('class' => array('breadcrumb-item'));

	//For the current item we need to add a little more info
	if (is_array($types) && in_array('current-item', $types)) {
		$extra_attribs['class'][] = 'active';
		$extra_attribs['aria-current'] = array('page');
	}

	$atribs_array = array();
	preg_match_all('/([a-zA-Z]+)=["\']([a-zA-Z0-9\-\_ ]*)["\']/i', $attribs, $matches);
	if (isset($matches[1])) {
		foreach ($matches[1] as $key => $tag) {
			if (isset($matches[2][$key])) {
				$atribs_array[$tag] = explode(' ', $matches[2][$key]);
			}
		}
	}

	$merged_attribs = array_merge_recursive($atribs_array, $extra_attribs);
	$output = '';
	foreach ($merged_attribs as $tag => $vals) {
		$output .= sprintf(' %1$s="%2$s"', $tag, implode(' ', $vals));
	}

	return $output;
}
add_filter('bcn_display_attributes', 'nextpro_display_attributes_filter', 10, 2);

/**
 * Retrieves an array of the class names for the header element.
 *
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function nextpro_get_header_class($class = '') {
	global $wp_query;
	$classes = array('header-section');

	$tra_header = false;
	$sticky_header = get_theme_mod('sticky_navbar', false);
	if (is_singular()) {
		$post_id   = $wp_query->get_queried_object_id();
		$post      = $wp_query->get_queried_object();

		if (is_page()) {
			$page_id = $wp_query->get_queried_object_id();
			$tra_header = get_post_meta($page_id, 'tra_header', true);
		}
	}


	$header_bg =  get_theme_mod('header_bg_color', 'bg-transparent');
	$header_bg =  $tra_header ? 'bg-tra' : $header_bg;
	$classes[] = $header_bg;
	$classes[] = str_replace('bg-', '', $header_bg) . '-menu ';

	$navbar_style = 'navbar-dark';
	if (in_array('bg-tra', $classes)) {
		$navbar_style = get_theme_mod('navbar_style', 'navbar-dark');
		if (is_page()) {
			$page_id = $wp_query->get_queried_object_id();
			$navbar_style = get_post_meta($page_id, 'navbar_style', true);
		}
	}
	$classes[] = $navbar_style;


	$classes[] = $sticky_header ? 'section-header' : 'section-header-sticky-off';

	if (!empty($class)) {
		if (!is_array($class)) {
			$class = preg_split('#\s+#', $class);
		}
		$classes = array_merge($classes, $class);
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map('esc_attr', $classes);

	/**
	 * Filters the list of CSS body class names for the current post or page.
	 *
	 * @param string[] $classes An array of header class names.
	 * @param string[] $class   An array of additional class names added to the header.
	 */
	$classes = apply_filters('nextpro_header_class', $classes, $class);

	return array_unique($classes);
}



/**
 * Displays the class names for the header element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function nextpro_header_class($class = '') {
	// Separates class names with a single space, collates class names for header element.
	echo 'class="' . esc_attr(implode(' ', nextpro_get_header_class($class))) . '"';
}

/**
 * Retrieves an array of the class names for the topbar element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function nextpro_get_topbar_class($class = '') {
	$classes = array('topbar-section topbar-two d-none d-lg-block bg-transparent pb-0', 'has -parallax', 'small', 'py-10');

	$topbar_bg_color = get_theme_mod('topbar_bg_color', 'bg-transparent');

	$classes[] = $topbar_bg_color;
	$classes[] = in_array($topbar_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary']) ? 'text-light' : '';

	if (!empty($class)) {
		if (!is_array($class)) {
			$class = preg_split('#\s+#', $class);
		}
		$classes = array_merge($classes, $class);
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map('esc_attr', $classes);

	/**
	 * Filters the list of CSS topbar class names for the current post or page.
	 *
	 * @param string[] $classes An array of topbar class names.
	 * @param string[] $class   An array of additional class names added to the topbar.
	 */
	$classes = apply_filters('nextpro_topbar_class', $classes, $class);

	return array_unique($classes);
}

/**
 * Displays the class names for the topbar element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function nextpro_topbar_class($class = '') {
	// Separates class names with a single space, collates class names for topbar element.
	echo 'class="' . esc_attr(implode(' ', nextpro_get_topbar_class($class))) . '"';
}

/**
 * Retrieves an array of the class names for the navbar element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function nextpro_get_navbar_class($class = '') {
	global $wp_query;
	$classes = array('navbar');

	$navbar_style = in_array(get_theme_mod('header_bg_color', 'bg-white'), ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary']) ? 'navbar-dark' : 'navbar-light';

	$classes[] = in_array('bg-tra', nextpro_get_header_class()) ? get_theme_mod('navbar_style', 'navbar-dark') : $navbar_style;


	if (!empty($class)) {
		if (!is_array($class)) {
			$class = preg_split('#\s+#', $class);
		}
		$classes = array_merge($classes, $class);
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map('esc_attr', $classes);

	/**
	 * Filters the list of CSS body class names for the current post or page.
	 *
	 * @param string[] $classes An array of navbar class names.
	 * @param string[] $class   An array of additional class names added to the navbar.
	 */
	$classes = apply_filters('nextpro_navbar_class', $classes, $class);

	return array_unique($classes);
}


/**
 * Displays the class names for the navbar element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function nextpro_navbar_class($class = '') {
	// Separates class names with a single space, collates class names for navbar element.
	echo 'class="' . esc_attr(implode(' ', nextpro_get_navbar_class($class))) . '"';
}

/**
 * Retrieves an array of the class names for the banner element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function nextpro_get_banner_class($class = '') {
	$classes = array('section-hero inner-page-hero hero-sec position-relative', 'inner-page-hero', 'has-parallax', 'py-40');

	$banner_bg_color = get_theme_mod('banner_bg_color', 'bg-transparent');

	$classes[] = $banner_bg_color;
	$classes[] = in_array($banner_bg_color, ['bg-dark', 'bg-danger', 'bg-primary', 'bg-secondary']) ? 'text-light' : '';

	if (!empty($class)) {
		if (!is_array($class)) {
			$class = preg_split('#\s+#', $class);
		}
		$classes = array_merge($classes, $class);
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map('esc_attr', $classes);

	/**
	 * Filters the list of CSS banner class names for the current post or page.
	 *
	 * @param string[] $classes An array of banner class names.
	 * @param string[] $class   An array of additional class names added to the banner.
	 */
	$classes = apply_filters('nextpro_banner_class', $classes, $class);

	return array_unique($classes);
}


/**
 * Displays the class names for the banner element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function nextpro_banner_class($class = '') {
	// Separates class names with a single space, collates class names for banner element.
	echo 'class="' . esc_attr(implode(' ', nextpro_get_banner_class($class))) . '"';
}

/**
 * Retrieves an array of the class names for the main element.
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 * @return string[] Array of class names.
 */
function nextpro_get_main_class($args, $class = '') {
	global $nextpro;
	$classes = wp_parse_args($args, [
		'container' => $nextpro->meta['container'],
		'spacer_y' => $nextpro->meta['spacer_y'],
	]);

	if (is_singular('post')) {
		$classes['single_post_class'] = 'blog-one__content-inner';
	}

	if (!empty($class)) {
		if (!is_array($class)) {
			$class = preg_split('#\s+#', $class);
		}
		$classes = array_merge($class, $classes);
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map('esc_attr', $classes);

	/**
	 * Filters the list of CSS main class names for the current post or page.
	 *
	 * @param string[] $classes An array of main class names.
	 * @param string[] $class   An array of additional class names added to the main.
	 */
	$classes = apply_filters('nextpro_main_class', $classes, $class);

	return array_unique($classes);
}
/**
 * Displays the class names for the main element.
 *
 * @param string|string[] $class Space-separated string or array of class names to add to the class list.
 */
function nextpro_main_class($args = [], $class = '') {
	// Separates class names with a single space, collates class names for main element.
	echo 'class="' . esc_attr(implode(' ', nextpro_get_main_class($args, $class))) . '"';
}

add_action('nextpro_main_row_start', 'nextpro_main_row_start');
function nextpro_main_row_start($args = []) {
	if (nextpro_get_layout() == 'full') {
		if (is_singular('post')) {
			echo '<div class="row justify-content-center">';
			echo '<div class="col-lg-12">';
		}
		return;
	};
	get_template_part('template-parts/content/main-row', 'start', $args);
}

add_action('nextpro_main_row_end', 'nextpro_main_row_end');
function nextpro_main_row_end($args = []) {
	if (nextpro_get_layout() == 'full') {
		if (is_singular('post')) {
			echo '</div>';
			echo '</div>';
		}
		return;
	};
	get_template_part('template-parts/content/main-row', 'end', $args);
}

/**
 * Add a dropdown arrow in the navigation menu, for menu items that 
 * have a dropdown sub-menu. Returns all other menu item titles unchanged.
 * 
 * @param string   $title     The menu item's title.
 * @param WP_Post  $menu_item The current menu item object.
 * 
 * @return string
 */
function nextpro_nav_menu_add_dropdown_arrow($title, $menu_item, $args, $depth) {

	$menu_item_classes = $menu_item->classes;

	// If menu item doesn't have any classes or children, return unchanged title.
	if (empty($menu_item_classes) || !in_array('menu-item-has-children', $menu_item_classes)) {
		return $title;
	}

	$title .= '<span class="wsarrow"></span>';

	return $title;
}

add_filter('nav_menu_item_title', 'nextpro_nav_menu_add_dropdown_arrow', 10, 4);



//change submenu class filter
function nextpro_change_submenu_class($menu) {
	global $nextpro_megamenu;
	if ($nextpro_megamenu) {
		$menu = preg_replace('/class="sub-menu"/', 'class="sub-menu nextpro-menu"', $menu);
		$GLOBALS['nextpro_megamenu'] = false;
	}

	return $menu;
}
add_filter('wp_nav_menu', 'nextpro_change_submenu_class');
// mega menu using css class ul
function nextpro_channel_nav_class($classes, $item, $args) {
	if (in_array('mg_link', $classes)) {
		$GLOBALS['nextpro_megamenu'] = true;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'nextpro_channel_nav_class', 10, 4);

if (!function_exists('nextpro_auth_links')) {
	function nextpro_auth_links() {
		ob_start();
		get_template_part('template-parts/header/nav-btns');
		return ob_get_clean();
	}
}
