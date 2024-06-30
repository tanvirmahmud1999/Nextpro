<?php

namespace Nextpro;

final class Helpers
{

    public $config;
    public $meta;

    public function __construct()
    {
        add_action('wp_head', [$this, 'set_config'], 1);
    }

    public function get_page_meta()
    {
        $args = [];
        $defaults = $this->get_page_meta_std();



        foreach ($defaults as $meta_key => $value) {
            if (empty(get_post_meta(nextpro_get_the_ID(), $meta_key))) continue;
            $args[$meta_key] = get_post_meta(nextpro_get_the_ID(), $meta_key, true);
        }

        $this->meta = wp_parse_args($args, $defaults);
    }

    private function get_page_meta_std()
    {
        $meta_boxes = include __DIR__ . "/meta-boxes/page-attributes.php";
        $attributes = array_column($meta_boxes['fields'], 'std', 'id');
        $meta_boxes = include __DIR__ . "/meta-boxes/page-data.php";
        $data = array_column($meta_boxes['fields'], 'std', 'id');

        return array_merge($attributes, $data);
    }

    public function set_config()
    {
        $this->config = get_theme_mods();
        $this->get_page_meta();
    }

    public static function button_classes()
    {
        return apply_filters('nextpro_button_classes', array(
            'btn-primary' => esc_html__('Primary', 'nextpro'),
            'btn-secondary' => esc_html__('Secondary', 'nextpro'),
            'btn-danger' => esc_html__('Danger', 'nextpro'),
            'btn-warning' => esc_html__('Warning', 'nextpro'),
            'btn-info' => esc_html__('Info', 'nextpro'),
            'btn-light' => esc_html__('Light', 'nextpro'),
            'btn-dark' => esc_html__('Dark', 'nextpro'),
            'btn-link' => esc_html__('Link', 'nextpro'),
        ));
    }
}
