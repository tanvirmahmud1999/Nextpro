<?php
return [
    'title'           => esc_attr__('Features', 'nextpro'),
    'id'              => 'features',
    'icon'            => 'media-document',
    'description'     => 'This is an Block Content element you will get lots of single content here',
    'fields'          => [
        [
            'name'        => esc_attr__('Title', 'control-agency'),
            'id'          => 'title',
            'type'        => 'text',
            'std'         => '',
            'size'        => 60,
            'visible'     => ['template', '=', 'service/single/services-features.php'],
        ],
        [
            'name'        => esc_attr__('Subtitle', 'control-agency'),
            'id'          => 'subtitle',
            'desc'        => esc_attr__('Type Subtitle', 'control-agency'),
            'type'        => 'textarea',
            'std'         => 'Get Right Solution For Business',
            'placeholder' => esc_attr__('Subtitle...',   'control-agency'),
            'visible'     => ['template', '=', 'service/single/services-features.php'],
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'hidden',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'std'              => 'service/single/features.php'
        ],
        [
            'name'              => esc_attr__('Features group', 'nextpro'),
            'id'                => 'features_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add new Item', 'nextpro'),
            'fields' => [
                [
                    'id'               => 'icon',
                    'name'             => esc_attr__('Icon:',  'nextpro'),
                    'type'             => 'select',
                    'desc'             => esc_attr__('Add feature\'s image icon', 'nextpro'),
                    'options'          =>  Nextpro\SVG_Icons::options(),
 
                ],
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'textarea',
                ],
                [
                    'name' => esc_attr__('Sub-Title', 'nextpro'),
                    'id'   => 'subtitle',
                    'type' => 'textarea',
                ],
                
            ],
        ],
      
       
    ],
];
