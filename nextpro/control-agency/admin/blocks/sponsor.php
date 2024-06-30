<?php
return [
    'title'           => 'Sponsor Logos',
    'id'              => 'sponsor-logos',
    'icon'            => 'format-gallery',
    'description'     => 'Sponsor logos Element',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Sponsor Logo', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'components/sponsor.php'
        ],
        [

            'name'        => esc_attr__('Title', 'nextpro'),
            'id'          => 'title',
            'desc'        => esc_attr__('Add Title', 'nextpro'),
            'type'        => 'textarea',
            'std'         => esc_attr__('Freedom to integrate all the tools you need', 'nextpro'),
        ],
        [

            'name'        => esc_attr__('Description', 'nextpro'),
            'id'          => 'desc',
            'desc'        => esc_attr__('Add Description', 'nextpro'),
            'type'        => 'textarea',
            'std'         => esc_attr__('At Next you can seamlessly integrates with a variety of industry-leading tools, ensuring a cohesive and efficient digital ecosystem for your business.', 'nextpro'),
        ],
        [
            'name'        => __('Sponsor logos', 'control-agency'),
            'id'          => 'sponsor_list',
            'std'         => control_agency_config('sponsor_list'),
            'type'        => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}.  Group Item ',
            'std'         => [
                [
                    'sponsors'  => [
                        [
                            'title' => 'Invision',
                            'image' => get_theme_file_uri('assets/images/shapes/hubSpot3-2.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Google',
                            'image' => get_theme_file_uri('assets/images/shapes/shopify3-1.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Zapier',
                            'image' => get_theme_file_uri('assets/images/shapes/zapier3-3.png'),
                            'link' => '',
                        ],
                    ],

                ],
                [
                    'sponsors'  => [
                        [
                            'title' => 'Invision',
                            'image' => get_theme_file_uri('assets/images/shapes/jira3-4.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Google',
                            'image' => get_theme_file_uri('assets/images/shapes/slack3-6.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Zapier',
                            'image' => get_theme_file_uri('assets/images/shapes/slack3-6.png'),
                            'link' => '',
                        ],
                    ],

                ],
                [
                    'sponsors'  => [
                        [
                            'title' => 'Invision',
                            'image' => get_theme_file_uri('assets/images/shapes/notion3-9.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Google',
                            'image' => get_theme_file_uri('assets/images/shapes/paypal3-7.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Zapier',
                            'image' => get_theme_file_uri('assets/images/shapes/hotjar3-8.png'),
                            'link' => '',
                        ],
                    ],

                ],
                [
                    'sponsors'  => [
                        [
                            'title' => 'Invision',
                            'image' => get_theme_file_uri('assets/images/shapes/mailchimp3-11.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Google',
                            'image' => get_theme_file_uri('assets/images/shapes/stripe3-12.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Zapier',
                            'image' => get_theme_file_uri('assets/images/shapes/googledrive3-10.png'),
                            'link' => '',
                        ],
                    ],

                ],
                [
                    'sponsors'  => [
                        [
                            'title' => 'Invision',
                            'image' => get_theme_file_uri('assets/images/shapes/zapier3-3.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Google',
                            'image' => get_theme_file_uri('assets/images/shapes/amazon3-13.png'),
                            'link' => '',
                        ],
                        [
                            'title' => 'Zapier',
                            'image' => get_theme_file_uri('assets/images/shapes/jira3-4.png'),
                            'link' => '',
                        ],
                    ],

                ],
            ],
            'fields' => [
                [
                    'name'        => __('Sponsors item', 'control-agency'),
                    'type'        => 'heading',
                ],
                [
                    'id'          => 'sponsors',
                    'type'        => 'group',
                    'clone'             => true,
                    'clone_default'     => true,
                    'clone_as_multiple' => true,
                    'collapsible'       => true,
                    'default_state'     => 'collapsed',
                    'group_title'       => '{#}. {title}',
                    'fields' => [
                        [
                            'name' => esc_attr__('Title', 'nextpro'),
                            'id'   => 'title',
                            'type' => 'text',
                        ],
                        [
                            'name' => esc_attr__('Sponsor  Image', 'nextpro'),
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
        ]

    ],
];
