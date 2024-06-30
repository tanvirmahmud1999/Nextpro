<?php
return [
    'title' => esc_attr__('Nextpro Page Data', 'nextpro'),
    'id' => 'nextpro-page-data',
    'post_types' => ['page'],
    'context' => 'normal',
    'priority' => 'high',
    'default_hidden' => false,
    'fields' => [
        [
            'id'        => 'subtitle',
            'type'      => 'textarea',
            'name'      => esc_attr__('Subtitle', 'nextpro'),
            'hidden'    => ['disable_banner', '=', true]
        ],
        [
            'id'                => 'banner_image',
            'type'              => 'single_image',
            'name'              => esc_attr__('Banner image', 'nextpro'),
            'max_file_uploads'  => 1,
            'max_status'        => false,
            'image_size'        => 'thumbnail',
            'hidden'            => ['disable_banner', '=', true]
        ],

    ],
];
