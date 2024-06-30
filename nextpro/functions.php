<?php
define('NEXTPRO_VERSION', '1.0.0');
define('NEXTPRO_URI', get_template_directory_uri());
define('NEXTPRO_DIR', get_template_directory());
define('NEXTPRO_ASSETS', NEXTPRO_URI . '/assets');
define('NEXTPRO_ADMIN_ASSETS', NEXTPRO_URI . '/assets/admin');

// Wp Sidebar widget modified files
include __DIR__ . '/inc/blocks/search.php';
include __DIR__ . '/inc/blocks/categories.php';
include __DIR__ . '/inc/blocks/archives.php';
include __DIR__ . '/inc/blocks/heading.php';
include __DIR__ . '/inc/blocks/latest-comments.php';
include __DIR__ . '/inc/blocks/latest-posts.php';
include __DIR__ . '/vendor/autoload.php';

new Nextpro\Loader();

if (!function_exists('nextpro_after_setup_theme')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since nextpro 1.0.4.4
	 *
	 * @return void
	 */
	function nextpro_after_setup_theme() {

		load_theme_textdomain('nextpro', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1400, 9999);
		add_image_size('nextpro-80x80-cropped', 80, 80, true);
		add_image_size('nextpro-100x100-cropped', 100, 100, true);
		add_image_size('nextpro-200x200-cropped', 200, 200, true);
		add_image_size('nextpro-360x234-cropped', 360, 234, true);
		add_image_size('nextpro-310x405-cropped', 310, 405, true);
		add_image_size('nextpro-390x300-cropped', 390, 300, true);
		add_image_size('nextpro-400x400-cropped', 400, 400, true);
		add_image_size('nextpro-540x360-cropped', 540, 360, true);
		add_image_size('nextpro-870x450-cropped', 870, 450, true);
		add_image_size('nextpro-850x400-cropped', 700, 500, true);
		add_image_size('nextpro-410x470-cropped', 410, 470, true);
		add_image_size('nextpro-420x550-cropped', 420, 550, true);
		add_image_size('nextpro-1320x670-cropped', 1320, 670, true);
		add_image_size('nextpro-368x421-cropped', 368, 421, true);
		add_image_size('nextpro-872x451-cropped', 872, 451, true);
		add_image_size('nextpro-500x700-cropped', 500, 700, true);
		add_image_size('nextpro-872x472-cropped', 872, 472, true);
		define('FEATURED_IMAGE_WIDTH', 136);
		define('FEATURED_IMAGE_HEIGHT', 85);

		register_nav_menus(
			array(
				'topbar' => esc_html__('Topbar menu', 'nextpro'),
				'social' => esc_html__('Topbar social menu', 'nextpro'),
				'offcanvas_social' => esc_html__('Offcanvas social menu', 'nextpro'),
				'primary' => esc_html__('Primary menu', 'nextpro'),
				'footer_social'  => esc_html__('Footer social menu', 'nextpro'),
				'footer'  => esc_html__('Footer menu', 'nextpro'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 163;
		$logo_height = 38;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);


		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for Align Wide.
		add_theme_support("align-wide");

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Add support for custom line height controls.
		add_theme_support('custom-line-height');

		// Add support for experimental link color control.
		add_theme_support('experimental-link-color');

		// Add support for experimental cover block spacing.
		add_theme_support('custom-spacing');

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support('custom-units');

		// Custom plugin support
		add_theme_support('woocommerce');
		add_theme_support('control-agency');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_false');

		add_action('comment_form_before', 'nextpro_enqueue_comments_reply');

		if (!isset($content_width)) $content_width = 1040;

		// Add support for editor styles.
		add_theme_support('editor-styles');
		$editor_stylesheet_path = './assets/css/editor-style.css';

		// Enqueue editor styles.
		$font_url = Nextpro\Google_Fonts::get_google_fonts_url();
		add_editor_style($font_url);
		add_editor_style($editor_stylesheet_path);


		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f7f7f7',
				'default-image' => '',
			)
		);

		$args = array(
			'flex-width'    => true,
			'flex-height'   => true,
			'default-image' => '',
		);
		add_theme_support('custom-header', $args);
	}
}
add_action('after_setup_theme', 'nextpro_after_setup_theme');

if (function_exists('register_block_style')) {
	register_block_style(
		'nextpro/quote',
		array(
			'name'         => 'blue-quote',
			'label'        => __('Blue Quote', 'nextpro'),
			'is_default'   => true,
			'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
		)
	);
}

if (!function_exists('nextpro_register_block_patterns')) {
	function nextpro_register_block_patterns() {
		register_block_pattern(
			'nextpro/block-pattern',
			array(
				'title'         => __('My First Block Pattern', 'nextpro'),
				'description'   => _x('This is my first block pattern', 'Block pattern description', 'nextpro'),
				'content'       => '<!-- wp:paragraph --><p>A single paragraph block style</p><!-- /wp:paragraph -->',
				'categories'    => array('text'),
				'keywords'      => array('cta', 'demo', 'example'),
				'viewportWidth' => 800,
			)
		);
	}
	add_action('init', 'nextpro_register_block_patterns');
}

function nextpro_enqueue_comments_reply() {
	if (get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
