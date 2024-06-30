<?php
return [
    'title'      => esc_html__('Services Listing', 'nextpro'),
    'id'         => 'service-listing',
    'icon'       => 'email-alt',
    'description' => esc_html__('service-listing', 'nextpro'),
    'fields'     => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Services Listing', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'  => 'Template',
            'std'   => 'components/service-listing.php'
        ],
        [
            'name'              => esc_attr__('Services Adds', 'nextpro'),
            'id'                => 'service_listing',
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
                    'title' => esc_attr__('Craft Compelling Content for Content Marketing Success', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Harness the Power of Email Marketing for Direct Engagement', 'nextpro'),
                ],
                [
                    'title' => esc_attr__('Know more about our Services', 'nextpro'),
                ],
            ],
            'fields' => [
                [
                    'name'  => esc_attr__('Service Icon Switcher.', 'nextpro'),
                    'id'    => 'service_icon__switcher',
                    'type'  => 'switch',
                    'style' => 'square',
                    'std'   => true,
                    'desc'  => esc_attr__('If you do not like to show Service Icon then disable the switch and you can see button insted of ico', 'nextpro'),
                ],
                [
                    'id'               => 'service_icon',
                    'name'             => esc_attr__('Service Image or Svg Icon', 'nextpro'),
                    'type'             => 'single_image',
                    'force_delete'     => false,
                    'max_file_uploads' => 1,
                    'image_size'       => 'full',
                    'desc'             => sprintf(esc_attr__('You can add %s image for service icon', 'nextpro'), '<code>.svg or .png </code>'),
                    'visible'          => ['service_icon__switcher', '=', true],
                ],
                [
                    'id'               => 'title',
                    'name'             => esc_attr__('Title', 'nextpro'),
                    'type'             => 'textarea',
                ],
                // Button
                [
                    'id'               => 'btn_text',
                    'name'             => esc_attr__('Button Text', 'nextpro'),
                    'type'             => 'text',
                    'visible'          => ['service_icon__switcher', '=', false],
                    'std'              => esc_attr__('View More', 'nextpro'),
                ],
                [
                    'id'               => 'btn_link',
                    'name'             => esc_attr__('Button Link', 'nextpro'),
                    'type'             => 'url',
                    'visible'          => ['service_icon__switcher', '=', false],
                ],
                [
                    'id'               => 'btn_class',
                    'name'             => esc_attr__('Button Class', 'nextpro'),
                    'type'             => 'text',
                    'visible'          => ['service_icon__switcher', '=', false],
                ],
            ],
        ],
        [
            'name' => esc_attr__('Large Device', 'nextpro'),
            'id'   => 'lg_device1',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
        ],
        [
            'name' => esc_attr__('Medium Device', 'nextpro'),
            'id'   => 'md_device1',
            'type' => 'number',
            'std'   => 2,
            'desc'  => esc_attr__('How many columns would you like to add medium device, enter this number', 'nextpro'),
        ],


    ],
];
