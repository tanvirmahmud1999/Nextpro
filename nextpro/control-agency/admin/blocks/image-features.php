<?php
return [
    'title'           => esc_attr__('Image Features', 'nextpro'),
    'id'              => 'image-features',
    'icon'            => 'media-document',
    'description'     => 'This is an image with features',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Image With Features', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'components/image-features.php'
        ],
        // features image
        [
            'id'               => 'features_thumbnail',
            'name'             => esc_attr__('Image:',  'nextpro'),
            'type'             => 'file_input',
            'std'              => get_theme_file_uri('assets/images/banner/hero2-1.jpg'),
            'desc'             => esc_attr__('Add Feature image', 'nextpro'),
        ],
        [
            'name'  => esc_attr__('Features Switcher', 'nextpro'),
            'id'    => 'features_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you do not like to show your video then disable the switch.', 'nextpro'),
        ],
        [
            'name'              => esc_attr__('Video Features', 'nextpro'),
            'id'                => 'image_features',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'           => ['features_switcher', '=', true],
            'std'               => [
                [
                    'image' => get_theme_file_uri('assets/images/shapes/dynamic-team-icon.svg'),
                    'title' => esc_attr__('Dynamic Team', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/skills-icon.svg'),
                    'title' => esc_attr__('Extraordinary skills', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/content-writing-icon.svg'),
                    'title' => esc_attr__('Customer focused', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Image Icon', 'nextpro'),
                    'id'   => 'image',
                    'type' => 'file_input',
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                ],
                [
                    'name' => esc_attr__('Description', 'nextpro'),
                    'id'   => 'desc',
                    'type' => 'textarea',
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'column_width',
            'type' => 'number',
            'std'   => 4,
            'visible'           => ['features_switcher', '=', true],
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
        ],

    ],
];
