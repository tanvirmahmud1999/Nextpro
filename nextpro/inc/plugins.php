<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme nextpro for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 */
require_once get_template_directory() . '/vendor/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'nextpro_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function nextpro_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => esc_attr(__('Control Agency', 'nextpro')),
			'slug'               => 'control-agency', // The plugin slug (typically the folder name).
			'source'             => __DIR__ . '/plugins/control-agency.zip',
			'required'           => true,
			'version'            => '0.1',
			'force_activation'   => false,
			'force_deactivation' => false
		),
		array(
			'name'      => 'Elementor', 'nextpro',
			'slug'      => 'elementor',
			'required'  => true
		),
		array(
			'name' => esc_attr(__('Contact form 7', 'nextpro')),
			'slug' => 'contact-form-7',
			'required' => false
		),
		array(
			'name'      => 'Breadcrumb NavXT', 'nextpro',
			'slug'      => 'breadcrumb-navxt',
			'required'  => true
		),
		array(
			'name'               => esc_attr(__('Control Email Subscriber', 'nextpro')),
			'slug'               => 'control-email-subscriber', // The plugin slug (typically the folder name).
			'source'             => __DIR__ . '/plugins/control-email-subscriber.zip',
			'required'           => true,
			'version'            => '1.0.2',
			'force_activation'   => false,
			'force_deactivation' => false
		),
		array(
			'name' => esc_attr(__('One Click Demo Import', 'nextpro')),
			'slug' => 'one-click-demo-import',
			'required' => false
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'nextpro',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message' => '<p><a class="" href="' . add_query_arg(['check' => 'plugin_status']) . '">Check ' . wp_get_theme()->get('Name') . '\'s custom plugins update availability</a></p>'
	);

	$plugins = nextpro_fetch_plugins_update($plugins);
	tgmpa($plugins, $config);
}

if (!function_exists('nextpro_fetch_plugins_update')) {

	/**
	 * Helper function to fetch the Plugins array.
	 *
	 * @param array $plugins Whether or not to return a normalized array. 
	 *
	 * @return array
	 *
	 * @access public
	 */
	function nextpro_fetch_plugins_update($plugins, $force_build = false) {

		if (is_string($plugins) || is_bool($plugins)) return $plugins;



		$update_data = wp_get_update_data();
		if ($update_data['counts']['plugins'] > 0) {
			$force_build = true;
		} elseif (!empty($_GET['check']) && ($_GET['check'] == 'plugin_status')) {
			$force_build = true;
		}

		// Plugins cache key.
		$plugins_cache_key = apply_filters('nextpro_plugins_cache_key', 'nextpro_plugins_cache');
		// Get the plugins from cache.
		$plugins_cache = apply_filters('nextpro_plugins_cache', get_transient($plugins_cache_key));


		if ($force_build || !is_array($plugins_cache) || empty($plugins_cache)) {

			$plugins_response = nextpro_get_plugin_api_response();

			// Continue if we got a valid response.
			if (200 === wp_remote_retrieve_response_code($plugins_response)) {
				$response_body = wp_remote_retrieve_body($plugins_response);

				if ($response_body) {
					// JSON decode the response body and cache the result.
					$plugins_data = json_decode(trim($response_body), true);
					if (is_array($plugins_data) && isset($plugins_data['items'])) {


						$plugins_tmp = [];
						foreach ($plugins_data['items'] as $value) {
							if (empty($value['source'])) continue;

							$id = $value['slug'];
							if ($id) {
								$plugins_tmp[$id] = array(
									'version' => $value['Version'],
									'source' => $value['source'],
								);
							}
						}

						$plugins = nextpro_compare_plugins_version($plugins, $plugins_tmp);
						set_theme_mod('nextpro_plugins', $plugins);
						set_transient($plugins_cache_key, $plugins, WEEK_IN_SECONDS);
					}
				}
			}
		} else {
			$plugins = $plugins_cache;
		}

		return $plugins;
	}
}



function nextpro_get_plugin_api_response() {
	// API url and key.
	$plugins_api_url = apply_filters('nextpro_plugins_api_url', 'https://www.themeperch.com/themes/tgmpa/');
	$plugins_api_key = apply_filters('nextpro_plugins_api_key', 'AIzaSyAY4CxRw0I0VvaABZcMcNqU-Zjuw7xjrW4');

	// API arguments.
	$plugins_fields = apply_filters('nextpro_plugins_fields',	array('Slug', 'Version', 'Name'));
	$plugins_sort   = apply_filters('nextpro_plugins_sort', 'alpha');
	// Initiate API request.
	$plugins_query_args = array(
		'key'    => $plugins_api_key,
		'fields' => implode(',', $plugins_fields),
		'sort'   => $plugins_sort,
	);

	// Build and make the request.
	$plugins_query    = esc_url_raw(add_query_arg($plugins_query_args, $plugins_api_url));
	return wp_safe_remote_get(
		$plugins_query,
		array(
			'sslverify' => false,
			'timeout'   => 15,
		)
	);
}

function nextpro_compare_plugins_version($plugins, $plugins_tmp) {
	// check custom plugins
	foreach ($plugins as $key => $plugin) {
		if (empty($plugin['source'])) continue;
		if (!array_key_exists($plugin['slug'], $plugins_tmp)) continue;

		$slug = $plugin['slug'];
		if (version_compare($plugins[$key]['version'], $plugins_tmp[$slug]['version'], '>='))  continue;

		$plugins[$key]['version'] = $plugins_tmp[$slug]['version'];
		$plugins[$key]['source'] = $plugins_tmp[$slug]['source'];
	}
	return array_filter($plugins);
}
