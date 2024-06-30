<?php

namespace Nextpro;

final class Header {
	public function __construct() {
		add_action('customize_register', array($this, 'register'));
		add_filter('get_the_archive_title', [$this, 'get_the_archive_title']);
		add_filter('get_the_archive_description', [$this, 'get_the_archive_description']);
		add_action('wp_enqueue_scripts', [$this, 'dynamic_css']);
	}

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register($wp_customize) {

		$wp_customize->add_setting(
			'custom_logo_white',
			array(
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
			)

		);

		$wp_customize->add_control(new \WP_Customize_Media_Control(
			$wp_customize,
			'custom_logo_white',
			array( // setting id
				'label'         => esc_attr__('Logo white', 'nextpro'),
				'frame_title'   => esc_attr__('Select white logo', 'nextpro'),
				'description'   => esc_attr__('Display on dark type(transparent) background', 'nextpro'),
				'mime_type'     => 'image',
				'section'       => 'title_tagline',
				'priority'      => 9,
			)
		));

		// logo_width
		$wp_customize->add_setting(
			'logo_width',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 163,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},
			)
		);

		$wp_customize->add_control(
			'logo_width',
			array(
				'type'          => 'range',
				'section'       => 'title_tagline',
				'label'         => esc_attr__('Logo width', 'nextpro'),
				'input_attrs'   => array(
					'min'   => 0,
					'max'   => 400,
					'step'  => 1,
					'suffix' => 'px'
				),
				'priority'      => 9,
			)
		);

		// Add "display_tagline" setting for displaying the tagline.
		$wp_customize->add_setting(
			'display_title_and_tagline',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		// Add control for the "display_title_and_tagline" setting.
		$wp_customize->add_control(
			'display_title_and_tagline',
			array(
				'type'      => 'checkbox',
				'section'   => 'title_tagline',
				'label'     => esc_html__('Display Site Tagline', 'nextpro'),
			)
		);

		$this->settings($wp_customize);
		$this->add_partials($wp_customize);
	}

	private function settings($wp_customize) {

		$wp_customize->get_section('header_image')->title = __('Header Settings', 'nextpro');



		//Disable preloader 
		$wp_customize->add_setting(
			'disable_preloader',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'disable_preloader',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Disable preloader?', 'nextpro'),
			)
		);
		// custom nav button
		$wp_customize->add_setting(
			'enable_topbar',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'enable_topbar',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Enable Topbar?', 'nemxpro'),
			)
		);
		$wp_customize->add_setting(
			'email_address',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('contact@nextpro.com', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'email_address',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Email Address', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_topbar') ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'phone_label',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__(' Call us:', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'phone_label',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Phone Number Label', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_topbar') ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'phone_number',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('+1718-638-5000', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'phone_number',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Phone Number', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_topbar') ? true : false;
				}
			)
		);
		// header style
		$wp_customize->add_setting(
			'header_style',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'style-1',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'header_style',
			array(
				'type'          => 'select',
				'section'       => 'header_image',
				'label'   	=> esc_html__('Header Styles', 'nextpro'),
				'choices' 	=> array(
					'style-1' => esc_html__('Default Style', 'nextpro'),
					'style-2' => esc_html__('Header Style 2', 'nextpro'),
					'style-3' => esc_html__('Header Style 3', 'nextpro'),
				),
			)
		);
		$wp_customize->add_setting(
			'header_phone_label',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__(' Call us:', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'header_phone_label',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Phone Number Label', 'nextpro'),
				'active_callback' => function () use ($wp_customize) {
					return 'style-2' === $wp_customize->get_setting('header_style')->value();
				},
			)
		);
		$wp_customize->add_setting(
			'header_phone_number',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('+1718-638-5000', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'header_phone_number',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Phone Number', 'nextpro'),
				'active_callback' => function () use ($wp_customize) {
					return 'style-2' === $wp_customize->get_setting('header_style')->value();
				},
			)
		);
		// transparent header
		$wp_customize->add_setting(
			'tra_header',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'tra_header',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Transparent Header?', 'nextpro'),
			)
		);


		// navbar_style
		$wp_customize->add_setting(
			'navbar_style',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'navbar-dark',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'navbar_style',
			array(
				'type'          => 'radio',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Navbar Background Color', 'nextpro'),
				'choices' 	=> array(
					'section-header--five' => 'Trransparent Background',
					'navbar-dark' => 'White Background '
				),
				'active_callback' => static function () {
					return get_theme_mod('tra_header') ? true : false;
				}
			)
		);
		//Disable Sticky Header 
		$wp_customize->add_setting(
			'disable_sticky_header',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'disable_sticky_header',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Disable Sticky Header?', 'nextpro'),
			)
		);
		// custom nav button
		$wp_customize->add_setting(
			'custom_nav_button',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'custom_nav_button',
			array(
				'type'    		=> 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Enable custom nav button?', 'nextpro'),
			)
		);

		// custom nav button text
		$wp_customize->add_setting(
			'nav_button_text',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Subscribe', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'nav_button_text',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Button text', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('custom_nav_button') ? true : false;
				}
			)
		);
		// custom nav button text
		$wp_customize->add_setting(
			'nav_button_link',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => '#',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'nav_button_link',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Button link', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('custom_nav_button') ? true : false;
				}
			)
		);

		// custom nav button extra class
		$wp_customize->add_setting(
			'button_target_link',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'button_target_link',
			array(
				'type'    			=> 'checkbox',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Link open new tab ', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('custom_nav_button') ? true : false;
				}
			)
		);

		// custom nav button extra class
		$wp_customize->add_setting(
			'button_extra_class',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'header-btn-two next-marketing-btn dark-btn dark-btn btn btn',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'button_extra_class',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Button Extra Class', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('custom_nav_button') ? true : false;
				}
			)
		);

		//Disable Offcanvas menu

		$wp_customize->add_setting(
			'enable_offcanvas_menu',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'enable_offcanvas_menu',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Enable Offcanvas Menu Bar?', 'nextpro'),
			)
		);
		$wp_customize->add_setting(
			'offcanvas_position',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'offcanvas_right',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'offcanvas_position',
			array(
				'type'          => 'radio',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Offcanvas Position', 'nextpro'),
				'choices' 	=> array(
					'offcanvas_left' => 'Offcanvas Left',
					'offcanvas_right' => 'Offcanvas Right'
				),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);
		// offcanvas_logo  
		$wp_customize->add_setting(
			'offcanvas_logo',
			array(
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
			)

		);
		$wp_customize->add_control(new \WP_Customize_Media_Control(
			$wp_customize,
			'offcanvas_logo',
			array( // setting id
				'label'         => esc_attr__('Offcanvas Logo', 'nextpro'),
				'frame_title'   => esc_attr__('Add Image', 'nextpro'),
				'mime_type'     => 'image',
				//'default-image' => get_template_directory_uri() . 'assets/images/error-404.png',
				'section'       => 'header_image',
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		));
		// offcanvas content
		$wp_customize->add_setting(
			'offcanvas_description',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Choose Next Agency as your digital marketing agency and propel ur business to new heights with our award-winning digital marketing services.	', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'offcanvas_description',
			array(
				'type'    			=> 'textarea',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Offcanvas Content', 'nextpro'),
				'description'   => esc_attr__('Enter your Offcanvas content', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);
		// contact_info_Label
		$wp_customize->add_setting(
			'contact_info_Label',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('Contact Info Label', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'contact_info_Label',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Contact Info Label', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'contact_address',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('243, Eastern Parkway, Brooklyn, New York ', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'contact_address',
			array(
				'type'    			=> 'textarea',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Contact Address', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'contact_email',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('ask@next.com', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'contact_email',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Contact Email', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);
		$wp_customize->add_setting(
			'contact_number',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_attr__('+1.718.638.5000', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);
		$wp_customize->add_control(
			'contact_number',
			array(
				'type'    			=> 'text',
				'section' 			=> 'header_image',
				'label'   			=> esc_html__('Contact Number', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('enable_offcanvas_menu') ? true : false;
				}
			)
		);


		//Disable Banner
		$wp_customize->add_setting(
			'disable_banner',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		$wp_customize->add_control(
			'disable_banner',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Disable Banner?', 'nextpro'),
			)
		);

		//Disable Breadcrumbs
		$wp_customize->add_setting(
			'disable_breadcrumb',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);
		$wp_customize->add_control(
			'disable_breadcrumb',
			array(
				'type'    => 'checkbox',
				'section'       => 'header_image',
				'label'   	    => esc_html__('Disable Breadcrumb?', 'nextpro'),
			)
		);

		// banner_bg_color
		$wp_customize->add_setting(
			'nav_button_style',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'btn--theme hover--theme',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'nav_button_style',
			array(
				'type'          => 'select',
				'section'       => 'header_image',
				'label'   	=> esc_html__('Button style', 'nextpro'),
				'choices' 	=> Helpers::button_classes(),
				'active_callback' => static function () {
					return get_theme_mod('custom_nav_button') ? true : false;
				}
			)
		);

		// banner_bg_color
		$wp_customize->add_setting(
			'banner_bg_color',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'bg-dark',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'banner_bg_color',
			array(
				'type'          => 'select',
				'section'       => 'header_image',
				'label'   	=> esc_html__('Banner background color', 'nextpro'),
				'choices' 	=> array(
					'bg-transparent' => 'Transparent',
					'bg-primary' => 'Primary',
					'bg-secondary' => 'Secondary',
					'bg-danger' => 'Danger',
					'bg-warning' => 'Warning',
					'bg-info' => 'Info',
					'bg-light' => 'Light',
					'bg-dark' => 'Dark',
					'bg-white' => 'White',
					'bg-body' => 'Body',
				),
			)
		);

		// Banner image
		$wp_customize->add_setting(
			'banner_image',
			array(
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
			)

		);

		$wp_customize->add_control(new \WP_Customize_Media_Control(
			$wp_customize,
			'banner_image',
			array( // setting id
				'label'         => esc_attr__('Banner image', 'nextpro'),
				'description'   => esc_attr__('Every page have own banner settings.', 'nextpro'),
				'frame_title'   => esc_attr__('Select banner image', 'nextpro'),
				'mime_type'     => 'image',
				'flex_width'    => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height'   => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'         => 1920,
				'height'        => 1080,
				'section'       => 'header_image',
			)
		));

		// banner_image_position
		$wp_customize->add_setting(
			'banner_image_position',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'center center',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)


		);
		$wp_customize->add_control(
			'banner_image_position',
			array(
				'type'          => 'select',
				'section'       => 'header_image',
				'label'   	=> esc_html__('Banner image position', 'nextpro'),
				'choices' 	=> array(
					'left top' 		=> esc_html__('Top Left', 'nextpro'),
					'center top'   => esc_html__('Top', 'nextpro'),
					'right top'   => esc_html__('Top Right', 'nextpro'),
					'left center'   => esc_html__('Left', 'nextpro'),
					'center center'   => esc_html__('Center', 'nextpro'),
					'right center'   => esc_html__('Right', 'nextpro'),
					'left bottom'   => esc_html__('Bottom Left', 'nextpro'),
					'center bottom'   => esc_html__('Bottom', 'nextpro'),
					'right bottom'   => esc_html__('Bottom Right', 'nextpro'),
				),
				'active_callback' => static function () {
					return get_theme_mod('banner_image', false) ? true : false;
				}
			)
		);

		// banner_image_opacity
		$wp_customize->add_setting(
			'banner_image_opacity',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 25,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},

			)
		);

		$wp_customize->add_control(
			'banner_image_opacity',
			array(
				'type'          => 'range',
				'section'       => 'header_image',
				'label'         => esc_attr__('Banner image opacity', 'nextpro'),
				'input_attrs'   => array(
					'min'   => 0,
					'max'   => 100,
					'step'  => 1,
				),
				'active_callback' => static function () {
					return get_theme_mod('banner_image', false) ? true : false;
				}
			)
		);


		return $wp_customize;
	}



	public function dynamic_css() {
		$styles = [];
		$attachment_id = get_theme_mod('banner_image');
		if (in_array(get_post_type(), ['page', 'ctrl_listings'])) {
			$page_attachment_id = get_post_meta(nextpro_get_the_ID(), 'banner_image', true);
			$attachment_id = (!empty($page_attachment_id) && !is_wp_error($page_attachment_id)) ? $page_attachment_id : $attachment_id;
		}

		$image_url = wp_get_attachment_image_url($attachment_id, 'full');
		if (!empty($image_url) && !is_wp_error($image_url)) {
			$styles[] = '--nextpro-parallax-bg: url(' . esc_url($image_url) . ');';
		}

		$banner_image_opacity = get_theme_mod('banner_image_opacity', 25);
		$styles[] = '--nextpro-parallax-opacity: ' . ($banner_image_opacity / 100) . ';';

		$banner_image_position = get_theme_mod('banner_image_position', 'center');
		$styles[] = '--nextpro-parallax-bg-position: ' . $banner_image_position . ';';

		wp_add_inline_style('nextpro-style', '.banner-section{' . implode('', $styles) . '}');
	}

	public function get_the_archive_title($title) {
		if (is_search()) {
			return sprintf(
				__('Search Results for &#8220;%s&#8221;', 'nextpro'),
				get_search_query()
			);
		} elseif (is_category()) {
			$title = single_cat_title("", false);
		} elseif (is_tag()) {
			$title = single_tag_title("", false);
		} elseif (is_author()) {
			$title = '<span class="text-capitalize">' . get_the_author() . '</span>';
		} elseif (is_post_type_archive()) {
			$title  = post_type_archive_title('', false);
		} elseif (get_post_type() == 'post') {
			$title = get_theme_mod('blog_title', esc_attr__('Latest News', 'nextpro'));
		} elseif (function_exists('woocommerce_page_title') && get_post_type() == 'product') {
			$title = woocommerce_page_title(false);
		} elseif (is_singular()) {
			$title = get_the_title();
		} elseif (is_home()) {
			$title = get_theme_mod('blog_title', esc_attr__('Latest News', 'nextpro'));
		}

		return $title;
	}

	public function get_the_archive_description($description) {

		if (is_singular()) {
			$subtitle = get_post_meta(get_the_ID(), 'subtitle', true);
			$description = !empty($subtitle) ? $subtitle : $description;
		}
		if (is_home()) {
			$description = get_theme_mod('blog_subtitle', esc_attr__('Get the latest news, updates and tips', 'nextpro'));
		}

		return $description;
	}

	private function add_partials($wp_customize) {

		// Add partial for header.
		$wp_customize->selective_refresh->add_partial(
			'header_bg_color',
			array(
				'selector'        => '.header-section',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'banner_image',
			array(
				'selector'        => '.banner-section',
			)
		);

		// Add partial for blogname.
		$wp_customize->selective_refresh->add_partial(
			'custom_logo',
			array(
				'selector'        => '.logo-dark',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'custom_logo_white',
			array(
				'selector'        => '.logo-white',
			)
		);

		// Add partial for blogdescription.
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => array($this, 'partial_blogdescription'),
			)
		);

		// Add partial Navmenu.
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[primary]',
			array(
				'selector'        => '.primary-nav',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[topbar]',
			array(
				'selector'        => '.topbar-nav',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[social]',
			array(
				'selector'        => '.social-nav',
			)
		);

		// Change site-title & description to postMessage.
		$wp_customize->get_setting('blogname')->transport        = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.

		return $wp_customize;
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function partial_blogname() {
		bloginfo('name');
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function partial_blogdescription() {
		bloginfo('description');
	}
}
