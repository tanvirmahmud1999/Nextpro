<?php
return [
    'title'           => esc_attr__('Working Approach', 'nextpro'),
    'id'              => 'approach',
    'icon'            => 'clipboard',
    'description'     => 'This is the Working Approach Block',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Working Approach', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'    => 'Template',
            'std'   => 'components/approach.php',
        ],
        [
            'name'              => esc_attr__('Our Working Approach', 'nextpro'),
            'id'                => 'working_approach',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {tab_label}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'std'               => [
                [
                    'tab_label' => esc_attr__('Strategy Development', 'nextpro'),
                    'title' => esc_attr__('Strategic Planning Tailored to Your Vision', 'nextpro'),
                    'desc' => esc_attr__('Our strategic planning process begins with a deep dive into your business objectives, target audience, and competitive landscape. We meticulously analyze market trends and consumer insights to craft customized strategies.', 'nextpro'),
                ],
                [
                    'tab_label' => esc_attr__('Collaborative Partnership', 'nextpro'),
                    'title' => esc_attr__('Strategic Planning Tailored to Your Vision', 'nextpro'),
                    'desc' => esc_attr__('Our strategic planning process begins with a deep dive into your business objectives, target audience, and competitive landscape. We meticulously analyze market trends and consumer insights to craft customized strategies.', 'nextpro'),
                ],
                [
                    'tab_label' => esc_attr__('Data-Driven Decisions', 'nextpro'),
                    'title' => esc_attr__('Strategic Planning Tailored to Your Vision', 'nextpro'),
                    'desc' => esc_attr__('Our strategic planning process begins with a deep dive into your business objectives, target audience, and competitive landscape. We meticulously analyze market trends and consumer insights to craft customized strategies.', 'nextpro'),
                ],
                [
                    'tab_label' => esc_attr__('Agile Execution', 'nextpro'),
                    'title' => esc_attr__('Strategic Planning Tailored to Your Vision', 'nextpro'),
                    'desc' => esc_attr__('Our strategic planning process begins with a deep dive into your business objectives, target audience, and competitive landscape. We meticulously analyze market trends and consumer insights to craft customized strategies.', 'nextpro'),
                ],
                [
                    'tab_label' => esc_attr__('Transparent Communication', 'nextpro'),
                    'title' => esc_attr__('Strategic Planning Tailored to Your Vision', 'nextpro'),
                    'desc' => esc_attr__('Our strategic planning process begins with a deep dive into your business objectives, target audience, and competitive landscape. We meticulously analyze market trends and consumer insights to craft customized strategies.', 'nextpro'),
                ],

            ],
            'fields' => [
                [
                    'id'               => 'tab_icon',
                    'name'             => esc_attr__('Tab menu icon:',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add tabs\'s image icon', 'nextpro'),
                ],
                [
                    'name' => esc_attr__('Tab label', 'nextpro'),
                    'id'   => 'tab_label',
                    'type' => 'textarea',
                ],
                [
                    'type' => 'heading',
                    'name' => esc_attr__('Tab Content', 'nextpro'),
                ],
                // Tab Content
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
                    'id'               => 'image',
                    'name'             => esc_attr__('Image ',  'nextpro'),
                    'type'             => 'single_image',
                    'desc'             => esc_attr__('Add tab\'s Content image', 'nextpro'),
                ],
            ],
        ],
    ],
];
