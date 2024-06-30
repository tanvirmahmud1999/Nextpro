<?php
return [
    'title'           => 'Clients Logo',
    'id'              => 'client-logos',
    'icon'            => 'format-gallery',
    'description'     => 'Client logos Element',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Clients Logo', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'components/client.php'
        ],
        [

            'name'        => esc_attr__('Title', 'nextpro'),
            'id'          => 'title',
            'desc'        => esc_attr__('Add Title', 'nextpro'),
            'type'        => 'textarea',
            'std'         => esc_attr__('Trusted by Companies all over the world', 'nextpro'),
        ],
        [
            'name'              => esc_attr__('client logos: ', 'nextpro'),
            'id'                => 'client_list',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Item', 'nextpro'),
            'std'               => [
                [
                    'title' => 'Invision',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-1.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Google',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-2.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Zapier',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-3.png'),
                    'link' => '',
                ],
                [
                    'title' => 'Spotify',
                    'image' => get_theme_file_uri('assets/images/shapes/comy-logo2-4.png'),
                    'link' => '',
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Client image', 'nextpro'),
                    'id'   => 'image',
                    'type' => 'file_input',
                ],
                [
                    'name' => esc_attr__('Link (optional)', 'nextpro'),
                    'id'   => 'link',
                    'type' => 'text',
                ],
            ],
        ],

    ],
];
