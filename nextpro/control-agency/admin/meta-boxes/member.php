<?php
return [
    [
        'name' => esc_attr__('Designation', 'nextpro'),
        'id'   => 'designation',
        'type' => 'text',
        'std' => 'Founder & CEO',
        'size'   => 60
    ],
    [
        'name'        => esc_attr__('Contact details', 'nextpro'),
        'type'        => 'group',
        'id'          => 'contact_info',
        'clone'             => true,
        'clone_default'     => true,
        'clone_as_multiple' => true,
        'collapsible'       => true,
        'default_state'     => 'collapsed',
        'group_title'       => '{#}. {label}',
        'std'               => [
            [
                'label' => 'Email',
                'value' => 'jennifer@nextpro.com',
                'url' => 'mailto:jennifer@nextpro.com',
            ],            
            [
                'label' => 'Phone',
                'value' => '(555) 123-4567',
                'url' => 'tel:(555) 123-4567',
            ],
        ],
        'fields'            => [
            [
                'name'        => esc_attr__('Label', 'nextpro'),
                'id'          => 'label',
                'type'        => 'text',
            ],
            [
                'id'               => 'value',
                'name'             => esc_attr__('Value', 'nextpro'),
                'type'             => 'text',
            ],
            
            [
                'id'               => 'url',
                'name'             => esc_attr__('URL', 'nextpro'),
                'type'             => 'link',
            ],
        ],
    ],
    // Social Link
    [
        'name'        => esc_attr__('Social links', 'nextpro'),
        'type'        => 'group',
        'id'          => 'social_links',
        'clone'             => true,
        'clone_default'     => true,
        'clone_as_multiple' => true,
        'collapsible'       => true,
        'default_state'     => 'collapsed',
        'group_title'       => '{#}. {label}',
        'std'               => [
            [
                'label' => 'Facebook',
                'icon' => 'facebook',
                'url' => '#',
                'css_class' => '',
            ],
            [
                'label' => 'Twitter',
                'icon' => 'twitter',
                'url' => '#',
                'css_class' => '',
            ],
            [
                'label' => 'Instagram',
                'icon' => 'instagram',
                'url' => '#',
                'css_class' => '',
            ],
            [
                'label' => 'Linkedin',
                'icon' => 'linkedin',
                'url' => '#',
                'css_class' => '',
            ],
        ],
        'fields'            => [
            [
                'name'        => esc_attr__('Social media name', 'nextpro'),
                'id'          => 'label',
                'type'        => 'text',
            ],
            [
                'id'               => 'icon',
                'name'             => esc_attr__('Icon:',  'nextpro'),
                'type'             => 'select',
                'desc'             => esc_attr__('Add icon', 'nextpro'),
                'options'          =>  Nextpro\SVG_Icons::options('social'), 
            ],
            [
                'id'               => 'url',
                'name'             => esc_attr__('Social Link', 'nextpro'),
                'type'             => 'text',
            ],
            [
                'id'               => 'css_class',
                'name'             => esc_attr__('CSS class', 'nextpro'),
                'type'             => 'text',
            ],
        ],
    ],

];