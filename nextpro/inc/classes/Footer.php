<?php

namespace Nextpro;

final class Footer {

	public function __construct() {
		add_action('customize_register', array($this, 'register'));
		add_action('wp_enqueue_scripts', [$this, 'dynamic_css']);
	}

	/**
	 * Register customizer options.
	 *
	 * @param 	WP_Customize_Manager 	$wp_customize Theme Customizer object.
	 * @return 	void
	 */
	public function register($wp_customize) {

		/**
		 * Add footer settings to customizer
		 */
		$wp_customize->add_section(
			'footer_settings',
			array(
				'title'    => esc_html__('Footer Settings', 'nextpro'),
				'priority' => 150,
			)
		);



		// Add "display_footer_top" setting for displaying the footer top section.
		$wp_customize->add_setting(
			'display_footer_top',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox'),
			)
		);

		// Add control for the "display_footer_top" setting.
		$wp_customize->add_control(
			'display_footer_top',
			array(
				'type'    => 'checkbox',
				'section'  => 'footer_settings',
				'label'   => esc_html__('Display Footer top section', 'nextpro'),
			)
		);

		$wp_customize->add_setting(
			'display_back_to_top',
			array(
				'default'           => true,
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_checkbox')
			)

		);

		$wp_customize->add_control(
			'display_back_to_top',
			array(
				'type'    => 'checkbox',
				'section'  => 'footer_settings',
				'label'   => esc_html__('Display Back to top', 'nextpro'),
			)
		);

		// footer_bg_color
		$wp_customize->add_setting(
			'footer_bg_color',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'bg-transparent',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'footer_bg_color',
			array(
				'type'          => 'select',
				'section'       => 'footer_settings',
				'label'   	=> esc_html__('Footer background color', 'nextpro'),
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

		// Footer background
		$wp_customize->add_setting(
			'footer_image',
			array(
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
			)

		);

		$wp_customize->add_control(new \WP_Customize_Media_Control(
			$wp_customize,
			'footer_image',
			array( // setting id
				'label'         => esc_attr__('Footer background image', 'nextpro'),
				'description'   => esc_attr__('Every page have own footer settings.', 'nextpro'),
				'frame_title'   => esc_attr__('Select footer image', 'nextpro'),
				'mime_type'     => 'image',
				'flex_width'    => true, // Allow any width, making the specified value recommended. False by default.
				'flex_height'   => false, // Require the resulting image to be exactly as tall as the height attribute (default).
				'width'         => 1920,
				'height'        => 1080,
				'section'       => 'footer_settings',
			)
		));

		// footer_image_position
		$wp_customize->add_setting(
			'footer_image_position',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'center center',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)


		);
		$wp_customize->add_control(
			'footer_image_position',
			array(
				'type'          => 'select',
				'section'       => 'footer_settings',
				'label'   	=> esc_html__('Footer image position', 'nextpro'),
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
					return get_theme_mod('footer_image', false) ? true : false;
				}
			)
		);

