<?php
return [
    'title' => esc_attr__('Nextpro profile settings', 'nextpro'),
    'id' => 'nextpro-user-info',
    'type' => 'user',
    'fields' => [
        [
            'name' => esc_attr__('Enable Custom Profile picture', 'nextpro'),
            'id' => 'nextpro_custom_profile_picture',
            'type' => 'checkbox',
            'desc' => 'Yes'
        ],
        [
            'name' => esc_attr__('Custom Profile picture', 'nextpro'),
            'id' => 'nextpro_profile_picture',
            'type' => 'single_image',
            'max_file_uploads' => 1,
            'max_file_size' => '1mb',
            'image_size' => 'full',
            'visible' => ['nextpro_custom_profile_picture', '=', true]
        ]
    ]
];
