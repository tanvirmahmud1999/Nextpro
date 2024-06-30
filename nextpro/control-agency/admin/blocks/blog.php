<?php
return [
    'title'           => esc_attr__('Blog Post', 'nextpro'),
    'id'              => 'admin-post',
    'icon'            => 'admin-post',
    'description'     => 'Display your blog posts',
    'fields'          => [
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'components/blog.php'
        ],
        [
            'name'            => 'Select post style',
            'id'              => 'blog_post_style',
            'type'            => 'select',
            'std'             => 'text-left',
            'options'         => [
                'list-content'       => 'List Style',
                'grid-content'       => 'Grid Style',
                'masonry'           => 'Masonary Style',
            ],
            'desc'        => esc_attr__('If you would like to change another style then select another option.', 'nextpro'),
        ],
        [
            'name' => esc_attr__('Number of Column', 'nextpro'),
            'id'   => 'lg_device',
            'type' => 'number',
            'std'   => 4,
            'desc'  => esc_attr__('How many columns would you like to add, enter this number', 'nextpro'),

        ],
        [
            'name' => esc_attr__('Number of post', 'nextpro'),
            'id'   => 'posts_per_page',
            'type' => 'number',
            'std'   => get_option('posts_per_page', 3),
            'desc'  => esc_attr__('How many posts would you like to show?', 'nextpro'),
        ],
        [
            'name' => esc_attr__('Filter by team name', 'nextpro'),
            'id'   => 'post__in',
            'type' => 'select_advanced',
            'options' => array_column((array)get_posts(['post_type' => 'post', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
        ],

    ],
];
