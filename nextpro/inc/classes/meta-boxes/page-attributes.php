<?php
return [
    'title' => 'Nextpro Page Attributes',
    'id' => 'nextpro-page-attributes',
    'post_types' => ['page'],
    'context' => 'side',
    'priority' => 'high',
    'default_hidden' => false,
    'fields' => [
        [
            'type' => 'custom_html',
            'desc' => 'Attribute settings options displayed in the <a href="#nextpro-page-data"><strong>Nextpro Page Data</strong></a>.',
        ],
        [
            'id' => 'disable_header',
            'type' => 'checkbox',
            'desc' => 'Disable Header?',
            'std' => false
        ],
        [
            'id' => 'disable_sticky_header',
            'type' => 'checkbox',
            'desc' => 'Disable Sticky Header',
            'std' => false,
            'visible' => ['disable_header', '=', false]
        ],
        [
            'id' => 'header_style',
            'type' => 'select',
            'name' => 'Header Styles',
            'std' => 'style-1',
            'inline'  => false,
            'options' => [
                'style-1' => esc_html__('Default Style', 'nextpro'),
                'style-2' => esc_html__('Header Style 2', 'nextpro'),
                'style-3' => esc_html__('Header Style 3', 'nextpro'),
            ],
            'visible' => ['disable_header', '=', false]
        ],
        [
            'id' => 'enable_on_scroll_header',
            'type' => 'checkbox',
            'desc' => 'View Header On Scroll?',
            'std' => false
        ],
        [
            'id' => 'tra_header',
            'type' => 'checkbox',
            'std'   => false,
            'desc' => esc_attr__('Transparent Header', 'nextpro'),
            'hidden' => ['disable_header', '=', true]
        ],
        [
            'id' => 'navbar_style',
            'type' => 'select',
            'name' => 'Navbar Background Style',
            'std' => 'navbar-dark',
            'inline'  => false,
            'options' => [
                'section-header--five' => 'Transparent Style',
                'navbar-dark' => 'Light Style',
            ],
            'hidden' => ['tra_header', '=', false]
        ],
        [
            'id' => 'custom_menu',
            'type' => 'taxonomy',
            'desc' => esc_attr__('Custom menu', 'nextpro'),
            'taxonomy'   => 'nav_menu',
            'field_type' => 'select',
            'hidden' => ['disable_header', '=', true]
        ],
        [
            'id' => 'disable_banner',
            'type' => 'checkbox',
            'desc' => 'Disable Banner',
            'std' => false,
        ],
        [
            'id' => 'disable_breadcrumbs',
            'type' => 'checkbox',
            'desc' => 'Disable breadcrumbs',
            'std' => false,
        ],
        [
            'id' => 'container',
            'type' => 'select',
            'name' => 'Page Container',
            'desc' => 'Page container style',
            'std' => 'container',
            'options' => [
                'container' => 'Container',
                'container-fluid' => 'Container Fluid',
                'container-full' => 'Container Full-width',
            ],
        ],
        [
            'id' => 'spacer_y',
            'type' => 'select',
            'name' => 'Vertical Spacer',
            'desc' => 'Page container top:bottom spacer(in pixel) style',
            'std' => 'py-80',
            'options' => nextpro_vertical_spacer_options()
        ],
        [
            'id' => 'layout',
            'type' => 'image_select',
            'name' => 'Page layout',
            'inline' => false,
            'std' => 'full',
            'options' => [
                'full' => NEXTPRO_ASSETS . '/layout/full-width.png',
                'ls' => NEXTPRO_ASSETS . '/layout/left-sidebar.png',
                'rs' => NEXTPRO_ASSETS . '/layout/right-sidebar.png',
            ],
        ],
        [
            'id' => 'sidebar',
            'type' => 'select',
            'name' => 'Sidebar',
            'std' => 'sidebar-page',
            'options' => nextpro_get_sidebar_options(),
            'visible' => ['layout', '!=', 'full']
        ],
        [
            'id' => 'disable_footer',
            'type' => 'checkbox',
            'desc' => 'Disable footer?',
        ],

    ],
];
