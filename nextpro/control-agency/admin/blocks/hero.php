<?php
return [
    'title'           => esc_attr__('Hero Element', 'nextpro'),
    'id'              => 'hero-element',
    'icon'            => 'slides',
    'description'     => 'This is the Hero Section individual  title',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Hero Section', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/hero/hero.php'  => esc_attr__('Default', 'nextpro'),
                'components/hero/hero-style2.php'   => esc_attr__('Hero with 3d image', 'nextpro'),
                'components/hero/hero-style3.php'        => esc_attr__('Hero with Background image', 'nextpro'),
            ],
            'std'              => 'components/hero/hero.php'
        ],
        [
            'name'         => esc_attr__('Hero thumbnail  Image', 'nextpro'),
            'id'           => 'hero_thumbnail_image',
            'type'         => 'file_input',
            'std'          => get_theme_file_uri('assets/images/banner/wondered1-1.png'),
            'visible'      => ['template_file', '=', 'components/hero/hero.php']
        ],
        [
            'name'         => esc_attr__('Hero Background  Image', 'nextpro'),
            'id'           => 'hero_background_image',
            'type'         => 'file_input',
            'std'          => get_theme_file_uri('assets/images/banner/hero-img5-1.jpg'),
            'visible'      => ['template_file', '=', 'components/hero/hero-style3.php']
        ],
        [
            'name'        => esc_attr__('Name', 'nextpro'),
            'type'        => 'text',
            'id'          => 'name',
            'desc'        => esc_attr__('Name here.'),
            'std'         => esc_attr__('Hi there, Welcome to NextMarketing', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Name tag image icon', 'nextpro'),
            'id'          => 'name_tag',
            'type'        => 'file_input',
            'desc'        => esc_attr__('Name text right cartoon icon image.'),
            'std'         => get_theme_file_uri('assets/images/shapes/welcome-icon1-1.png'),
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'title',
            'desc'        => esc_attr__('Title here.'),
            'std'         => esc_attr__('Redefining Excellence in Digital Marketing', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Description', 'nextpro', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'desc',
            'desc'        => esc_attr__('Description here.', 'nextpro'),
            'std'         => 'Driving Conversions in the Digital Landscape — Our Expertise Ensures Your Brand Not Only Gets Noticed but Leaves a Lasting Impression',
        ],
        // client logos:
        [
            'name'              => esc_attr__('client logos: ', 'nextpro'),
            'id'                => 'client_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Item', 'nextpro'),
            'visible'           => ['template_file', '=', 'components/hero/hero.php'],
            'std'               => [
                [
                    'title' => 'Invision',
                    'image' => get_theme_file_uri('assets/images/banner/join-manimg1-1.png'),
                ],
                [
                    'title' => 'Google',
                    'image' => get_theme_file_uri('assets/images/banner/join-manimg1-2.png'),
                ],
                [
                    'title' => 'Zapier',
                    'image' => get_theme_file_uri('assets/images/banner/join-manimg1-3.png'),
                ],
                [
                    'title' => 'Spotify',
                    'image' => get_theme_file_uri('assets/images/banner/join-manimg1-4.png'),
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Client image', 'nextpro'),
                    'id'   => 'image',
                    'type' => 'file_input',
                ],
            ],
        ],
        [
            'name'        => esc_attr__('Number of users', 'nextpro', 'nextpro'),
            'type'        => 'text',
            'id'          => 'client_users',
            'desc'        => esc_attr__('How much client satisfied from your service'),
            'std'         => esc_attr__('7k+', 'nextpro'),
            'visible'   => ['template_file', '=', 'components/hero/hero.php'],
        ],
        [
            'name'        => esc_attr__('Client Quote', 'nextpro', 'nextpro'),
            'type'        => 'text',
            'id'          => 'quote_label',
            'std'         => esc_attr__('Join with thousands ', 'nextpro'),
            'visible'   => ['template_file', '=', 'components/hero/hero.php'],
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => true,
            'std'         => [
                [
                    'text' => 'Start Free Trial',
                    'url' => '#',
                    'class' => 'section-hero-four__btn next-marketing-btn dark-btn dark-btn dark-btn btn btn',
                    'target' => '',
                ],
            ],
            'visible'   => [
                'template_file', '=', 'components/hero/hero-style2.php',
                'template_file', '=', 'components/hero/hero-style3.php'
            ],
        ],
        [
            'id'   => 'popup_link',
            'name' => esc_attr__('Popup link', 'nextpro'),
            'type' => 'text',
            'std' => 'https://www.youtube.com/watch?v=TKnufs85hXk',
            'visible'   => [
                'template_file', '=', 'components/hero/hero-style2.php',
                'template_file', '=', 'components/hero/hero-style3.php'
            ],
        ],
        [
            'id'   => 'popup_text',
            'name' => esc_attr__('Popup Text', 'nextpro'),
            'type' => 'text',
            'std'  => esc_attr__('How It works?', 'nextpro'),
            'visible'   => [
                'template_file', '=', 'components/hero/hero-style2.php',
                'template_file', '=', 'components/hero/hero-style3.php'
            ],
        ],
        [
            'name'              => esc_attr__('Offer List', 'nextpro'),
            'id'                => 'offer_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {label}',
            'visible'   => ['template_file', '=', 'components/hero/hero-style2.php'],
            'std'               => [
                [
                    'label' => esc_attr__('7 Days Free trial', 'nextpro'),
                ],
                [
                    'label' => esc_attr__('No Credit card required', 'nextpro'),
                ],
                [
                    'label' => esc_attr__('Cancel anytime', 'nextpro'),
                ]
            ],
            'fields'            => [
                [
                    'id'   => 'label',
                    'name' => esc_attr__('Feature name', 'nextpro'),
                    'type' => 'text',
                ],
            ],
        ],

    ],
];
