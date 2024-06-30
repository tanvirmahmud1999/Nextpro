<?php
return [
    'title'           => esc_attr__('Our Story', 'nextpro'),
    'id'              => 'our-story',
    'icon'            => 'performance',
    'description'     => 'This is the Our Story',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Our Story', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'components/our-story.php'
        ],

        [
            'name'         => esc_attr__('Story Image', 'nextpro'),
            'id'           => 'story_image',
            'type'         => 'single_image',
        ],
        [
            'name'      => esc_attr__('Flip Image', 'nextpro'),
            'id'        => 'flip_image',
            'type'      => 'switch',
            'style'     => 'square',
            'std'       => false,
            'desc'      => esc_attr__('If you would like to Flip your image then Enable the switch.', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Image column size', 'nextpro'),
            'id'          => 'image_column_size',
            'desc'        => esc_attr__('Enter the number of column you would like ', 'nextpro'),
            'type'        => 'number',
            'std'         => '6',
        ],
        [
            'name'  => esc_attr__('Enable Experience Card ', 'nextpro'),
            'id'    => 'card_switcher',
            'type'  => 'switch',
            'style' => 'square',
            'std'   => false,
            'desc'  => esc_attr__('If you would like to show your Experience Card then enable the switch.', 'nextpro'),
        ],
        [
            'name'            => 'Experience Card Alignment',
            'id'              => 'select_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-left',
            'options'         => [
                'left-align'       => 'Text Left',
                'experience-card-center' => 'Text Center',
                'experience-card-top'        => 'Text Top',
            ],
            'desc'             => esc_attr__('You can change this Experience Card alignment by selecting a different alignment option.', 'nextpro'),
            'visible'          => ['card_switcher', '=', true],
        ],
        [
            'name'        => esc_attr__('Year of experience', 'nextpro'),
            'id'          => 'experience_time',
            'desc'        => esc_attr__('Enter the number of years of experience you have', 'nextpro'),
            'type'        => 'number',
            'std'         => '13',
            'placeholder' => esc_attr__('13', 'nextpro'),
            'visible'     => ['card_switcher', '=', true],
        ],
        [
            'name'        => esc_attr__('Experience quote', 'nextpro'),
            'id'          => 'experience_text',
            'desc'        => esc_attr__('Write your experience quote', 'nextpro'),
            'type'        => 'text',
            'std'         => 'Years of Experience in Digital marketing Industry',
            'visible'     => ['card_switcher', '=', true],
        ],
        [
            'name'        => esc_attr__('Content column size', 'nextpro'),
            'id'          => 'content_column_size',
            'desc'        => esc_attr__('Enter the number of column you would like ', 'nextpro'),
            'type'        => 'number',
            'std'         => '6',
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'title',
            'std'         => 'Discover Our Story: Redefine Digital Excellence at NextMarketing. ',
            'placeholder' => esc_attr__('Title',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Description', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'desc',
            'desc'        => sprintf(esc_attr__('Type your Description here. Use %s to make words highlight. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{NextMarketing }</code>'),
            'std'         => 'Step into the heart of NextMarketing, where a dynamic blend of passion and expertise fuels our journey to redefine digital success. <br> Since 2012,  been pioneering innovative solutions, crafting unique narratives, and consistently delivering exceptional results. Join us in shaping the future of digital excellence!',
            'placeholder' => esc_attr__('Description',   'nextpro'),
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
        ],
        // Features List Switcher
        [
            'name' => esc_attr__('Features List Switcher', 'nextpro'),
            'id'   => 'features_switcher',
            'type' => 'switch',
            'style'     => 'square',
            'std'  => false,
            'desc' => esc_attr__('If you would like to show features list then Enable the switch.', 'nextpro'),
        ],
        // Features List
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
        // Fun Facts Switcher
        [
            'name'      => esc_attr__('Fun Facts Switcher', 'nextpro'),
            'id'        => 'fun_facts_switcher',
            'type'      => 'switch',
            'style'     => 'square',
            'std'       => false,
            'desc'      => esc_attr__('If you would like to show features list then Enable the switch.', 'nextpro'),
        ],
        // Fun Facts
        [
            'name'              => esc_attr__('Fun Facts', 'nextpro'),
            'id'                => 'fun_facts',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {label}',
            'visible'           => ['fun_facts_switcher', '=', true],
            'std'               => [
                [
                    'fun_fact_value' => 5,
                    'fun_fact_suffix' => esc_attr__('K+', 'nextpro'),
                    'label' => esc_attr__('Website Optimized', 'nextpro'),
                ],
                [
                    'fun_fact_value' => 15,
                    'fun_fact_suffix' => esc_attr__('X', 'nextpro'),
                    'label' => esc_attr__('Conversion Rate Increased', 'nextpro'),
                ]
            ],
            'fields'            => [
                [
                    'id'   => 'fun_fact_value',
                    'name' => esc_attr__('Count', 'nextpro'),
                    'type' => 'number',
                ],
                [
                    'id'   => 'fun_fact_suffix',
                    'name' => esc_attr__('Suffix (e.g., k+, %)', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
                [
                    'id'   => 'label',
                    'name' => esc_attr__('label', 'nextpro'),
                    'type' => 'text',
                ],
            ],
        ],

    ],
];
