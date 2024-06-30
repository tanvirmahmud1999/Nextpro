<?php
return [
    'title'           => 'Post Content',
    'id'              => 'editor-content',
    'disable_block'   => true,
    'icon'            => 'text',
    'description'     => 'Display name, title, shot description & button',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Hero Title', 'nextpro'),
        ],
        [

            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Content style',
            'std' => 'single/content.php',
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'id'          => 'title',
            'type'        => 'text',
            'std'         => '',
            'size'        => 60,
            'placeholder' => esc_attr__('Enter title...',   'nextpro'),
            'visible' => ['template', '!=', 'service/single/content.php'],
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'id'          => 'post_title',
            'type'        => 'text',
            'std'         => '',
            'size'        => 60,
            'placeholder' => esc_attr__('Enter Your Post title...',   'nextpro'),
            'desc'        => sprintf(esc_attr__('Type your description here. Use %s to make words bold. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Discover the power.}</code>'),
            'visible'     => ['template', '=', 'service/single/content.php'],
        ],
        [
            'name'        => esc_attr__('Content', 'nextpro'),
            'type'        => 'custom_html',
            'desc'         => 'Editor content will be displayed',
        ],

        [
            'name'        => esc_attr__('Overviews', 'nextpro'),
            'type'        => 'group',
            'id'        => 'overviews',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'visible' => ['template', '=', 'project/single/content.php'],
            'fields'  => [
                [
                    'name'        => esc_attr__('Title', 'nextpro'),
                    'id'          => 'title',
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Enter title...',   'nextpro'),
                ],
                [
                    'name'        => esc_attr__('Description', 'nextpro'),
                    'id'          => 'desc',
                    'type'        => 'textarea',
                    'placeholder' => esc_attr__('Enter short description...',   'nextpro'),
                ],
            ]
        ],



        // Sidebar Field
        [
            'name'    => esc_attr__('Sidebar title', 'nextpro'),
            'id'      => 'sidebar_title',
            'type'    => 'text',
            'std'     => '',
            'visible' => ['template', 'in', ['job/single/content.php', 'service/single/content.php']],
        ],

        [
            'name'        => esc_attr__('Benefits', 'nextpro'),
            'type'        => 'group',
            'id'          => 'benefits',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'visible'           => ['template', '=', 'job/single/content.php'],
            'std'               => [
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-1.png'),
                    'title' => ' Competitive salary commensurate with experience.',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-2.png'),
                    'title' => ' Comprehensive benefits package, including health insurance and retirement plans.',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-3.png'),
                    'title' => ' Flexible work schedule and remote work options.',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-4.png'),
                    'title' => ' Opportunities for professional development and advancement within the company.',
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-5.png'),
                    'title' => ' Dynamic and collaborative work environment with a focus on creativity and innovation.'
                ],
                [
                    'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-6.png'),
                    'title' => ' environment with a focus on creativity and innovation.',
                ],
            ],
            'fields'            => [
                [
                    'id'               => 'image',
                    'name'             => esc_attr__('Add Image:', 'nextpro'),
                    'type'             => 'file_input',
                    'desc'             => esc_attr__('This image has 1 circle shape', 'nextpro'),
                ],
                [
                    'name'        => esc_attr__('Title', 'nextpro'),
                    'id'          => 'title',
                    'type'        => 'text',
                    'placeholder' => esc_attr__('Enter title...', 'nextpro'),
                ],
            ],
        ],

        [
            'name' => esc_attr__('Expertise Label: ', 'nextpro'),
            'id'   => 'expertise_label',
            'type' => 'text',
            'std'  => 'Expertise: ',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],
        // Member single archive er expertise fields
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
            'visible'           => [
                'template', '=', 'member/single/content.php'
            ],
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'fields' => [
                [
                    'name' => esc_attr__('List item', 'nextpro'),
                    'id'   => 'progress_label',
                    'type' => 'text',
                    'std'  =>  ''
                ],
                [
                    'name' => esc_attr__('Progress Value', 'nextpro'),
                    'id'   => 'progress_value',
                    'type' => 'number',
                    'std'  =>  ''
                ],
            ],
        ],


        // Testimonial Field of member field
        [
            'name' => esc_attr__('Testimonials Label: ', 'nextpro'),
            'id'   => 'testimonial_label',
            'type' => 'text',
            'std'  => 'Testimonials: ',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],
        [
            'name' => esc_attr__('Testimonials Quote ', 'nextpro'),
            'id'   => 'testimonial_quote',
            'type' => 'textarea',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],
        [
            'name' => esc_attr__('Name', 'nextpro'),
            'id'   => 'name',
            'type' => 'text',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],

        // Featured Field of member field
        [
            'name' => esc_attr__('Featured Project: ', 'nextpro'),
            'id'   => 'featured_label',
            'type' => 'text',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],


    ],
];
