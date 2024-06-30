<?php

namespace Nextpro;

final class Google_Fonts {

    public static function default_font_families() {
        return [
            'body_font_family' => [
                'family_id' => 'rubik',
                'family' => 'Plus Jakarta Sans',
                'variants' => ['200', '300', '400', '500', '600', '700', '800'],
                'css_var' =>  'body-font-family',
            ],
            'heading_font_family' => [
                'family_id' => 'plusjakartasans',
                'family' => 'Plus Jakarta Sans',
                'variants' => ['200', '300', '400', '500', '600', '700', '800'],
                'css_var' =>  'headings-font-family',
            ],
            'inter_font_family' => [
                'family_id' => 'inter',
                'family' => 'Inter',
                'variants' => ['200', '300', '400', '500', '600', '700', '800'],
                'css_var' =>  'inter-font-family',
            ],
            'dm_font_family' => [
                'family_id' => 'dmsans',
                'family' => 'Testimonial Designation',
                'variants' => ['200', '300', '400', '500', '600', '700', '800'],
                'css_var' =>  'dm-font-family',
            ]
        ];
    }


    public static function font_family_options() {
        $families        = array(
            '' => esc_attr__('Inherit', 'nextpro')
        );
        $google_fonts = get_option('nextpro_google_fonts', array());

        // Forces an array rebuild when we switch themes.
        if (empty($google_fonts)) {
            $google_fonts = self::fetch_google_fonts(true, true);
        }

        foreach ((array) $google_fonts as $key => $item) {

            if (isset($item['family'])) {
                $families[$key] = $item['family'];
            }
        }
        return $families;
    }

    static function get_theme_fonts() {
        $google_fonts     = get_option('nextpro_google_fonts', array());
        $GLOBALS['google_fonts'] = $google_fonts;
        $args = ['body_font_family', 'heading_font_family'];
        $fonts = self::default_font_families();
        foreach ($args as $font_id) {
            $font_family = get_theme_mod($font_id);
            if (empty($font_family)) continue;

            // Can't find the font, bail!
            if (!isset($google_fonts[$font_family]['family'])) {
                continue;
            }

            $fonts[$font_id]['family_id'] = $font_family;
            $fonts[$font_id]['family'] = $google_fonts[$font_family]['family'];
        }



        return $fonts;
    }

    static function get_google_fonts_url() {
        $set_google_fonts = self::get_theme_fonts();
        $GLOBALS['nextpro_fonts'] = $set_google_fonts;

        global $google_fonts;

        $families            = array(
            'plusjakartasans' =>  'Plus Jakarta Sans:300,300,400,500,600,700,800'
        );
        $subsets             = array();
        $append              = '';


        if (!empty($set_google_fonts)) {

            foreach ($set_google_fonts as $mod_id => $font) {
                $font_family_id = $font['family_id'];
                // Can't find the font, bail!
                if (!isset($google_fonts[$font_family_id]['family'])) {
                    continue;
                }



                $variants = '';
                // Set variants & subsets.
                if (!empty($font['variants']) && is_array($font['variants'])) {

                    // Variants string.
                    $variants = ':' . implode(',', $font['variants']);

                    // Add subsets to array.
                    if (!empty($font['subsets']) && is_array($font['subsets'])) {
                        foreach ($font['subsets'] as $subset) {
                            $subsets[] = $subset;
                        }
                    }
                }

                // Add family & variants to array.
                if (isset($variants)) {
                    $families[$font_family_id] = str_replace(' ', '+', $google_fonts[$font_family_id]['family']) . $variants;
                }
            }
        }



        if (!empty($families)) {

            $families = array_unique($families);

            // Append all subsets to the path, unless the only subset is latin.
            if (!empty($subsets)) {
                $subsets = implode(',', array_unique($subsets));
                if ('latin' !== $subsets) {
                    $append = '&subset=' . $subsets;
                }
            }

            return    'https://fonts.googleapis.com/css?family=' . implode('|', $families)  . $append;
        }
    }

    static function fetch_google_fonts($normalize = true, $force_rebuild = false) {


        // Google Fonts cache key.
        $google_fonts_cache_key = apply_filters('nextpro_google_fonts_cache_key', 'nextpro_google_fonts_cache');

        // Get the fonts from cache.
        $google_fonts = apply_filters('nextpro_google_fonts_cache', get_transient($google_fonts_cache_key));

        if ($force_rebuild || !is_array($google_fonts) || empty($google_fonts)) {

            $google_fonts = array();

            // API url and key.
            $google_fonts_api_url = apply_filters('nextpro_google_fonts_api_url', 'https://www.googleapis.com/webfonts/v1/webfonts');
            $google_fonts_api_key = apply_filters('nextpro_google_fonts_api_key', 'AIzaSyAY4CxRw0I0VvaABZcMcNqU-Zjuw7xjrW4');

            if (false === $google_fonts_api_key) {
                return array();
            }

            // API arguments.
            $google_fonts_fields = apply_filters(
                'nextpro_google_fonts_fields',
                array(
                    'family',
                    'variants',
                    'subsets',
                )
            );
            $google_fonts_sort   = apply_filters('nextpro_google_fonts_sort', 'alpha');

            // Initiate API request.
            $google_fonts_query_args = array(
                'key'    => $google_fonts_api_key,
                'fields' => 'items(' . implode(',', $google_fonts_fields) . ')',
                'sort'   => $google_fonts_sort,
            );

            // Build and make the request.
            $google_fonts_query    = esc_url_raw(add_query_arg($google_fonts_query_args, $google_fonts_api_url));
            $google_fonts_response = wp_safe_remote_get(
                $google_fonts_query,
                array(
                    'sslverify' => false,
                    'timeout'   => 15,
                )
            );

            // Continue if we got a valid response.
            if (200 === wp_remote_retrieve_response_code($google_fonts_response)) {

                $response_body = wp_remote_retrieve_body($google_fonts_response);

                if ($response_body) {

                    // JSON decode the response body and cache the result.
                    $google_fonts_data = json_decode(trim($response_body), true);

                    if (is_array($google_fonts_data) && isset($google_fonts_data['items'])) {

                        $google_fonts = $google_fonts_data['items'];

                        // Normalize the array key.
                        $google_fonts_tmp = array();
                        foreach ($google_fonts as $key => $value) {
                            if (!isset($value['family'])) {
                                continue;
                            }

                            $id = preg_replace('/[^a-z0-9_\-]/', '', strtolower(remove_accents($value['family'])));

                            if ($id) {
                                $google_fonts_tmp[$id] = $value;
                            }
                        }

                        $google_fonts = $google_fonts_tmp;
                        update_option('nextpro_google_fonts', $google_fonts);
                        set_transient($google_fonts_cache_key, $google_fonts, WEEK_IN_SECONDS);
                    }
                }
            }
        }

        return $normalize ? self::normalize_google_fonts($google_fonts) : $google_fonts;
    }

    static function normalize_google_fonts($google_fonts) {

        $normalized_google_fonts = array();

        if (is_array($google_fonts) && !empty($google_fonts)) {

            foreach ($google_fonts as $google_font) {

                if (isset($google_font['family'])) {

                    $id = str_replace(' ', '+', $google_font['family']);

                    $normalized_google_fonts[$id] = array(
                        'family' => $google_font['family'],
                    );

                    if (isset($google_font['variants'])) {
                        $normalized_google_fonts[$id]['variants'] = $google_font['variants'];
                    }

                    if (isset($google_font['subsets'])) {
                        $normalized_google_fonts[$id]['subsets'] = $google_font['subsets'];
                    }
                }
            }
        }

        return $normalized_google_fonts;
    }
}
