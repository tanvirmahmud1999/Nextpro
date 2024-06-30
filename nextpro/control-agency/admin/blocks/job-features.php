<?php 
return [
    'title'           => 'Job Features',
    'id'              => 'area-of-expertise',
    'icon'            => 'chart-area',
    'description'     => sprintf('This element contain %s', '<code>What we offers</code>, <code>Services carousel</code>'),     
    'fields'          => [
        [
            
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'job/single/job-features.php',
        ],
        [
            'name' => esc_attr__('Description', 'control-agency'),
            'id'   => 'desc',
            'type' => 'textarea',
            'std' => '',
        ],
        [
            'name' => 'Expertises',
            'id'   => 'expertises',
            'type' => 'group',
            'clone'     => true,
            'collapsible' => true,
            'default_state' => 'collapsed',
            'add_button' => esc_attr__('+ Area of Expertise', 'control-agency'),
            'group_title'   => '{#}: {title}',
            'std'  => [
                [   
                    'title' => 'Experience',
                    'subtitle' => '3-5 Years',
                ],
                [   
                    'title' => 'Job Nature',
                    'subtitle' => 'Full Time',
                ],
                [
                    'title' => 'Location',
                    'subtitle' => 'California, USA',
                ]                
            ],
            'fields' => [                
                [
                    'name' => esc_attr__('Title', 'control-agency'),
                    'id'   => 'title',
                    'type' => 'text',
                    'placeholder' => 'Enter expertise title...',
                ],
                [
                    'name' => esc_attr__('Title', 'control-agency'),
                    'id'   => 'subtitle',
                    'type' => 'textarea',
                    'placeholder' => 'Enter expertise description...',
                ],
            ]
        ],
        [
            'name' => esc_attr__('Button text', 'control-agency'),
            'id'   => 'button_text',
            'type' => 'text',
            'std' => 'Contact Us',
        ],
        [
            'name' => esc_attr__('Button URL', 'control-agency'),
            'id'   => 'button_url',
            'type' => 'text',
            'std' => '#',
        ],
        
    ],
];
