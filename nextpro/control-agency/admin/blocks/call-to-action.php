<?php
return [
    'title'      => esc_html__('Call to action Section', 'nextpro'),
    'id'         => 'call-to-action-section',
    'icon'       => 'email-alt',
    'description' => esc_html__('Call to action block', 'nextpro'),
    'fields'     => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Call to action', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'std'              => 'components/call-to-action.php',
            'options'         => [
                'components/call-to-action.php'  => esc_attr__('Style 1', 'nextpro'),
                'components/call-to-action-style2.php'   => esc_attr__('Style 2', 'nextpro'),
                'service/single/cta.php'   => esc_attr__('Service CTA', 'nextpro'),
            ],

        ],
        [
            'id'   => 'title',
            'name' => esc_attr__('Title', 'nextpro'),
            'type' => 'text',
            'std'  => 'Ready to Transform Your Digital Presence?',
        ],
        [
            'id'   => 'desc',
            'name' => esc_attr__('Description', 'nextpro'),
            'type' => 'textarea',
            'std'  => 'Schedule a 30 minutes Meeting with Our Experts to Propel Your Online Success.',
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => false,
            'visible'      => ['template_file', '!=', 'service/single/cta.php'],
            'std'         => [
                [
                    'text' => 'Purchase',
                    'url' => '#',
                    'class' => 'newsletter-one__btn next-marketing-btn dark-btn btn btn-radius',
                    'target' => '',
                    'attributes' => [
                        'data-bs-target' => '#exampleModalToggle',
                        'data-bs-toggle' => 'modal'
                    ]
                ],
            ],
        ],
        [
            'id'   => 'shortcode',
            'name' => esc_attr__('Shortcode', 'nextpro'),
            'type' => 'textarea',
            'std'  => '',
            'placeholder'  => 'Enter shortcode here...',
            'visible'      => ['template_file', '=', 'service/single/cta.php'],
        ],
        [
            'id'               => 'background_image',
            'name'             => esc_attr__('Background Image', 'nextpro'),
            'type'             => 'single_image',
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', ['components/call-to-action-style2.php', 'service/single/cta.php']]
        ],



    ],
];
