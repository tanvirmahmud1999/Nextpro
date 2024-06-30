<?php

namespace Nextpro;

/**
 * Customizer settings for this theme.
 *
 * @package 	WordPress
 * @subpackage 	Nextpro
 */


/**
 * Customizer Settings.
 */
class Customize {

	/**
	 * Constructor. Instantiate the object.
	 */
	public function __construct() {
		add_action('customize_controls_enqueue_scripts', array($this, 'customize_enqueue'));
		add_action('customize_register', array($this, 'register'));

		add_filter('rwmb_settings_pages', [$this, 'settings_pages']);
		add_filter('rwmb_meta_boxes', [$this, 'meta_boxes']);
	}

	public function customize_enqueue() {
		wp_enqueue_style('nextpro-customize', NEXTPRO_ASSETS . '/css/admin/nextpro-customize.css');
		wp_enqueue_script('nextpro-customize', NEXTPRO_ASSETS . '/js/admin/nextpro-customize.js', array('jquery', 'customize-controls'), false, true);
	}

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register($wp_customize) {


		// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
		$wp_customize->add_setting(
			'display_title_and_tagline',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__CLASS__, 'sanitize_checkbox'),
			)
		);

		// Add control for the "display_title_and_tagline" setting.
		$wp_customize->add_control(
			'display_title_and_tagline',
			array(
				'type'    => 'checkbox',
				'section' => 'title_tagline',
				'label'   => esc_html__('Display Site Title & Tagline', 'nextpro'),
			)
		);


		/**
		 * Add excerpt or full text selector to customizer
		 */
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__('Blog Settings', 'nextpro'),
				'priority' => 120,
			)
		);

		// content_style
		$wp_customize->add_setting(
			'content_style',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'grid',
				'sanitize_callback' => static function ($value) {
					return 'grid' === $value || 'list' === $value ? $value : 'grid';
				},
			)
		);

		$wp_customize->add_control(
			'content_style',
			array(
				'type'    	=> 'radio',
				'section' 	=> 'blog_settings',
				'label'   	=> esc_html__('On Archive Pages, Posts style:', 'nextpro'),
				'choices' 	=> array(
					'grid' 		=> esc_html__('Grid View', 'nextpro'),
					'list'   => esc_html__('List View', 'nextpro'),
				),
			)
		);

		// excerpt_length
		$wp_customize->add_setting(
			'excerpt_length',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 30,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'excerpt_length',
			array(
				'type'    			=> 'range',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__('On Post summary, Excerpt length:', 'nextpro'),
				'description'		=> esc_attr__('Only worked when post excerpt is displayed.', 'nextpro'),
				'input_attrs' => array(
					'min' => -1,
					'max' => 100,
					'step' => 1,
				),
			)
		);

		// read_more_text
		$wp_customize->add_setting(
			'sticky_text',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Featured', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'sticky_text',
			array(
				'type'    			=> 'text',
				'section' 			=> 'blog_settings',
				'label'   			=> esc_html__('Sticky text', 'nextpro'),
			)
		);
		//blog Sidebar
		$wp_customize->add_setting(
			'blog_layout',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'rs',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'blog_layout',
			array(
				'type'            => 'select',
				'choices' => [
					'ls'  		=> 'Left Sidebar',
					'rs' 		=> 'Right Sidebar',
					'full'    	=> 'No Sidebar',
				],
				'section'         => 'blog_settings',
				'label'           => esc_html__('Blog Sidebar Option', 'nextpro'),
			)
		);
		$wp_customize->add_setting(
			'blog_column',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 2,
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'blog_column',
			array(
				'type'            => 'number',
				'section'         => 'blog_settings',
				'label'           => esc_html__('Blog Column Number', 'nextpro'),
			)
		);
		// blog_archive_column
		$wp_customize->add_setting(
			'blog_archive_column',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 2,
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'blog_archive_column',
			array(
				'type'            => 'number',
				'section'         => 'blog_settings',
				'label'           => esc_html__('Archive Post Column Number', 'nextpro'),
			)
		);


		//single post settings
		$wp_customize->add_section(
			'single_post_settings',
			array(
				'title'    => esc_html__('Single Post Settings', 'nextpro'),
				'priority' => 120,
			)
		);

		//related posts
		$wp_customize->add_setting(
			'display_post_single_author_bio',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => static function ($value) {
					return (bool) $value;
				},
			)
		);

		$wp_customize->add_control(
			'display_post_single_author_bio',
			array(
				'type'            => 'checkbox',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Display author bio after content', 'nextpro'),
			)
		);



		//related posts
		$wp_customize->add_setting(
			'display_related_posts',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => static function ($value) {
					return (bool) $value;
				},
			)
		);

		$wp_customize->add_control(
			'display_related_posts',
			array(
				'type'            => 'checkbox',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Display related posts', 'nextpro'),
			)
		);

		$wp_customize->add_setting(
			'related_posts_title',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_html__('Recent Posts', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'related_posts_title',
			array(
				'type'            => 'text',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Related posts title', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('display_related_posts', false) ? true : false;
				}
			)
		);
		// related post column number
		$wp_customize->add_setting(
			'related_post_column',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 6,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'related_post_column',
			array(
				'type'            => 'number',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Related posts column width', 'nextpro'),
				'description'		=> esc_attr__('If you write 6 then width will be 6 column every post item', 'nextpro'),
				'input_attrs'   => array(
					'min'   => -1,
					'max'   => 100,
					'step'  => 1,
				),
				'active_callback' => static function () {
					return get_theme_mod('display_related_posts', false) ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'related_posts_per_page',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 2,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'related_posts_per_page',
			array(
				'type'            => 'number',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Related posts per page', 'nextpro'),
				'input_attrs'   => array(
					'min'   => -1,
					'max'   => 100,
					'step'  => 1,
				),
				'active_callback' => static function () {
					return get_theme_mod('display_related_posts', false) ? true : false;
				}
			)
		);

		//single post Sidebar Layout
		$wp_customize->add_setting(
			'single_layout',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'rs',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);

		$wp_customize->add_control(
			'single_layout',
			array(
				'type'            => 'select',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Sidebar Layout', 'nextpro'),
				'choices' => [
					'ls'  		=> 'Left Sidebar',
					'rs' 		=> 'Right Sidebar',
					'full'    	=> 'No Sidebar',
				],
			)
		);
		//single post title tag
		$wp_customize->add_setting(
			'single_post_title_tag',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'h2',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);
		$wp_customize->add_control(
			'single_post_title_tag',
			array(
				'type'            => 'select',
				'section'         => 'single_post_settings',
				'label'           => esc_html__('Single post title tag', 'nextpro'),
				'choices' => [
					'h1' => esc_attr__('H1', 'nextpro'),
					'h2' => esc_attr__('H2', 'nextpro'),
					'h3' => esc_attr__('H3', 'nextpro'),
					'h4' => esc_attr__('H4', 'nextpro'),
					'h5' => esc_attr__('H5', 'nextpro'),
					'h6' => esc_attr__('H6', 'nextpro'),
				],
			)
		);



		// Background color.

		// Register the custom control.
		$wp_customize->register_control_type('Nextpro\Customize_Color_Control');

		// Get the palette from theme-supports.
		$palette = get_theme_support('editor-color-palette');

		// Build the colors array from theme-support.
		$colors = array();
		if (isset($palette[0]) && is_array($palette[0])) {
			foreach ($palette[0] as $palette_color) {
				$colors[] = $palette_color['color'];
			}
		}
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_checkbox($checked = null) {
		return (bool) isset($checked) && true === $checked;
	}

	/**
	 * Sanitize boolean for checkbox.
	 *
	 * @param 	bool 	$checked Whether or not a box is checked.
	 * @return 	bool
	 */
	public static function sanitize_attachment($value = null) {
		$attachment = wp_get_attachment_image($value);
		return (!empty($attachment) || !is_wp_error($attachment)) ? $value : null;
	}



	public function settings_pages($settings_pages) {
		$theme_slug = get_option('stylesheet');
		$settings_pages[] = [
			'id'               => 'nextpro',
			'option_name'      => "theme_mods_{$theme_slug}",
			'menu_title'       => 'Theme Options',
			'parent'           => 'themes.php',
			'customizer_only'  => true, // THIS
		];
		return $settings_pages;
	}

	public function meta_boxes($meta_boxes) {
		$meta_boxes[] = [
			'id'             => 'general',
			'title'          => 'General',
			'settings_pages' => 'nextpro',
			//'panel'          => 'excerpt_settings', // THIS
			'fields'         => [
				[
					'name' => 'Logo',
					'id'   => 'logo1',
					'type' => 'file_input',
				],
				[
					'name'    => 'Layout',
					'id'      => 'layout1',
					'type'    => 'image_select',
					'options' => [
						'sidebar-left'  => 'http://i.imgur.com/Y2sxQ2R.png',
						'sidebar-right' => 'http://i.imgur.com/h7ONxhz.png',
						'no-sidebar'    => 'http://i.imgur.com/m7oQKvk.png',
					],
				],
			],
		];
		return $meta_boxes;
	}
}
