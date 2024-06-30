<?php
return [
    [
        'id'               => 'featured',
        'desc'             => esc_attr__('Featured project?', 'control-agency'),
        'type'             => 'checkbox',
        'tab'  => 'overview',
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
        'name'        => esc_attr__('Title', 'control-agency'),
        'id'          => 'desc',
        'desc'        => sprintf(esc_attr__('Type your title here. use %s to display post title. Leave blank to display %s', 'control-agency'), '<code>[post_title]</code>', '<code>Post title</code>'),
        'type'        => 'textarea',
        'std'         => '',
        'size' => 60,
        'placeholder' => esc_attr__('Enter title...',   'control-agency'),
    ],
];
