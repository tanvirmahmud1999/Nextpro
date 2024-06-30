<?php
return [
    'title'           => esc_attr__('NextPro Services Block', 'nextpro'),
    'id'              => 'nextpro-services-block',
    'icon'            => 'media-document',
    'description'     => 'This is an Block Content element you will get lots of single content here',
    'fields'          => [
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'hidden',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'std'              => 'components/services/service-style1.php'
        ],
        // Services Switcher //
        [
            'name'  => esc_attr__('Services Switcher', 'nextpro'),
            'id'    => 'services_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you do not like to show your services then disable the switch.', 'nextpro'),
        ],
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
            'visible'           => ['services_switcher', '=', true],
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
            'std'               => [
                [
                    'title' => esc_attr__('Search Engine Optimization', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Social Media Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Content Writing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Affiliate Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Email Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Pay-Per-Click Advertising', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Conversion Rate Optimization', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('E-commerce Marketing', 'nextpro'),
                    'desc' => esc_attr__('Identify relevant and high-impact keywords for your industry.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Image:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add service\'s image icon', 'nextpro'),
                    'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
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

   
    ],
];
