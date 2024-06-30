<?php
return [
    'title'           => 'Nextpro Project Block',
    'id'              => 'projects-block',
    'icon'            => 'paperclip',
    'description'     => 'Projects Element',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Project Block', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select Project Style', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select Project Style', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/project.php'   => esc_attr__('Project Grid Style', 'nextpro'),
                'components/project-style2.php'   => esc_attr__('Project Masonry Style', 'nextpro'),
            ],
            'std'              => 'components/project.php'
        ],
        [
            'name' => esc_attr__('Recent Project label: ', 'control-agency'),
            'id'   => 'project_label',
            'type' => 'text',
            'visible' => ['template', '=', 'member/single/content.php'],
        ],
        [
            'name' => esc_attr__('Number of Column', 'nextpro'),
            'id'   => 'column_width',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            // 'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
        ],
        [
            'name' => esc_attr__('Number of post', 'nextpro'),
            'id'   => 'posts_per_page',
            'type' => 'number',
            'std'   => get_option('posts_per_page', 9),
            'desc'  => esc_attr__('How many posts would you like to show?', 'nextpro'),
            // 'visible'          => ['template_file', '=', 'components/services/service-style1.php'],
        ],
        [
            'name' => esc_attr__('Post in', 'nextpro'),
            'id'   => 'post__in',
            'type' => 'select_advanced',
            'options' => array_column((array)get_posts(['post_type' => 'controlproject', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
        ],
        [
            'name'       => esc_attr__('Category in', 'nextpro'),
            'id'         => 'category__in',
            'type'       => 'taxonomy_advanced',
            'taxonomy'   => 'project_cat',
            'field_type' => 'select_advanced',
            'multiple'   => true,
            'query_args' => [
                'hide_empty' => false, // Set to false to show even the empty categories
            ],
        ],

    ],
];
