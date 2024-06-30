<?php
return [
    'title'           => esc_attr__('NextPro Content Block', 'nextpro'),
    'id'              => 'nextpro-content-block',
    'icon'            => 'media-document',
    'description'     => 'This is an Block Content element you will get lots of single content here',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Content Block', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'    => 'Template',
            'std'   => 'components/content-block.php',
        ],
        [
            'name'            => 'Alignment',
            'id'              => 'select_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-left',
            'options'         => [
                'text-left'       => 'Text Left',
                'text-center' => 'Text Center',
                'text-end'        => 'Text Right',
            ],
            'desc'        => esc_attr__('You can change this section alignment by selecting a different alignment option.', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Name', 'nextpro'),
            'type'        => 'text',
            'id'          => 'name',
            'desc'        => esc_attr__('section name here.'),
            'std'         => 'Name',
            'placeholder' => esc_attr__('Name',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'title',
            'desc'        => sprintf(esc_attr__('Type your title here. Use %s to make words highlight. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Digital Marketing}</code>'),
            'std'         => 'Transforming Your Presence: Innovative Digital Marketing with SEO, PPC, and More',
            'placeholder' => esc_attr__('Title',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Description', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'desc',
            'std'         => esc_attr__('Discover the power of streamlined operations and enhanced performance through our integration solutions. NextMarketing seamlessly integrates with a variety of industry-leading tools, ensuring a cohesive and efficient digital ecosystem for your business.

            '),
            'placeholder' => esc_attr__('Description',   'nextpro'),
            'desc'        => sprintf(esc_attr__('Type your description here. Use %s to make words bold. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Discover the power.}</code>'),
        ],
        // Features item
        [
            'name'  => esc_attr__('Features Switcher', 'nextpro'),
            'id'    => 'features_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you do not like to show your features then disable the switch.', 'nextpro'),
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
            'visible'           => ['features_switcher', '=', true],
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
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
        // List Switcher
        [
            'name'  => esc_attr__('List Switcher', 'nextpro'),
            'id'    => 'story_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you would like to off your list item then disable the switch.', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Story list item', 'nextpro'),
            'id'                => 'story_list_items',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'   => true,
            'default_state'   => 'collapsed',
            'group_title'   => '{#}. {list_item}',
            'max_clone'         => 10,
            'visible'          => ['story_switcher', '=', true],
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'std'               => [
                [
                    'list_item' => 'As Digital Innovation Leaders shaping digital future.',
                    'list_item' => 'Tailored Strategy Experts ensuring a roadmap to success.',
                    'list_item' => 'Proven Results Achievers: dedicated to achieving your success.',
                ],

            ],
            'fields'            => [
                [
                    'name' => esc_attr__('List item', 'nextpro'),
                    'id'   => 'list_item',
                    'type' => 'text',
                    'std'  =>  'As Digital Innovation Leaders shaping digital future.'
                ],
            ],
        ],
        // Progress bar
        [
            'name'  => esc_attr__('Progress bar Switcher', 'nextpro'),
            'id'    => 'pogress_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => true,
            'desc'  => esc_attr__('If you would like to Disable your progress bar then disable the switch.', 'nextpro'),
        ],
        [
            'name'              => esc_attr__('Progress bar item', 'nextpro'),
            'id'                => 'progress_items',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {progress_label}',
            'max_clone'         => 10,
            'visible'           => ['pogress_switcher', '=', true],
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'std'               => [
                [
                    'progress_label' => 'Strategic Expertise',
                    'progress_value' => '80',
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('List item', 'nextpro'),
                    'id'   => 'progress_label',
                    'type' => 'text',
                    'std'  =>  'Strategic Expertise'
                ],
                [
                    'name' => esc_attr__('Progress Value', 'nextpro'),
                    'id'   => 'progress_value',
                    'type' => 'number',
                    'std'  =>  '80'
                ],
            ],
        ],
        [
            'id'   => 'popup_link',
            'name' => esc_attr__('Popup link', 'nextpro'),
            'type' => 'text',
            'std' => 'https://www.youtube.com/watch?v=TKnufs85hXk',
        ],
        [
            'id'   => 'popup_text',
            'name' => esc_attr__('Popup Text', 'nextpro'),
            'type' => 'text',
            'std'  => esc_attr__('How It works?', 'nextpro'),
        ],
        // Button
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => true,
            'std'         => [
                [
                    'text' => 'Purchase now',
                    'url' => '#',
                    'class' => 'section-provide__btn dark-svg-hover next-marketing-btn dark-btn',
                    'target' => '',
                ],
            ],
        ],
        // client logos:
        [
            'name'  => esc_attr__('Clients Image Switcher', 'nextpro'),
            'id'    => 'clients_logo_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you would like to see the Client logo then enable switch.', 'nextpro'),
        ],
        [
            'name'              => esc_attr__('Client Images: ', 'nextpro'),
            'id'                => 'client_lists',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Item', 'nextpro'),
            'visible'           => ['clients_logo_switcher', '=', true],
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
            'id'          => 'users_number',
            'desc'        => esc_attr__('How much client satisfied from your service'),
            'std'         => esc_attr__('14k+ ', 'nextpro'),
            'visible'           => ['clients_logo_switcher', '=', true],
        ],
        [
            'name'        => esc_attr__('Client Quote', 'nextpro', 'nextpro'),
            'type'        => 'text',
            'id'          => 'quote_label',
            'std'         => esc_attr__('Over 14.5k happy users around the globe', 'nextpro'),
            'visible'           => ['clients_logo_switcher', '=', true],
            'desc'        => sprintf(esc_attr__('Use %s to make words Link and set the link below field. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{14.5k}</code>'),

        ],
        [
            'name'        => esc_attr__('Link', 'nextpro', 'nextpro'),
            'type'        => 'text',
            'id'          => 'custom_link',
            'std'         => '#',
            'visible'           => ['clients_logo_switcher', '=', true],
        ],

    ],
];
