<?php
return [
    'title'           => esc_attr__('NextPro Features Block', 'nextpro'),
    'id'              => 'nextpro-features-block',
    'icon'            => 'media-document',
    'description'     => 'This is an Block Content element you will get lots of single content here',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Features Block', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/features/feature-style1.php'  => esc_attr__('Style 1', 'nextpro'),
                'components/features/feature-style2.php'   => esc_attr__('Style 2', 'nextpro'),
                'components/features/feature-style3.php'        => esc_attr__('Style 3', 'nextpro'),
                'components/features/feature-style4.php'        => esc_attr__('Style 4', 'nextpro'),
            ],
            'std'              => 'components/features/feature-style1.php'
        ],
        [
            'type' => 'heading',
            'name' => esc_attr__('Features Style 1', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style1.php'],
        ],
        [
            'name'              => esc_attr__('Features List', 'nextpro'),
            'id'                => 'features_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {features_title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style1.php'],
            'std'               => [
                [
                    'features_title' => esc_attr__('Seamless Connectivity', 'nextpro'),
                ],
                [
                    'features_title' => esc_attr__('Customized Solutions', 'nextpro'),
                ],
                [
                    'features_title' => esc_attr__('Optimized Performance', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add feature\'s image icon', 'nextpro'),
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'features_title',
                    'type' => 'textarea',
                ],
            ],
        ],
        // Feature style 2
        [
            'type' => 'heading',
            'name' => esc_attr__('Features Style 2', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style2.php'],
        ],
        [
            'name'              => esc_attr__('Features List', 'nextpro'),
            'id'                => 'features_style2',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style2.php'],
            'std'               => [
                [
                    'icon' => 'processicon1',
                    'title' => esc_attr__('Digital Innovation Leaders', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],
                [
                    'icon' => 'processicon2',
                    'title' => esc_attr__('Strategic Planning', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],
                [
                    'icon' => 'processicon3',
                    'title' => esc_attr__('Implementation and Execution', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],
                [
                    'icon' => 'processicon4',
                    'title' => esc_attr__('Continuous Optimization', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],
                [
                    'icon' => 'processicon5',
                    'title' => esc_attr__('Reporting and Insights', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],
                [
                    'icon' => 'processicon6',
                    'title' => esc_attr__('Client Collaboration', 'nextpro'),
                    'desc' => esc_attr__('We begin by understanding your business, goals, and unique challenges through in-depth consultations', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'icon',
                    'name'             => esc_attr__('Icon:',  'nextpro'),
                    'type'             => 'select',
                    'desc'             => esc_attr__('Add  icon', 'nextpro'),
                    'options'          =>  Nextpro\SVG_Icons::options(),
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
            'name' => esc_attr__('Lg Device', 'nextpro'),
            'id'   => 'lg_device2',
            'type' => 'number',
            'std'   => 12,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style2.php'],
        ],
        [
            'name' => esc_attr__('SM Device', 'nextpro'),
            'id'   => 'sm_device2',
            'type' => 'number',
            'std'   => 12,
            'desc'  => esc_attr__('How many columns would you like to add Small device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style2.php'],
        ],
        // Features Style 3
        [
            'type' => 'heading',
            'name' => esc_attr__('Features Style 3', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style3.php'],
        ],
        [
            'name'              => esc_attr__('Features List', 'nextpro'),
            'id'                => 'features_style3',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style3.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Seamless Connectivity with your favorite tools', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Customized Solutions to fulfill your exact need ', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add feature\'s image icon', 'nextpro'),
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                ],
            ],
        ],
        [
            'name'            => 'Button Alignment',
            'id'              => 'select_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-left',
            'options'         => [
                'text-left'       => 'Text Left',
                'text-center' => 'Text Center',
                'text-end'        => 'Text Right',
            ],
            'visible'          => ['template_file', '=', 'components/features/feature-style3.php'],
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => true,
            'std'         => [
                [
                    'text' => 'See all Integrations ',
                    'url' => '#',
                    'class' => 'section-provide__btn next-marketing-btn dark-btn btn',
                    'target' => '',
                ],
            ],
            'visible'          => ['template_file', '=', 'components/features/feature-style3.php'],
        ],
        // Feature style 4
        [
            'type' => 'heading',
            'name' => esc_attr__('Features Style 4', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style4.php'],
        ],
        [
            'name'              => esc_attr__('Features List', 'nextpro'),
            'id'                => 'features_style4',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style4.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Dynamic Team', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Extraordinary skills', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Customer focused', 'nextpro'),
                    'desc' => esc_attr__('Receive comprehensive reports detailing the impact of our efforts', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add feature\'s image icon', 'nextpro'),
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
            'name' => esc_attr__('Lg Device', 'nextpro'),
            'id'   => 'lg_device',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/features/feature-style4.php'],
        ],

    ],
];
