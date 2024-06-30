<?php
return [
    'title'           => esc_attr__('Nextpro Team Member', 'nextpro'),
    'id'              => 'creative-team',
    'icon'            => 'groups',
    'description'     => 'Display your team members',
    'fields'          => [
        [
            'name'            => esc_attr__('Select Team Style', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'select_all_none' => false,
            'options'         => [
                'components/member.php'   => esc_attr__('Default', 'nextpro'),
                'components/member-carousel.php'   => esc_attr__('Carousel Style', 'nextpro'),
            ],
            'std'              => 'components/member.php'
        ],
        [
            'name' => esc_attr__('Number of Column Xl Device', 'nextpro'),
            'id'   => 'xl_device',
            'type' => 'number',
            'std'   => 4,
            'desc'  => esc_attr__('How many columns would you like to add Extra Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/member.php'],
        ],
        [
            'name' => esc_attr__('Number of Column Lg Device', 'nextpro'),
            'id'   => 'lg_device',
            'type' => 'number',
            'std'   => 3,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/member.php'],
        ],
        [
            'name' => esc_attr__('Number of Column Md Device', 'nextpro'),
            'id'   => 'md_device',
            'type' => 'number',
            'std'   => 2,
            'desc'  => esc_attr__('How many columns would you like to add Medium device, enter this number', 'nextpro'),
            'visible'          => ['template_file', '=', 'components/member.php'],
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
            'options' => array_column((array)get_posts(['post_type' => 'controlmember', 'posts_per_page' => -1]), 'post_title', 'ID'),
            'multiple' => true,
        ],

    ],
];
