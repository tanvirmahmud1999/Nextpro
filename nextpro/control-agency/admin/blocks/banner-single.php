<?php
return [
    'title'           => 'Banner single',
    'id'              => 'banner-single',
    'disable_block'   => true,
    'icon'            => 'cover-image',
    'description'     => 'Display name, title, shot description & button',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Working Approach', 'nextpro'),
        ],
        [

            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Banner style',
            'std' => 'globals/banner.php',
        ],
        [
            'id'   => 'image',
            'name' => 'Image',
            'type' => 'single_image',
            'std'  => '',
            'desc'  => 'Use for the element',
        ],
        [
            'name'        => esc_attr__('Title', 'control-agency'),
            'id'          => 'title',
            'desc'        => sprintf(esc_attr__('Type your title here. use %s to display post title. Leave blank to display %s', 'control-agency'), '<code>[post_title]</code>', '<code>Post title</code>'),
            'type'        => 'text',
            'std'         => '',
            'size' => 60,
            'placeholder' => esc_attr__('Enter title...',   'control-agency'),
        ],
        [
            'name'        => esc_attr__('Subtitle', 'control-agency'),
            'id'          => 'subtitle',
            'desc'        => esc_attr__('Type Subtitle', 'control-agency'),
            'type'        => 'textarea',
            'std'         => '',
            'placeholder' => esc_attr__('Subtitle...',   'control-agency'),
        ],



    ],
];
