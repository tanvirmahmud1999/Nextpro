<?php
return [
    'title'           => esc_attr__('NextPro Services Block', 'nextpro'),
    'id'              => 'nextpro-services-block',
    'icon'            => 'media-document',
    'description'     => 'This is an Block Content element you will get lots of single content here',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Service Block', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/services/service-style1.php'  => esc_attr__('Style 1', 'nextpro'),
                'components/services/service-style2.php'   => esc_attr__('Style 2', 'nextpro'),
                'components/services/service-style3.php'        => esc_attr__('Style 3', 'nextpro'),
                'components/services/service-style4.php'        => esc_attr__('Style 4', 'nextpro'),
            ],
            'std'              => 'components/services/service-style1.php'
        ],
        // Services Switcher //

        [
            'name'  => esc_attr__('Enable Icon Rounded Border radius', 'nextpro'),
            'id'    => 'icon_rounded',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you would like to icon border rounded then enable the switch.', 'nextpro'),
        ],
        [
            'name'  => esc_attr__('Disable Icon backgroud color', 'nextpro'),
            'id'    => 'icon_background',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you do not like to see icon background color icon then enable the switcher.', 'nextpro'),
        ],
        // Services List //
        [
            'name'              => esc_attr__('Service List', 'nextpro'),
            'id'                => 'service_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 12,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
            'std'               => [
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/seo-icon.svg'),
                    'icon' => 'activity-two',
                    'title' => esc_attr__('Search Engine Optimization', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/social-media-icon.svg'),
                    'icon' => 'send-two',
                    'title' => esc_attr__('Social Media Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/content-writing-icon.svg'),
                    'icon' => 'document-two',
                    'title' => esc_attr__('Content Writing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/affiliate-marketing.svg'),
                    'icon' => 'shield-done-two',
                    'title' => esc_attr__('Affiliate Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/email-marketing-icon.svg'),
                    'icon' => 'message-icon-two',
                    'title' => esc_attr__('Email Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/pay-per-icon.svg'),
                    'icon' => 'scan-icon-two',
                    'title' => esc_attr__('Pay-Per-Click Advertising', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/cro-icon.svg'),
                    'icon' => 'discounnt-icon-two',
                    'title' => esc_attr__('Conversion Rate Optimization', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'image_icon' => get_theme_file_uri('assets/images/shapes/e-commers-icon.svg'),
                    'icon' => 'buy-icon-two',
                    'title' => esc_attr__('E-commerce Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'name'            => esc_attr__('Select Image or icon',  'nextpro'),
                    'id'              => 'image_icon_switcher',
                    'type'            => 'select',
                    'multiple'        => false,
                    'select_all_none' => false,
                    'options'         => [
                        'image_icon'  => esc_attr__('Image Icon', 'nextpro'),
                        'icon'   => esc_attr__('Icon', 'nextpro'),
                    ],
                    'std'              => 'icon',
                ],
                [
                    'id'               => 'image_icon',
                    'name'             => esc_attr__('Image icon',  'nextpro'),
                    'type'               => 'file_input',
                    'desc'             => esc_attr__('Add service\'s image icon', 'nextpro'),
                    'visible'          => ['image_icon_switcher', '=', 'image_icon'],
                ],
                [
                    'id'               => 'icon',
                    'name'             => esc_attr__('Name of Icon',  'nextpro'),
                    'type'             => 'select',
                    'desc'             => esc_attr__('Add  icon', 'nextpro'),
                    'options'          =>  Nextpro\SVG_Icons::options(),
                    'visible'          => ['image_icon_switcher', '=', 'icon'],

                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
                ],
                [
                    'name' => esc_attr__('Description', 'nextpro'),
                    'id'   => 'desc',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
                ],
            ],
        ],
        [
            'name' => esc_attr__('Extra Large Device', 'nextpro'),
            'id'   => 'xl_device1',
            'type' => 'number',
            'std'   => 4,
            'desc'  => esc_attr__('How many columns would you like to add Extra Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device1',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device1',
            'type' => 'number',
            'std'   => 6,
            'desc'  => esc_attr__('How many columns would you like to add medium device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
        ],
        // Feature style 2 //
        [
            'type' => 'heading',
            'name' => esc_attr__('Services Style 2', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
        ],
        [
            'name'              => esc_attr__('Services List', 'nextpro'),
            'id'                => 'services_style2',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Search Engine Optimization', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Social Media Marketing', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Content Writing', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Email Marketing', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Pay-Per-Click Advertising', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('E-commerce Marketing', 'nextpro'),
                    'desc' => esc_attr__('We learn about your goals and audience to create a tailored strategy.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add service\'s image icon', 'nextpro'),
                    'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
                ],
                [
                    'name' => esc_attr__('Description', 'nextpro'),
                    'id'   => 'desc',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device2',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device2',
            'type' => 'number',
            'std'   => 6,
            'desc'  => esc_attr__('How many columns would you like to add to the Medium device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style2.php'],
        ],
        // Services Style 3
        [
            'type' => 'heading',
            'name' => esc_attr__('Services Style 3', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
        ],
        [
            'name'              => esc_attr__('Service List', 'nextpro'),
            'id'                => 'services_style3',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Digital Innovation Leaders', 'nextpro'),
                    'desc' => esc_attr__('At Next, we are at the forefront of digital innovation, shaping the landscape with cutting-edge strategies,', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Tailored Strategy Experts', 'nextpro'),
                    'desc' => esc_attr__('At Next, we are at the forefront of digital innovation, shaping the landscape with cutting-edge strategies,', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Proven Results Achievers', 'nextpro'),
                    'desc' => esc_attr__('At Next, we are at the forefront of digital innovation, shaping the landscape with cutting-edge strategies,', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add service\'s image icon', 'nextpro'),
                    'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
                ],
                [
                    'name' => esc_attr__('Description', 'nextpro'),
                    'id'   => 'desc',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device3',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device3',
            'type' => 'number',
            'std'   => 6,
            'desc'  => esc_attr__('How many columns would you like to add to the Medium device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style3.php'],
        ],
        // Feature style 4
        [
            'type' => 'heading',
            'name' => esc_attr__('Services Style 4', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
        ],
        [
            'name'              => esc_attr__('Service List', 'nextpro'),
            'id'                => 'services_style4',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Digital Innovation Leaders', 'nextpro'),
                    'desc' => esc_attr__('Our team specializes crafting bespoke strategies, recognizing that one size does not fit all. We tailor the solutions.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Tailored Strategy Experts', 'nextpro'),
                    'desc' => esc_attr__('Our team specializes crafting bespoke strategies, recognizing that one size does not fit all. We tailor the solutions.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Proven Results Achievers', 'nextpro'),
                    'desc' => esc_attr__('Our team specializes crafting bespoke strategies, recognizing that one size does not fit all. We tailor the solutions.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add service\'s image icon', 'nextpro'),
                    'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
                ],
                [
                    'name' => esc_attr__('Description', 'nextpro'),
                    'id'   => 'desc',
                    'type' => 'textarea',
                    'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
                ],
            ],
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => true,
            'std'         => [
                [
                    'text' => 'Discover more',
                    'url' => '#',
                    'class' => 'section-approach__btn next-marketing-btn dark-btn btn btn-body-color',
                    'target' => '',
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device4',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device4',
            'type' => 'number',
            'std'   => 6,
            'desc'  => esc_attr__('How many columns would you like to add to the Medium device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style4.php'],
        ],

    ],
];
