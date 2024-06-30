<?php
include __DIR__ . '/demo-data.php';
include __DIR__ . '/comment-functions.php';

/**
 * Register widget area.
 *
 * @since nextpro 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function nextpro_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__('Main widget area', 'nextpro'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'nextpro'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget sidebar__single sidebar__single--categories %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Page widget area', 'nextpro'),
			'id'            => 'sidebar-page',
			'description'   => esc_html__('Add widgets here to appear in your page sidebar.', 'nextpro'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget pb-30 mb-30 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title mb-20">',
			'after_title'   => '</h4>',
		)
	);
}
add_action('widgets_init', 'nextpro_widgets_init');


function nextpro_get_meta_values($key = '', $type = 'post', $status = 'publish') {

	global $wpdb;

	if (empty($key))
		return;

	$r = $wpdb->get_col($wpdb->prepare("
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = %s 
        AND p.post_status = %s 
        AND p.post_type = %s
    ", $key, $status, $type));

	return $r;
}

add_action('enqueue_block_editor_assets', 'nextpro_enqueue_block_editor_assets');
function nextpro_enqueue_block_editor_assets() {
	wp_enqueue_style('nextpro-editor', get_theme_file_uri('assets/css/nextpro-editor.css'), [], '1.0.0');

	wp_enqueue_script('nextpro-editor', NEXTPRO_ASSETS . '/js/admin/nextpro-editor.js', ['jquery'], '5.0.0', true);
	$l10n = [
		'margin' => nextpro_get_spacer_options('mb-', 'Margin bottom '),
		'gutterX' => nextpro_get_spacer_options('gx-', 'Horizontal Gutter '),
		'gutterY' => nextpro_get_spacer_options('gy-', 'Vertical Gutter '),
		'padding' => nextpro_get_spacer_options('p-', 'Padding '),
		'colors' => nextpro_get_editor_color_choices(),
		'columnTemplates' => nextpro_get_editor_column_templates()
	];
	wp_localize_script('nextpro-editor', 'nextproEditor', $l10n);
}

add_action('admin_enqueue_scripts', 'nextpro_admin_enqueue_scripts');
function nextpro_admin_enqueue_scripts() {
	wp_enqueue_style('nextpro-admin', NEXTPRO_ASSETS . '/css/admin/nextpro-admin.css', [], '1.0.0');
	wp_enqueue_script('nextpro-admin', NEXTPRO_ASSETS . '/js/admin/nextpro-admin.js', ['jquery'], '5.0.0', true);
}

add_filter('cup_profile_redirect', 'nextprot_profile_redirect', 10, 2);
function nextprot_profile_redirect($redirect, $config) {

	if ($config['form_id'] == 'login-form') {
		$redirect = home_url();
	} else {
		$redirect = get_theme_mod('login_url', wp_login_url());
	}

	return $redirect;
}

add_action('control_user_profile_after_form', 'nextprot_control_user_profile_after_login_form', 10, 1);
function nextprot_control_user_profile_after_login_form($type) {
	$loginurl = get_theme_mod('login_url', wp_login_url());
	$registerurl = get_theme_mod('register_url', wp_registration_url());

	$logintext = get_theme_mod('login_button_text', 'SignIn');
	$registertext = get_theme_mod('register_button_text', 'SignUp');

	$footer_text = '';
	if ($type == 'login') {
		$footer_text = sprintf(
			__('<p class="create-account text-center">Don\'t have an account? <a class="color--theme" href="%1$s">%2$s</a></p>', 'nextpro'),
			esc_url($registerurl),
			$registertext
		);
	}

	if ($type == 'register') {
		$footer_text = sprintf(
			__('<p class="create-account text-center">Already have an account? <a class="color--theme" href="%1$s">%2$s</a></p>', 'nextpro'),
			esc_url($loginurl),
			$logintext
		);
	}

	echo wp_kses_post($footer_text);
}

if (!function_exists('nextpro_get_avatar_url')) {
	add_filter('get_avatar_url', 'nextpro_get_avatar_url', 10, 2);

	function nextpro_get_avatar_url($url, $id_or_email) {
		if (is_object($id_or_email) && isset($id_or_email->comment_ID)) {
			$id_or_email = $id_or_email->user_id;
		}
		if (!function_exists('rwmb_meta')) return $url;

		$custom_profile_picture = rwmb_meta('nextpro_custom_profile_picture', ['object_type' => 'user'], $id_or_email);
		if (empty($custom_profile_picture) ||  !$custom_profile_picture) return $url;

		$attachment = rwmb_meta('nextpro_profile_picture', ['object_type' => 'user'], $id_or_email);
		if (!is_wp_error($attachment) && !empty($attachment['ID'])) {
			$url = wp_get_attachment_image_url($attachment['ID'], 'thumbnail');
		}

		return $url;
	}
}


if (!function_exists('nextpro_parse_link_text')) {
	function nextpro_parse_link_text($text, $link = '') {
		preg_match_all("/\{([^\}]*)\}/", $text, $matches);
		if (!empty($matches)) {
			foreach ($matches[1] as $value) {
				$find    = "{{$value}}";
				$replace = "<a href='{$link}' class='color-primary'>{$value}</a>";

				$text    = str_replace($find, $replace, $text);
			} //$matches[1] as $value
		} //!empty( $matches )

		$text = str_replace(" / ", "<span class='color-linear'>/</span>", $text);

		return $text;
	}
}

add_filter('wpcf7_autop_or_not', '__return_false');