		// footer_image_opacity
		$wp_customize->add_setting(
			'footer_image_opacity',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 100,
				'sanitize_callback' => static function ($value) {
					return intval($value);
				},

			)
		);

		$wp_customize->add_control(
			'footer_image_opacity',
			array(
				'type'          => 'range',
				'section'       => 'footer_settings',
				'label'         => esc_attr__('Footer image opacity', 'nextpro'),
				'input_attrs'   => array(
					'min'   => 0,
					'max'   => 100,
					'step'  => 1,
				),
				'active_callback' => static function () {
					return get_theme_mod('footer_image', false) ? true : false;
				}
			)
		);

		//copyright_text
		$wp_customize->add_setting(
			'copyright_text',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'Copyright &copy; ' . date('Y') . ' All right reserved',
				'sanitize_callback' => static function ($value) {
					$value = str_replace('[date]', date('Y'), $value);
					return wp_kses_post($value);
				},
			)
		);
		$wp_customize->add_control(
			'copyright_text',
			array(
				'type'    => 'textarea',
				'section' => 'footer_settings',
				'label'   => esc_html__('Copyright text', 'nextpro'),
			)
		);

		//developed_by
		$wp_customize->add_setting(
			'developed_by',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'Copyright ©' . date('Y') . ' Nextpro. All right reserved',
				'sanitize_callback' => static function ($value) {
					$value = str_replace('[date]', date('Y'), $value);
					return wp_kses_post($value);
				},
			)
		);

		$wp_customize->add_control(
			'developed_by',
			array(
				'type'    => 'textarea',
				'section' => 'footer_settings',
				'label'   => esc_html__('Copyright text', 'nextpro'),
				'description' => 	esc_html__('Use [date] for current year. Use {your-link-text} to apply link to copyright text', 'nextpro'),
			)
		);

		//copyright_link 
		$wp_customize->add_setting(
			'copyright_link',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => '',
				'sanitize_callback' => static function ($value) {
					return esc_url($value);
				},
			)
		);

		$wp_customize->add_control(
			'copyright_link',
			array(
				'type'    => 'text',
				'section' => 'footer_settings',
				'label'   => esc_html__('Copyright link', 'nextpro'),
				'description' => 	esc_html__('Link apply to copyright text', 'nextpro'),
			)
		);

		// copyright_bg_color
		$wp_customize->add_setting(
			'copyright_bg_color',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => 'bg-transparent',
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				}
			)
		);

		$wp_customize->add_control(
			'copyright_bg_color',
			array(
				'type'          => 'select',
				'section'       => 'footer_settings',
				'label'   	=> esc_html__('Copyright background color', 'nextpro'),
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

		// $wp_customize->add_section(
		// 	'cta_settings',
		// 	array(
		// 		'title'    => esc_html__('CTA Settings', 'nextpro'),
		// 	)
		// );

		// //CTA Settings
		// $wp_customize->add_setting(
		// 	'display_cta',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => false,
		// 		'sanitize_callback' => static function ($value) {
		// 			return (bool) $value;
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'display_cta',
		// 	array(
		// 		'type'            => 'checkbox',
		// 		'section'         => 'cta_settings',
		// 		'label'           => esc_html__('Display CTA Section', 'nextpro'),
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_title',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => esc_html__('Give it a try, it\'s free!', 'nextpro'),
		// 		'sanitize_callback' => static function ($value) {
		// 			return esc_attr($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'cta_title',
		// 	array(
		// 		'type'            => 'text',
		// 		'section'         => 'cta_settings',
		// 		'label'           => esc_html__('Title', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_subtitle',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => esc_html__('It only takes a few clicks to get started', 'nextpro'),
		// 		'sanitize_callback' => static function ($value) {
		// 			return esc_attr($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'cta_subtitle',
		// 	array(
		// 		'type'            => 'text',
		// 		'section'         => 'cta_settings',
		// 		'label'           => esc_html__('Subtitle', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_button_text',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => esc_html__('Get srarted - it\'s free', 'nextpro'),
		// 		'sanitize_callback' => static function ($value) {
		// 			return esc_attr($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'cta_button_text',
		// 	array(
		// 		'type'            => 'text',
		// 		'section'         => 'cta_settings',
		// 		'label'           => esc_html__('Button text', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_button_link',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => '#',
		// 		'sanitize_callback' => static function ($value) {
		// 			return esc_attr($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'cta_button_link',
		// 	array(
		// 		'type'            => 'text',
		// 		'section'         => 'cta_settings',
		// 		'label'           => esc_html__('Button link', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_button_footer',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => 'Free for 14 days, no credit card required',
		// 		'sanitize_callback' => static function ($value) {
		// 			return wp_kses_post($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'cta_button_footer',
		// 	array(
		// 		'type'    => 'textarea',
		// 		'section' => 'cta_settings',
		// 		'label'   => esc_html__('Button footer', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// );

		// $wp_customize->add_setting(
		// 	'cta_bg_image',
		// 	array(
		// 		'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
		// 	)

		// );

		// $wp_customize->add_control(new \WP_Customize_Media_Control(
		// 	$wp_customize,
		// 	'cta_bg_image',
		// 	array( // setting id
		// 		'label'         => esc_attr__('Background image', 'nextpro'),
		// 		'frame_title'   => esc_attr__('Select Image', 'nextpro'),
		// 		'mime_type'     => 'image',
		// 		'section'       => 'cta_settings',
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_cta', false) ? true : false;
		// 		}
		// 	)
		// ));


		// 404 page settings
		$wp_customize->add_section(
			'error_settings',
			array(
				'title'    => esc_html__('404 Page Settings', 'nextpro'),
			)
		);
		//display page content
		$wp_customize->add_setting(
			'display_error_page',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => false,
				'sanitize_callback' => static function ($value) {
					return (bool) $value;
				},
			)
		);
		$wp_customize->add_control(
			'display_error_page',
			array(
				'type'            => 'checkbox',
				'section'         => 'error_settings',
				'label'           => esc_html__('Display Page Content', 'nextpro'),
			)
		);


		// 404 image
		$wp_customize->add_setting(
			'error_image',
			array(
				'sanitize_callback' => array(__NAMESPACE__ . '\\Customize', 'sanitize_attachment')
			)

		);
		$wp_customize->add_control(new \WP_Customize_Media_Control(
			$wp_customize,
			'error_image',
			array( // setting id
				'label'         => esc_attr__('404 image', 'nextpro'),
				'frame_title'   => esc_attr__('Select Image', 'nextpro'),
				'mime_type'     => 'image',
				//'default-image' => get_template_directory_uri() . 'assets/images/error-404.png',
				'section'       => 'error_settings',
				'active_callback' => static function () {
					return get_theme_mod('display_error_page', false) ? true : false;
				}
			)
		));

		// 404 headline
		$wp_customize->add_setting(
			'error_headline',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_html__('Page Not Found', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);
		$wp_customize->add_control(
			'error_headline',
			array(
				'type'            => 'text',
				'section'         => 'error_settings',
				'label'           => esc_html__('404 Text', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('display_error_page', false) ? true : false;
				}
			)
		);


		// Title
		$wp_customize->add_setting(
			'error_title',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_html__('Page Not Found', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);
		$wp_customize->add_control(
			'error_title',
			array(
				'type'            => 'text',
				'section'         => 'error_settings',
				'label'           => esc_html__('Title', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('display_error_page', false) ? true : false;
				}
			)
		);

		$wp_customize->add_setting(
			'error_content',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_html__('Oops! The page you are looking for might have been moved, renamed or might never existed', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);
		// Subtitle
		$wp_customize->add_control(
			'error_content',
			array(
				'type'            => 'text',
				'section'         => 'error_settings',
				'label'           => esc_html__('Description', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('display_error_page', false) ? true : false;
				}
			)
		);

		// Button Text
		$wp_customize->add_setting(
			'error_button_text',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => esc_html__('Back to home', 'nextpro'),
				'sanitize_callback' => static function ($value) {
					return esc_attr($value);
				},
			)
		);
		$wp_customize->add_control(
			'error_button_text',
			array(
				'type'            => 'text',
				'section'         => 'error_settings',
				'label'           => esc_html__('Button text', 'nextpro'),
				'active_callback' => static function () {
					return get_theme_mod('display_error_page', false) ? true : false;
				}
			)
		);

		// $wp_customize->add_setting(
		// 	'error_button_link',
		// 	array(
		// 		'capability'        => 'edit_theme_options',
		// 		'default'           => '#',
		// 		'sanitize_callback' => static function ($value) {
		// 			return esc_attr($value);
		// 		},
		// 	)
		// );

		// $wp_customize->add_control(
		// 	'error_button_link',
		// 	array(
		// 		'type'            => 'text',
		// 		'section'         => 'error_settings',
		// 		'label'           => esc_html__('Button link', 'nextpro'),
		// 		'active_callback' => static function () {
		// 			return get_theme_mod('display_error_page', false) ? true : false;
		// 		}
		// 	)
		// );



		$this->add_partials($wp_customize);
	}

	public function dynamic_css() {
		$styles = [];
		$attachment_id = get_theme_mod('footer_image');
		if (in_array(get_post_type(), ['page', 'ctrl_listings'])) {
			$page_attachment_id = get_post_meta(nextpro_get_the_ID(), 'footer_image', true);
			$attachment_id = (!empty($page_attachment_id) && !is_wp_error($page_attachment_id)) ? $page_attachment_id : $attachment_id;
		}

		$image_url = wp_get_attachment_image_url($attachment_id, 'full');
		if (!empty($image_url) && !is_wp_error($image_url)) {
			$styles[] = '--nextpro-parallax-bg: url(' . esc_url($image_url) . ');';
		}

		$footer_image_opacity = get_theme_mod('footer_image_opacity', 100);
		$styles[] = '--nextpro-parallax-opacity: ' . ($footer_image_opacity / 100) . ';';

		$footer_image_position = get_theme_mod('footer_image_position', 'center');
		$styles[] = '--nextpro-parallax-bg-position: ' . $footer_image_position . ';';

		wp_add_inline_style('nextpro-style', '.footer-section{' . implode('', $styles) . '}');
	}

	private function add_partials($wp_customize) {



		$wp_customize->selective_refresh->add_partial(
			'footer_social_nav_title',
			array(
				'selector'        => '.footer-social-nav-title',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'footer_bg_color',
			array(
				'selector'        => '.footer-section',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'copyright_bg_color',
			array(
				'selector'        => '.copyright-section',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[footer_social]',
			array(
				'selector'        => '.footer-social-nav',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'nav_menu_locations[footer]',
			array(
				'selector'        => '.footer-nav',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'copyright_text',
			array(
				'selector'        => '.copyright-text',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_logo',
			array(
				'selector'        => '.footer-logo',
			)
		);

		return $wp_customize;
	}
}
