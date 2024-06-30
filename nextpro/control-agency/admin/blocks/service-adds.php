<?php
return [
    'title'      => esc_html__('Services Adds', 'nextpro'),
    'id'         => 'service-adds',
    'icon'       => 'email-alt',
    'description' => esc_html__('service-adds', 'nextpro'),
    'fields'     => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Service Adds', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'  => 'Template',
            'std'   => 'components/service-adds.php'
        ],
        [
            'name'              => esc_attr__('Services Adds', 'nextpro'),
            'id'                => 'service_adds',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 12,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'std'               => [
                [
                    'title' => esc_attr__('Amplify Your Reach with Social Media Marketing ', 'nextpro'),
                    'desc' => esc_attr__('Boost your online visibility and reach a wider audience by implementing strategic techniques to optimize your website for top-notch performance on search engines.', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Drive Conversions through Pay-Per-Click Advertising ', 'nextpro'),
                    'desc' => esc_attr__('Maximize your online impact with targeted ads, strategically placed to drive relevant traffic and conversions.', 'nextpro'),
                ],
            ],
            'fields' => [
                [
                    'id'   => 'title',
                    'name' => esc_attr__('Title', 'nextpro'),
                    'type' => 'text',
                ],
                [
                    'id'   => 'desc',
                    'name' => esc_attr__('Description', 'nextpro'),
                    'type' => 'textarea',
                ],
                [
                    'id'               => 'add_image',
                    'name'             => esc_attr__('Service add Image', 'nextpro'),
                    'type'             => 'single_image',
                    'force_delete'     => false,
                    'max_file_uploads' => 1,
                    'image_size'       => 'full',
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device1',
            'type' => 'number',
            'std'   => 2,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device1',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add medium device, enter this number', 'nextpro'),
        ],


    ],
];
