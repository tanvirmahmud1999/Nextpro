<?php
return [
    
    [
        'name'        => esc_attr__('Salary', 'control-agency'),
        'id'          => 'salary_id',
        'type'        => 'text',
        'std'         => '{85k - 95k}  USD per year',
        'size' => 60,
        'placeholder' => esc_attr__('Enter title...',   'control-agency'),
        'desc'        => sprintf(esc_attr__('Type your description here. Use %s to make words bold. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Discover the power.}</code>'),
    ],
    [
        'name'        => esc_attr__('Job Description', 'control-agency'),
        'type'        => 'group',
        'id'        => 'job_description',
        'clone'             => true,
        'clone_default'     => true,
        'clone_as_multiple' => true,
        'collapsible'       => true,
        'default_state'     => 'collapsed',
        'group_title'       => '{#}. {title}',
        'std'               =>
        [
            [
            'title' =>'Experience',
            'desc' =>'3-5 Years',
            ],
            [
            'title' =>'Job Nature',
            'desc' =>'Full Time',
            ],
            [
            'title' =>'Location',
            'desc' =>'California, USA',
            ],
        ],
        'fields'  => [
            [
                'name'        => esc_attr__('Title', 'control-agency'),
                'id'          => 'title',
                'type'        => 'text',
                'placeholder' => esc_attr__('Enter title...',   'control-agency'),
            ],
            [
                'name'        => esc_attr__('Description', 'control-agency'),
                'id'          => 'desc',
                'type'        => 'textarea',
                'placeholder' => esc_attr__('Enter short description...',   'control-agency'),
            ],
        ]
    ],
    [
        'name' => esc_attr__('Button text', 'control-agency'),
        'id'   => 'button_text',
        'type' => 'text',
        'std' => 'Apply Now',
    ],
    [
        'name' => esc_attr__('Button URL', 'control-agency'),
        'id'   => 'button_url',
        'type' => 'text',
        'std' => '#',
    ],


];
