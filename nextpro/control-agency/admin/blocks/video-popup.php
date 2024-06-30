<?php
return [
    'title'           => esc_attr__('Video Popup (Dashboard)', 'nextpro'),
    'id'              => 'nextpro-video-popup',
    'icon'            => 'media-document',
    'description'     => 'This is an Video Popup Content element you will get 2 - 3 style here',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Video Popup', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select Video popup Style', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select Video popup Style', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/video-popup.php'  => esc_attr__('Style 1', 'nextpro'),
                'components/video-popup2.php'   => esc_attr__('Style 2', 'nextpro'),
            ],
            'std'              => 'components/video-popup.php'
        ],
        // Video item
        [
            'id'               => 'popup_background_image',
            'name'             => esc_attr__('Image:',  'nextpro'),
            'type'             => 'single_image',
            'std'              => get_theme_file_uri('assets/images/resource/dashboard1-1.png'),
            'desc'             => esc_attr__('Add popup background image', 'nextpro'),
        ],
        [
            'name'  => esc_attr__('Enable Image height', 'nextpro'),
            'id'    => 'image_height_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you would like to increase the Image height slightly, enable the switch.', 'nextpro'),
        ],
        [
            'id'               => 'popup_link',
            'name'             => esc_attr__('Popup Link:',  'nextpro'),
            'type'             => 'url',
            'std'             => 'https://www.youtube.com/watch?v=TKnufs85hXk',
            'desc'             => esc_attr__('Add popup video link', 'nextpro'),
        ],

        [
            'name'  => esc_attr__('Video  Features Switcher', 'nextpro'),
            'id'    => 'video_features_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you do not like to show your video then disable the switch.', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/video-popup.php'],
        ],
        [
            'name'              => esc_attr__('Video Features', 'nextpro'),
            'id'                => 'video_features',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'           => [
                ['video_features_switcher', '=', true],
                ['template_file', '=', 'components/video-popup.php']
            ],
            'std'               => [
                [
                    'image' => get_theme_file_uri('assets/images/shapes/edit-icon1-1.svg'),
                    'title' => esc_attr__('Built-in automation ', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts and gain valuable insights.', 'nextpro'),
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/discount-icon1-1.svg'),
                    'title' => esc_attr__('Built-in automation ', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts and gain valuable insights.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Image Icon', 'nextpro'),
                    'id'   => 'image',
                    'type' => 'single_image',
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
            'id'   => 'lg_device',
            'type' => 'number',
            'std'   => 2,
            'visible'          => ['template_file', '=', 'components/video-popup.php'],
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
        ],

        // style 2 
        [
            'name'  => esc_attr__('Clients logo Switcher', 'nextpro'),
            'id'    => 'clients_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you do not like to show your Client Logo then disable the switch.', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/video-popup2.php'],
        ],
        [
            'name'  => esc_attr__('Enable Shadow', 'nextpro'),
            'id'    => 'shadow_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you would like to show Client Logo area shadow then enable the switch.', 'nextpro'),
            'visible'          => ['clients_switcher', '=', true],
        ],
        [
            'name'              => esc_attr__('Clients logo', 'nextpro'),
            'id'                => 'clients',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'           => [
                ['clients_switcher', '=', true],
                ['template_file', '=', 'components/video-popup2.php']
            ],
            'std'               => [
                [
                    'title' => 'Invision',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-1.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Google',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-2.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Japier',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-3.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Spotify',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-4.png'),
                    'link' => '',
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Counter label', 'nextpro'),
                    'id'   => 'image',
                    'type' => 'file_input',
                ],
                [
                    'name' => esc_attr__('Link (optional)', 'nextpro'),
                    'id'   => 'link',
                    'type' => 'text',
                ],
            ],
        ],
    ],
];
